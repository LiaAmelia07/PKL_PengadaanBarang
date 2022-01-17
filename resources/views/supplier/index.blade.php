@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Supplier</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Supplier <a href="{{ route('supplier.create') }}" class="btn btn-primary float-right col-sm-2"><span class="fa fa-plus">&nbsp;</span> tambah</a>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Harga / Unit</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
                    @foreach ($supplier as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nama_supplier}}</td>
                            <td>{{$data->no_telepon}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>Rp.{{$data->harga}}</td>
                            <td>{{$data->ket}}</td>
                            <td>
                                <form class="text-center" action="{{route('supplier.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('supplier.edit',$data->id)}}" class="btn btn-warning far fa-edit"></a>
                                    <button type="submit" class="btn btn-danger fas fa-trash-alt" onclick="return confirm('Apakah anda yakin menghapus')"></button>
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