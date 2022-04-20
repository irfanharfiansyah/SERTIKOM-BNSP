<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Letter;
use App\Models\Category;
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
    public function edit($id){
        $categories = Category::all();
        $letters = Letter::find($id);
        return view('layouts.editArsip', compact('letters', 'categories'));
    }
    public function update($id, Request $request){
        $letters = Letter::find($id);
        $letters->number = $request->number;
        $letters->title = $request->title;
        $letters->category_id = $request->category_id;
        if ($letters->filename && file_exists(public_path('storage/' .$letters->filename))) {
            unlink(public_path('storage/' .$letters->filename));
        }
        $file = $request->file('file')->store('file', 'public');
        $letters->filename = $file;
        $letters->save();
        Alert::success('Success Updated', 'Success Message');
        return redirect('/');
    }
    public function delete($id) {
        $letters = Letter::find($id);
        unlink(public_path('storage/' .$letters->filename));
        $letters->delete();
        Alert::success('Success Deleted', 'Success Message');
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

