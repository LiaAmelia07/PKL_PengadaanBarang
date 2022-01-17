@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Keluar</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Barang
    <a href="{{ route('barang-keluar.index') }}" class="btn btn-default float-right col-sm-2" enctype="multipart/form-data"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('barang-keluar.update', $keluar->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Kode Barang Keluar</label>
                    <input value="{{$keluar->kode_barang_keluar}}" class="form-control boxed" placeholder="Kode" required="required" name="kode_barang_keluar" type="text" value="{{ $kode }}" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input value="{{ $keluar->tanggal_keluar }}" type="date" name="tanggal_keluar" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Barang Keluar</label>
                    <select value="{{ $keluar->barang_id }}" name="barang_id" class="form-control">
                            @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input value="{{ $keluar->qty }}" type="text" name="qty" class="form-control" placeholder="Qty">
                </div>
                <div class="form-group">
                    <label>Pengeluar</label>
                    <select value="{{ $keluar->user_id }}" name="user_id" class="form-control">

                            @foreach($user as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            -@endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input value="{{ $keluar->ket }}" type="text" name="ket" class="form-control" placeholder="Keterangan">
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
