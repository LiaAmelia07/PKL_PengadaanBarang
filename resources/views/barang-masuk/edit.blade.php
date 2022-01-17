@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Masuk</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Barang Masuk
    <a href="{{ route('barang-masuk.index') }}" class="btn btn-default float-right col-sm-2" enctype="multipart/form-data"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('barang-masuk.update', $masuk->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Kode Barang Kasuk</label>
                    <input value="{{$masuk->kode_barang_masuk}}" class="form-control boxed" placeholder="Kode" required="required" name="kode_barang_masuk" type="text" value="{{ $kode }}" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input value="{{ $masuk->tanggal_masuk }}" type="date" name="tanggal_masuk" class="form-control">
                </div>
                <div class="form-group">
                    <label>supplier</label>
                    <select value="{{ $masuk->supplier_id }}" name="supplier_id" class="form-control">
                            @foreach($supplier as $data)
                                <option value="{{$data->id}}">{{$data->nama_supplier}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Barang Masuk</label>
                    <select value="{{ $masuk->barang_id }}" name="barang_id" class="form-control">
                            @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input value="{{ $masuk->qty }}" type="text" name="qty" class="form-control" placeholder="Qty">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                     <select value="{{ $masuk->harga }}" name="harga" class="form-control">
                            @foreach($supplier as $data)
                                <option value="{{$data->harga}}"> {{$data->nama_supplier}} | {{$data->ket}} | Rp.{{$data->harga}}</option>
                            @endforeach
                    </select>
                </div>
                 <div class="form-group">
                    <label>Satuan</label>
                    <select value="{{ $masuk->satuan_id }}" name="satuan_id" class="form-control">
                            @foreach($satuan as $data)
                                <option value="{{$data->id}}">{{$data->nama_satuan}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Penerima</label>
                    <select value="{{ $masuk->user_id }}" name="user_id" class="form-control">
                            @foreach($user as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                    </select>
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
