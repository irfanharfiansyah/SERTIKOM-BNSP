@extends('master')

@section('content-title')
<div class="list-arsip">
    <h1>Arsip Surat</h1>
    <ul>
        <li>Kategori : {{ $letters->category->name}}</li>
        <li>Judul : {{ $letters->title}}</li>
        <li>Waktu Unggah : {{ $letters->created_at}}</li>
    </ul>
</div>
@endsection

@section('body')
<div class="view-arsip mt-5">
    <embed src="{{ asset('storage/'. $letters->filename ) }}" width="100%" height="900px"  type="application/pdf" />
</div>
<a href="/" class="btn btn-dark mt-3 mb-4"><i class="fas fa-undo-alt"></i></a>
<a href="/arsipView/download/{{ $letters->id }}" class="btn btn-warning mt-3 mb-4">Simpan File</a>
<a href="/editArsip/{{ $letters->id }}" class="btn btn-secondary mt-3 mb-4">Edit</i></a>
@endsection