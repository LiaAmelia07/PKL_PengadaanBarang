@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Satuan</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Satuan
    <a href="{{ route('satuan.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('satuan.update', $satuan->id) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Nama Satuan</label>
                    <input value="{{ $satuan->nama_satuan }}" type="text" name="nama_satuan" class="form-control" placeholder="Nama Satuan">
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