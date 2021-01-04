@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Filter
				</div>
				<div class="card-body">
					<form action="{{url('admin/produk/filter')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="" class="control-label">Nama</label>
							<input type="text" class="form-control" name="nama" value="{{$nama ?? ''}}">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Stok</label>
							<input type="text" class="form-control" name="stok" value="{{$stok ?? ''}}">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Harga Min</label>
									<input type="text" class="form-control" name="harga_min" placeholder="Wajib Masukkan harga" value="{{$harga_min ?? ''}}">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="" class="control-label">Harga Max</label>
									<input type="text" class="form-control" name="harga_max" placeholder="Wajib Masukkan harga" value="{{$harga_max ?? ''}}">
								</div>
							</div>
						</div>
						<button class="btn btn-dark float-right"><i class="fa fa-search"> Filter </i></button>
					</form>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header">
					Data Produk</strong>
					<a href="{{url('admin/produk/create')}}" class="btn btn-dark float-right"><i class="fa fa-plus"></i>Tambah Data</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-datatable">
							<thead>
								<tr>

								<th>No</th>
								<th>Aksi</th>
								<th>Nama Produk</th>
								<th>Harga Produk</th>
								<th>Stok Produk</th>
								

								</tr>
							</thead>
							<tbody>
								@foreach($list_produk as $produk)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<div class="btn-group" role="group" arial-label="Basic example">
										<a href="{{url('admin/produk', $produk->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-info-circle"></i></a>
										<a href="{{url('admin/produk', $produk->id)}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
										@include('template.utils.delete', ['url' => url('admin/produk', $produk->id)])
										</div>
									</td>
									<td>{{$produk->nama}}</td>
									<td>{{$produk->harga}}</td>
									<td>{{$produk->stok}}</td>
								

								</tr>
								@endforeach
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
</div>



@endsection