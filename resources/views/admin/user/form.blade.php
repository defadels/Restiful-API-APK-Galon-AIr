@extends('layout.admin_layout')

@section('title', 'Halaman Data User')

@section('content')
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">User</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Data User</li>
								</ol>
							</nav>
						</div>
                        @if(isset($user))
						<div class="ml-auto">
							<div class="btn-group">
								<button data-toggle="modal" data-target="#deleteModal" class="btn btn-md radius-30 btn-danger">
                                    <i class="bx bx-trash"></i> Hapus</button> 
							</div>
						</div>
                        @endif
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Tambah Data User</h4>
							</div>
							<hr/>
						<form action="">
                            @csrf
                            
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="">
                            </div>
                            
                            <div class="form-group">
                                <label for="nomor_hp">Nomor Handphone</label>
                                <input type="text" name="nama" class="form-control" id="">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="">
                            </div>
                            
                            <div class="form-group">
                                <label for="passowrd">Password</label>
                                <input type="passowrd" name="password" class="form-control" id="">
                            </div>
                            
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-secondary" onclick="window.history.back()">Kembali</button>
                                <input type="submit" value="{{$button}}" class="btn btn-sm btn-primary">
                            </div>

                        </form>
						
						</div>
					</div>

				</div>
			</div>

            @if(isset($user))
                <!-- modal -->
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Delete</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Kamu yakin menghapus data ini?
                                </p>  
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.user.delete', $user->id ?? '') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-sm btn-danger" type="submit">
                                <i class="bx bx-trash"></i>    
                                Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

@endsection