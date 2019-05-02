@php
  $sides = \App\Catalog::take(7)->get();
@endphp
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                @if (Auth::user() && Auth::user()->role == "admin")
                  <li class="header">MASTER</li>
                  <li>
                    <a href="{{route('kategori.index')}}">
                      <span>Kategori</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('produk.index')}}">
                      <span>Produk</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('home')}}">
                      <span>Kontak</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('carousel.index')}}">
                      <span>Slide Show</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{route('home')}}">
                      <span>Pegawai</span>
                    </a>
                  </li>
                @else
                  <li class="header">PRODUCTS</li>
                  @foreach ($sides as $key => $value)
                    <li>
                      <a href="javascript:void(0);">
                        <span>{{$value->name}}</span>
                      </a>
                    </li>
                  @endforeach
                  <li>
                    <a href="{{route('kategori.index')}}"><span>Produk Lainnya --></span></a>
                  </li>
                @endif
                <li class="header">TENTANG KAMI</li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Tentang Kami</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Karir</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Kontak</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Syarat dan Ketentuan</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Privasi</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Konfirmasi Pembayaran</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    