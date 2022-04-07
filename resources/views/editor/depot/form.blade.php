@extends('layout.editor_layout')

@section('title', 'Halaman Data Depot')

@section('content')
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pr-3">Depot</div>
						<div class="pl-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Data Depot</li>
								</ol>
							</nav>
						</div>
                        @if(isset($depot))
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
								<h4 class="mb-0">Tambah Data Depot</h4>
							</div>
							<hr/>
						<form action="{{route($url, $depot->id ?? '')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            @if(isset($depot))
                             @method('put')
                            @endif

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" value="{{old('logo') ?? $depot->logo ?? ''}}" class="form-control @error('logo') {{ 'is-invalid' }} @enderror" id="">
                                @error('logo')
                                @foreach($errors->all() as $error)
                                <span class="text-danger">
                                    {{$error}}
                                </span>
                                @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nama">Nama Depot</label>
                                <input type="text" name="nama" value="{{old('nama') ?? $depot->nama ?? ''}}" class="form-control @error('nama') {{ 'is-invalid' }} @enderror" id="">
                                @error('nama')
                                @foreach($errors->all() as $error)
                                <span class="text-danger">
                                    {{$error}}
                                </span>
                                @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="harga_ambil">Harga Ambil</label>
                                <input type="number" name="harga_ambil" value="{{old('harga_ambil') ?? $depot->harga_ambil ?? ''}}" class="form-control @error('harga_ambil') {{ 'is-invalid' }} @enderror" id="">
                                @error('harga_ambil')
                                @foreach($errors->all() as $error)
                                <span class="text-danger">
                                    {{$error}}
                                </span>
                                @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="harga_jemput">Harga Jemput</label>
                                <input type="number" name="harga_jemput" value="{{old('harga_jemput') ?? $depot->harga_jemput ?? ''}}" class="form-control @error('harga_jemput') {{ 'is-invalid' }} @enderror" id="">
                                @error('harga_jemput')
                                @foreach($errors->all() as $error)
                                <span class="text-danger">
                                    {{$error}}
                                </span>
                                @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nomor_hp">Nomor Handphone</label>
                                <input type="text" name="nomor_hp" value="{{old('nomor_hp') ?? $depot->nomor_hp ?? ''}}" class="form-control @error('nomor_hp') {{ 'is-invalid' }} @enderror" id="">
                                @error('nomor_hp')
                                    @foreach($errors->all() as $error)
                                    <span class="text-danger">
                                        {{$error}}
                                    </span>
                                    @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="" cols="20" rows="5" class="form-control @error('alamat') {{ 'is-invalid' }} @enderror">{{old('alamat') ?? $depot->alamat ?? ''}}</textarea>
                                @error('alamat')
                                    @foreach($errors->all() as $error)
                                    <span class="text-danger">
                                        {{$error}}
                                    </span>
                                    @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{old('email') ?? $depot->email ?? ''}}" class="form-control @error('email') {{ 'is-invalid' }} @enderror" id="">
                                @error('email')
                                    @foreach($errors->all() as $error)
                                    <span class="text-danger">
                                        {{$error}}
                                    </span>
                                    @endforeach
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="passowrd">Password</label>
                                <input type="password" name="password" @if(isset($depot))placeholder="Ketik jika ingin diubah"@endif class="form-control" id="">
                                @error('password')
                                    @foreach($errors->all() as $error)
                                    <span class="text-danger">
                                        {{$error}}
                                    </span>
                                    @endforeach
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

            @if(isset($depot))
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
                                <form action="{{ route('admin.depot.delete', $depot->id ?? '') }}" method="post">
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