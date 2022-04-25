@extends('layout.admin_layout')

@section('title', 'Orderan Masuk')

@section('content')

<div class="page-content-wrapper">
	
	@include('layout.admin.error')

				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Orderan</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Data Orderan Masuk</li>
								</ol>
							</nav>
						</div>
						<div class="ml-auto">
							<div class="btn-group">
								<a href="{{route('admin.depot')}}" class="btn btn-primary">+ Order</a> 
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Data Orderan Masuk</h4>
							</div>
							<hr/>
							<div class="table-responsive">
							@if($orderan->total())		
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">Tanggal</th>
											<th scope="col">Nama Pelanggan</th>
											<th scope="col">Total Harga</th> 
                                            <th scope="col">Status</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orderan as $order)

										<tr>
											<th style="max-width:70px;" scope="row">{{$order->tanggal}}</th>
											<td>{{$order->dibuat->nama}}</td>
											<td>Rp.{{number_format($order->total_harga)}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">{{$order->status}}</button></td>
											<td>
												<a href="{{route('admin.pesanan.lihat', [$order->id, $order->depot_id])}}" title="Lihat" class="btn btn-sm btn-secondary"><i class="bx bx-show"></i></a>
                                                <a href="{{route('admin.pesanan.masuk', [$order->id, $order->depot_id])}}" title="Edit" class="btn btn-sm btn-success"><i class="bx bx-edit"></i></a>
											</td>
										</tr>

										@endforeach
									</tbody>
								</table>
									

								{{$orderan->links()}}	
								@else 
									<h4 class="text-center p-3">Orderan kosong</h4>
								@endif
							
							</div>
						
						</div>
					</div>

				</div>
			</div>

			

@endsection