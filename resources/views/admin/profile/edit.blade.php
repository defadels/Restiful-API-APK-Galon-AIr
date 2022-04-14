@extends('layout.admin_layout')

@section('title','Edit Profile')

@section('content')
			<div class="page-content-wrapper">
                @include('layout.admin.error')
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Profile</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
								</ol>
							</nav>
						</div>
                       
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Edit Profile</h4>
							</div>
							<hr/>
						<form action="{{route($url, Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')  

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="foto">Foto Profil</label>
                                            <input type="file" class="form-control @error('foto') {{ 'is-invalid' }} @enderror" value="{{old('foto') ?? $profile->foto ?? ''}}" name="foto" id="foto">
                                            <small>*File foto harus berupa .jpeg dan .png</small>
                                            @error('foto')
                                    
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 border-right">
                                       
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" value="{{old('nama') ?? $profile->nama ?? ''}}" class="form-control @error('nama') {{ 'is-invalid' }} @enderror" id="nama">
                                                @error('nama')
                                    
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                    
                                            @enderror
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" value="{{old('email') ?? $profile->email ?? ''}}" name="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" id="email">
                                                @error('email')
                                        
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                    
                                            @enderror
                                            </div>
                                        
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" placeholder="Ketik jika ingin diubah" class="form-control @error('password') {{ 'is-invalid' }} @enderror" id="password">
                                            @error('password')
                                    
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                
                                        @enderror
                                        </div>

                                    
                                        <div class="form-group">
                                            <label for="nomor_hp">Nomor Handphone</label>
                                            <input type="text" value="{{old('nomor_hp') ?? $profile->nomor_hp ?? ''}}" name="nomor_hp" class="form-control @error('nomor_hp') {{ 'is-invalid' }} @enderror" id="nomor_hp">
                                            @error('nomor_hp')
                                    
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                
                                        @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat">{{old('alamat') ?? $profile->alamat ?? ''}}</textarea>
                                            @error('alamat')
                                    
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                
                                        @enderror
                                        </div>

                                    </div>
                                  <!--  <div class="col-12 col-lg-7">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" disabled>
                                                    <option>-- Pilih Jenis Kelamin --</option>
                                                    <option>Pria</option>
                                                    <option>Wanita</option>
                                                </select>
                                            </div>
                                          
                                        </div>
                                        <div class="form-group">
                                            <p class="mb-0">Tanggal Lahir</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="date" name="tgl_lahir" class="form-control" id="" disabled>
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" value="" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Linked In</label>
                                                <input type="text" class="form-control" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" value="" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dribbble</label>
                                                <input type="text" class="form-control" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Slogan</label>
                                            <input type="text" class="form-control" value="" disabled>
                                        </div>
                                       
                                    </div>
                                </div> -->
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

           
@endsection