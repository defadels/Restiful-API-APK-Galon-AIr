<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            {{-- <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon-2" alt="" /> --}}
        </div>
        <div>
            <h4 class="logo-text">Galon Air</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
           
                <a href="{{ route('user.dashboard') }}">
                    <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
          
        </li>
        <li class="menu-label">Web Apps</li>
        <li>
            <a href="{{ route('user.depot') }}">
                <div class="parent-icon icon-color-7"><i class="bx bx-water"></i>
                </div>
                <div class="menu-title">Depot</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-6"><i class="bx bx-cart"></i>
                </div>
                <div class="menu-title">Orderan</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Masuk</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Diproses</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Dikirim</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Selesai</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Batal</a>
                </li>
            </ul>
        </li>
    
        <li class="menu-label">Lainnya</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-8"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Pengaturan</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Pembayaran</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Pengiriman</a>
                </li>
            </ul>
        </li>
        
       
       
        
      
    </ul>
    <!--end navigation-->
</div>