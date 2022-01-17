@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Persetujuan Barang</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Persetujuan Barang
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="/pengadaanbarang/persetujuanbarang" method="post">
            @csrf
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">                    
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
  </div>

@stop

@section('css')

@stop

 @section('js')
 
@stop