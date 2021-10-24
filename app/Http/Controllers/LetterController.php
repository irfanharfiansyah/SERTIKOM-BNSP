<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Letter;
use Facade\FlareClient\Http\Response;
class LetterController extends Controller

{
    public function index(Request $request){
        // Search
        $keyword = $request['keyword'] ?? "";
        if ($keyword != "") {
            $letters = Letter::where('title', 'LIKE', "%$keyword%")->get();
        }else{
            $letters = Letter::all();
        }
       return view('layouts.arsip', compact('letters', 'keyword'));
    }

    public function create(Request $request) {
        if ($request->file('file')) {
            $file = $request->file('file')->store('file', 'public');
        }

        Letter::create([
            'number' => $request->number,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'filename' => $file
        ]);
        Alert::success('Success Added', 'Success Message');
        return redirect('/');
    }
    public function delete($id) {
        $letters = Letter::find($id); 
        $letters->delete();
       
        Alert::success('Succes Deleted', 'Success Message');
        return redirect('/');
    }
    public function confirm($id){
        alert()->question('Are you sure?','You won\'t be able to revert this!')
               ->showConfirmButton( '<a href="/delete/'. $id .'" class="text-white" style="text-decoration:none"> Yes! Delete it</a>', '#3085d6')->toHtml()
               ->showCancelButton('Cancel', '#aaa')->reverseButtons();
        return redirect('/');
    }
    public function show($id){
        $letters = Letter::find($id);
        return view('layouts.arsipView', compact('letters'));
    }
    public function download($id){
        $letters = Letter::find($id);
        $path = public_path('storage/'. $letters->filename);
        return response()->download($path);
    }
}
