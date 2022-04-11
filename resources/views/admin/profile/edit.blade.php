@extends('layout.admin_layout')

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
                                            <input type="file" class="form-control @error('profil') {{ 'is-invalid' }} @enderror" value="{{old('profil') ?? $profile->profil ?? ''}}" name="profil" id="">
                                            <small>*File foto harus berupa .jpeg dan .png</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 border-right">
                                       
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" value="{{Auth::user()->nama}}" class="form-control">
                                            </div>
                                        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" value="1234560000" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" value="svetlana1997@example.com" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" value="99-10-XXX-XXX" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" value="116-B, Cutela Colony, Sydney, Australia" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nation</label>
                                            <input type="text" value="Australia" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Gender</label>
                                                <select class="form-control">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Language</label>
                                                <select class="form-control">
                                                    <option>English</option>
                                                    <option>German</option>
                                                    <option>French</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="mb-0">Date of Birth</p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <select class="form-control">
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option selected>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control">
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option selected>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>22</option>
                                                    <option>23</option>
                                                    <option>24</option>
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                    <option>31</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control">
                                                    <option>1990</option>
                                                    <option>1991</option>
                                                    <option>1992</option>
                                                    <option selected>1993</option>
                                                    <option>1994</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control" value="https://twitter.com/anyukova">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Linked In</label>
                                                <input type="text" class="form-control" value="https://www.linkedin.com/anyukova/">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" value="https://www.facebook.com/anyukova">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dribbble</label>
                                                <input type="text" class="form-control" value="https://dribbble.com/anyukova/">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Slogan</label>
                                            <input type="text" class="form-control" value="Land Acquisition Specialist">
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="card shadow-none border mb-3 mb-md-0">
                                                        <div class="card-body">
                                                            <div class="media align-items-center">
                                                                <img src="assets/images/icons/credit-card-visa.png" width="50" alt="">
                                                                <div class="media-body ml-2">
                                                                    <h6 class="mb-0">Visa...8759</h6>
                                                                    <p class="mb-0">Expires 06/21</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-transparent text-right"> <a href="javascript:;" class="text-danger">REMOVE</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="card shadow-none border mb-0">
                                                        <div class="card-body">
                                                            <div class="media align-items-center">
                                                                <img src="assets/images/icons/mastercard-2.png" width="50" alt="">
                                                                <div class="media-body ml-2">
                                                                    <h6 class="mb-0">Master...8314</h6>
                                                                    <p class="mb-0">Expires 08/24</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer bg-transparent text-right"> <a href="javascript:;" class="text-danger">REMOVE</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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