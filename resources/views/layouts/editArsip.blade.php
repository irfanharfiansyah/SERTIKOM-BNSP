@extends('master')

@section('content-title')
<div class="container">
    <h1>Edit Arsip Surat</h1>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <p>Catatan :</p>
    <ul>
        <li><i>Gunakan file berformat PDF</i></li>
    </ul>
</div>

<hr>
@section('body')
<form action="/editArsip/update/{{ $letters->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$letters->id}}"></br>
<div class="list-input mt-5">
    <div class="row mb-3">
        <div class="col-md-2">
            Nomor surat
        </div>
        <div class="col-md-10" style="width: 400px">
            <input type="text" name="number" value="{{ $letters->number }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            Kategori
        </div>
        <div class="col-md-10">
            <select name="category_id">
                @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{$item->id == $letters->category_id ? ' selected' : ' '}}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            Judul
        </div>
        <div class="col-md-10">
            <input type="text" name="title"  value="{{ $letters->title }}" style="width: 500px">
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-2">
            File Surat (PDF)
        </div>
        <div class="col-md-10">
            <input type="file" name="file"  value="{{ $letters->filename }}">
        </div>
    </div>
    <a href="/" class="btn btn-dark mb-5"><i class="fas fa-undo-alt"></i></a>
    <button type="submit" name="add" class="btn btn-warning mb-5">Simpan</button>  
</div>
@endsection

@endsection