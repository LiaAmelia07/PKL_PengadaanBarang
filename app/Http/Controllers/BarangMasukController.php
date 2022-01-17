<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pengajuan;
use App\Models\Satuan;
use PDF;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = BarangMasuk::all();
        return view('barang-masuk.index', compact('masuk'));
    }

    public function cetakbm()
    {
        $masuk = BarangMasuk::all();
        $pdf   = \PDF::loadview('cetak-laporan.cetak-bm', compact('masuk'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = BarangMasuk::kode();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $user = User::all();
        $pengajuan = Pengajuan::all();
        $satuan = Satuan::all();
        return view('barang-masuk.create', compact('pengajuan','satuan','kode','supplier','barang','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $masuk = new BarangMasuk();
        $masuk->kode_barang_masuk = $request->kode_barang_masuk;
        $masuk->pengajuan_id = $request->pengajuan_id;
        $masuk->tanggal_masuk = $request->tanggal_masuk;
        $masuk->supplier_id = $request->supplier_id;
        $masuk->barang_id = $request->barang_id;
        $masuk->qty = $request->qty;
        $masuk->satuan_id = $request->satuan_id;
        $masuk->perkiraan_biaya = $request->perkiraan_biaya;
        $masuk->harga = $request->harga;
        $masuk->user_id = $request->user_id;
        $masuk->save();

        $barang = Barang::findOrFail($request->barang_id);
        $barang->qty += $request->qty;
        $barang->save();

        $transaksi = new Transaksi();
        $transaksi->kode = $masuk->kode_barang_masuk;
        $transaksi->jenis = 'Barang Masuk';
        $transaksi->nama_barang = $masuk->barang_id;
        $transaksi->tanggal_transaksi = $masuk->tanggal_masuk;
        $transaksi->qty = $masuk->qty;
        $transaksi->satuan = $masuk->satuan_id;
        $transaksi->perkiraan_biaya = $masuk->perkiraan_biaya;
        $transaksi->harga = $masuk->harga;
        $transaksi->pelaku = $masuk->user_id;
        $transaksi->total_biaya = $masuk->qty * $masuk->harga;
        if($transaksi->total_biaya >= $transaksi->perkiraan_biaya){
            $transaksi->ket = $transaksi->total_biaya - $masuk->perkiraan_biaya;
        }
        elseif($transaksi->total_biaya <= $transaksi->perkiraan_biaya){
            $transaksi->ket = $masuk->perkiraan_biaya - $transaksi->total_biaya;
        }
        $transaksi->save();
        return redirect()->route('barang-masuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $kode = BarangMasuk::kode();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $user = User::all();
        $pengajuan = Pengajuan::all();
        $satuan = Satuan::all();
        $masuk = BarangMasuk::findOrFail($id);
        return view('barang-masuk.edit', compact('masuk','pengajuan','satuan','kode','supplier','barang','user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'pengajuan_id' => 'required',
            'tanggal_masuk' => 'required',
            'supplier_id' => 'required',
            'barang_id' => 'required',
            'qty' => 'required',
            'satuan_id' => 'required',
            'perkiraan_biaya' => 'required',
            'harga' => 'required',
            'user_id' => 'required',
        ]);

        $masuk = BarangMasuk::findOrFail($id);
        $masuk->kode_barang_masuk = $request->kode_barang_masuk;
        $masuk->pengajuan_id = $request->pengajuan_id;
        $masuk->tanggal_masuk = $request->tanggal_masuk;
        $masuk->supplier_id = $request->supplier_id;
        $masuk->barang_id = $request->barang_id;
        $masuk->qty = $request->qty;
        $masuk->satuan_id = $request->satuan_id;
        $masuk->perkiraan_biaya = $request->perkiraan_biaya;
        $masuk->harga = $request->harga;
        $masuk->user_id = $request->user_id;
        $masuk->save();

        return redirect()->route('barang-masuk.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masuk = BarangMasuk::findOrFail($id);
        $barang = Barang::where('id',$masuk->barang_id)-> first();
        $barang->qty -= $masuk->qty;
        $barang->save();
        $masuk->delete();
        return redirect()->route('barang-masuk.index');
    }

}
