@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Kategori</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Edit Kategori
    <a href="{{ route('kategori.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('kategori.update', $kategori->id) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Kategori</label>
                    <input value="{{ $kategori->kategori }}" type="text" name="kategori" class="form-control" placeholder="Kategori">
                </div>
                <div class="form-group">
                    <label>Ket</label>
                    <input value="{{ $kategori->ket }}" type="text" name="ket" class="form-control" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </form>
        </div>
  </div>

@stop

@section('css')

@stop

 @section('js')
 
@stop