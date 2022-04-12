@extends('layout.user_layout')

@section('title','Edit Profile')

@section('content')
			<div class="page-content-wrapper">
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
						<form action="{{route($url, Auth::user()->id ?? '')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            @if(isset($depot))
                             @method('put')
                            @endif

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="profil">Foto Profil</label>
                                            <input type="file" class="form-control @error('foto') {{ 'is-invalid' }} @enderror" value="{{old('profil') ?? $profile->foto ?? ''}}" name="foto" id="">
                                            <small>*File foto harus berupa .jpeg dan .png</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 border-right">
                                       
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="{{Auth::user()->nama}}" class="form-control">
                                            </div>
                                        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="{{Auth::user()->password}}" placeholder="Ketik jika ingin diubah!" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Handphone</label>
                                            <input type="text" name="nomor_hp" value="{{Auth::user()->nomor_hp}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat">{{Auth::user()->alamat}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Hak Akses</label>
                                            <input type="text" name="jenis" value="{{Auth::user()->jenis}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control">
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
                                                <input type="date" name="tgl_lahir" class="form-control" id="">
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" value="https://twitter.com/" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Linked In</label>
                                                <input type="text" class="form-control" value="https://www.linkedin.com/" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" value="https://www.facebook.com/" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dribbble</label>
                                                <input type="text" class="form-control" value="https://dribbble.com/" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Slogan</label>
                                            <input type="text" class="form-control" value="Land Acquisition Specialist" readonly>
                                        </div>
                                       
                                    </div>
                                </div>
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