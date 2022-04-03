@extends('layout.admin_layout')

@section('title', 'Halaman Data Karyawan')

@section('content')
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Karyawan</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
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
								<h4 class="mb-0">Tambah Data Karyawan</h4>
							</div>
							<hr/>
						<form action="{{route($url, $karyawan->id ?? '')}}" method="post">
                            @csrf
                            
                            @if(isset($karyawan))
                             @method('put')
                            @endif

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" value="{{old('nama') ?? $karyawan->nama ?? ''}}" class="form-control @error('nama') {{ 'is-invalid' }} @enderror" id="">
                                @error('nama')
                               
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nomor_hp">Nomor Handphone</label>
                                <input type="text" name="nomor_hp" value="{{old('nomor_hp') ?? $karyawan->nomor_hp ?? ''}}" class="form-control @error('nomor_hp') {{ 'is-invalid' }} @enderror" id="">
                                @error('nomor_hp')
                                    
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                  
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{old('email') ?? $karyawan->email ?? ''}}" class="form-control @error('email') {{ 'is-invalid' }} @enderror" id="">
                                @error('email')
                                 
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                 
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="passowrd">Password</label>
                                <input type="password" name="password" @if(isset($karyawan))placeholder="Ketik jika ingin diubah"@endif class="form-control" id="">
                                @error('password')
                                   
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                   
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" class="form-control @error('jenis') {{ 'is-invalid' }} @enderror">
                                    <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                </select>
                                @error('jenis')
                                    
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                              
                            @enderror
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
                                <form action="{{ route('admin.karyawan.delete', $user->id ?? '') }}" method="post">
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