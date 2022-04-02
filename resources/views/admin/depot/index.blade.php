@extends('layout.admin_layout')

@section('title', 'Halaman Data User')

@section('content')

<div class="page-content-wrapper">
	
	@include('layout.admin.error')

				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Tables</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Data Depot</li>
								</ol>
							</nav>
						</div>
						<div class="ml-auto">
							<div class="btn-group">
								<a href="{{route('admin.depot.create')}}" class="btn btn-primary">+ Depot</a> 
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Data Depot</h4>
							</div>
							<hr/>
							<div class="table-responsive">
							@if($daftar_depot->total())		
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama</th>
											<th scope="col">Email</th>
											<th scope="col">Nomor Handphone</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($daftar_depot as $depot)

										<tr>
											<th scope="row">1</th>
											<td>{{$depot->nama}}</td>
											<td>{{$depot->email}}</td>
											<td>{{$depot->nomor_hp}}</td>
											<td>
												<a href="{{route('admin.depot.edit',$depot->id)}}" title="Edit data" class="btn btn-sm btn-success"><i class="bx bx-edit"></i></a>
												<a href="" title="Order" class="btn btn-sm btn-danger"><i class="bx bx-cart"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
									

								{{$daftar_depot->links()}}	
								@else 
									<h4 class="text-center p-3">Data depot kosong</h4>
								@endif
							
							</div>
						
						</div>
					</div>

				</div>
			</div>


@endsection