<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('assets/img/logo_perpustakaan.png') }}"
     alt="logo"
     style="width:30px; height:30px; border-radius:50%; object-fit:cover;">
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">PM</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('MAIN MENU') }}</li>

            {{-- ADMIN MENU --}}
            @if(session('role') == 'admin')

                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('books*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('books.index') }}">
                        <i class="fas fa-book"></i>
                        <span>{{ __('Books') }}</span>
                    </a>
</li>

                <li class="{{ Route::is('loans*') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('loans.index') }}">
                        <i class="fas fa-handshake"></i>
                         <span>Peminjaman</span>
                        </a>
                </li>

            @endif


            {{-- USER MENU --}}
            @if(session('role') == 'user')

                <li class="{{ Route::is('user.dashboard*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                     <li class="{{ Route::is('user.loans') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.loans') }}">
                          <i class="fas fa-history"></i>
                           <span>Riwayat Pinjaman</span>
                         </a>
                </li>
                </li>

            @endif

            <li>
                <a class="nav-link text-danger" href="{{ route('signout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
