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
									<li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
								</ol>
							</nav>
						</div>
						<div class="ml-auto">
							<div class="btn-group">
								<a href="{{route('admin.karyawan.create')}}" class="btn btn-primary">+ Karyawan</a> 
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Data Karyawan</h4>
							</div>
							<hr/>
							<div class="table-responsive">
							@if($users->total())		
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama</th>
											<th scope="col">Email</th>
											<th scope="col">Nomor Handphone</th>
											<th scope="col">Jenis</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $user)

										<tr>
											<th scope="row">{{($users->currentPage()- 1) * $users->perPage() + $loop->iteration}}</th>
											<td>{{$user->nama}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->nomor_hp}}</td>
											<td><button class="btn btn-sm @if($user->jenis == 'admin') {{'btn-primary'}} @else {{'btn-secondary'}} @endif">{{$user->jenis}}</button></td>
											<td>
												<a href="{{route('admin.user.edit',$user->id)}}" title="Edit data" class="btn btn-sm btn-success"><i class="bx bx-edit"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
									

								{{$users->links()}}	
								@else 
									<h4 class="text-center p-3">Data karyawan kosong</h4>
								@endif
							
							</div>
						
						</div>
					</div>

				</div>
			</div>


@endsection