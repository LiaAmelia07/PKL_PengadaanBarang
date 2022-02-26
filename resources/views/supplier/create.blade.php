@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Supplier</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Supplier
    <a href="{{ route('supplier.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('supplier.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier">
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="number" name="no_telepon" class="form-control" placeholder="No Telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="ket" class="form-control" placeholder="Keterangan">
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
