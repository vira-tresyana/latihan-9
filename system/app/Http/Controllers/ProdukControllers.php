<?php 

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukControllers extends Controller{
	function index(){
		$user = request()->user();
		$data['list_produk'] = $user->produk;
		return view('admin/produk/index', $data);

	}

	function create(){
		return view('admin/produk/create');

	}

	function store(){
		$produk = new Produk;
		$produk->id_user = request()->user()->id;
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->stok = request('stok');
		$produk->id_kategori = request('id_kategori');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
	}

	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('admin/produk/show', $data);
		

	}

	function edit(Produk $produk){
		$data['produk'] = $produk;
		return view('admin/produk/edit', $data);

	}

	function update(Produk $produk){
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->berat = request('berat');
		$produk->stok = request('stok');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		return redirect('admin/produk')->with('success', 'Data Berhasil Diedit');

	}

	function destroy(Produk $produk){
		$produk->delete();

		return redirect('admin/produk')->with('danger', 'Data Berhasil Dihapus');

	}

	function filter(){
		$nama = request('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		// $data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
		// $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		$data['list_produk'] = Produk::whereNotIn('stok', [0])->where('nama','like', "%$nama%")->whereYear('created_at', '2020')->whereBetween('harga', [$harga_min, $harga_max])->get();
		$data['nama'] = $nama;
		$data['stok'] = request('stok');
		

		return view('admin/produk/index', $data);	
	}

}





 