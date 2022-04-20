@extends('layout.admin_layout')

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
                   
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Tambah Orderan Masuk</h4>
							</div>
							<hr/>
						<form action="{{route($url, $pesanan->id ?? '')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            @if(isset($pesanan))
                             @method('put')
                            @endif

                            <div class="row">
                                <div class="col-md-6 border-right">
                                    <h6><strong>Nama Pelanggan</strong> </h6>
                                    <p>{{$orderan->dibuat->nama}}</p>       
                                    <h6><strong>Alamat</strong></h6>
                                    <p>{{$orderan->dibuat->alamat}}</p>       
                                    <h6><strong>Nomor Handphone</strong></h6>
                                    <p>{{$orderan->dibuat->nomor_hp}}</p>       
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>Nama Depot</strong></h6>
                                    <p>{{$depot->nama}}</p>
                                    <h6><strong>Alamat</strong></h6>
                                    <p>{{$depot->alamat}}</p>
                                    <h6><strong>Nomor Handphone</strong></h6>
                                    <p>{{$depot->nomor_hp}}</p>
                                </div>
                            </div>
                            <hr>
                            
                            
                            <div class="form-group">
                                <label for="harga">Pilihan Harga</label>
                            
                                @if($orderan->total === $depot->harga_ambil)

                                    <p>Harga Ambil</p>

                                @endif

                                @if($orderan->total === $depot->harga_jemput)

                                <p>Harga Jemput</p>

                                @endif
                           

                                <p>{{$orderan->harga}}</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="total">Harga</label>
                                <p>{{$orderan->total}}</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pesan</label>
                                <p>{{$orderan->jumlah}}</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <p>{{$orderan->total_harga}}</p>
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

@section('page_script')
    
    <script>
        $(document).ready(function(){

           $('select.harga').change(function(){
                var pilihHarga = $(this).children("option:selected").val();

                $('#total').val(pilihHarga);
           }); 

          function hitung() {
                var harga = $('#total').val();
                var jumlah = $('#jumlah').val();
                var total_harga = harga * jumlah;

                $('#total_harga').val(total_harga);
          }

          $('#total_harga, #total, #jumlah, .harga').change(function(){
              hitung();
          })
          
          $('#total_harga, #total, #jumlah, .harga').keyup(function(){
              hitung();
          })

        }); 
       

     </script>   
@endsection