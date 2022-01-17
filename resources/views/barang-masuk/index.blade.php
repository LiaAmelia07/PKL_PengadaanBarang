@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Masuk</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
  <h2 class="card-header">Barang Masuk
      <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-plus">&nbsp;</span> tambah</a>
      <a href="/pengadaanbarang/cetak-barang-masuk" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-file">&nbsp;</span> Convert PDF</a>
      <button onclick = "window.print()" class = "btn btn-primary float-right col-sm-2 ml-3"><span class = "fa fa-print">&nbsp;</span> Print</button>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang Masuk</th>
                        <th>Kode Pengajuan</th>
                        <th>Tanggal Masuk</th>
                        <th>Supplier</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                        <th>Penerima</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($masuk as $data)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$data->kode_barang_masuk}}</td>
                        <td class="text-center">{{$data->pengajuan->kode_pengajuan}}</td>
                        <td class="text-center">{{$data->tanggal_masuk}}</td>
                        <td class="text-center">{{$data->supplier->nama_supplier}}</td>
                        <td class="text-center">{{$data->barang->nama}}</td>
                        <td class="text-center">{{$data->qty}}</td>
                        <td class="text-center">{{$data->harga}}</td>
                        <td class="text-center">{{$data->satuan->nama_satuan}}</td>
                        <td class="text-center">{{$data->user->name}}</td>
                        <td class="text-center">
                            <form class="text-center" action="{{route('barang-masuk.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('barang-masuk.edit',$data->id)}}" class="btn btn-warning">Edit</a>
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
