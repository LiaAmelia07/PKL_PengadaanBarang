@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Persetujuan</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Persetujuan
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="/pengadaanbarang/persetujuanbarangmasuk" method="post">
            @csrf
                <div class="form-group">
                    <label>Kode Pengajuan</label>
                    <input type="text" name="kode_pengajuan" class="form-control" placeholder="Kode Pengajuan">
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
