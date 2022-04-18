@extends('layout.user_layout')

@section('title', 'Halaman Data Depot')

@section('content')

<div class="page-content-wrapper">
	
	@include('layout.user.error')

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
											<th scope="col">Logo</th>
											<th scope="col">Nama</th>
											<th scope="col">Alamat</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($daftar_depot as $depot)

										<tr>
											<th style="max-width:70px;" scope="row"><img src="{{Storage::url($depot->foto)}}" class="img-fluid rounded-circle" alt="{{$depot->foto}}" srcset=""></th>
											<td>{{$depot->nama}}</td>
											<td>{{$depot->alamat}}</td>
											<td>
												<a href="{{route('user.depot.orderan', $depot->id)}}" title="Order" class="btn btn-sm btn-secondary"><i class="bx bx-cart"></i></a>
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