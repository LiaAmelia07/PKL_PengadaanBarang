@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
  <h2 class="card-header">Data Barang
      <a href="{{ route('barang.create') }}" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-plus">&nbsp;</span> tambah</a>
      <a href="/pengadaanbarang/cetak-barang" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-file">&nbsp;</span> Convert PDF</a>
      <button onclick = "window.print()" class = "btn btn-primary float-right col-sm-2 ml-3"><span class = "fa fa-print">&nbsp;</span> Print</button>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Stok</th>
                        <th>Satuan Barang</th>
                        <th>Tanggal</th>
                        <th>Ket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
                    @foreach ($barang as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->kode_barang}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->kategori->kategori}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->satuan->nama_satuan}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->ket}}</td>
                            <td>
                                <form class="text-center" action="{{route('barang.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('barang.edit',$data->id)}}" class="btn btn-warning">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
  </div>
</div>

</div>

@stop

@section('css')

@stop

 @section('js')

@stop
