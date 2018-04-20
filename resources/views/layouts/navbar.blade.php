<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Referensi <span class="caret"></span></a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('ref.fakultas') !!}">Fakultas</a></li>
                        <li><a href="{!! route('ref.jurusan') !!}">Jurusan</a></li>
                        <li><a href="{!! route('ref.prodi') !!}">Program Studi</a></li>
                        {{--<li><a href="{!! route('ref.kelas') !!}">Kelas</a></li>--}}
                        <li><a href="{!! route('ref.akreditasi') !!}">Akreditasi</a></li>
                        <li><a href="{!! route('ref.jenisakun') !!}">Jenis Akun</a></li>
                        <li><a href="{!! route('ref.jenisrekening') !!}">Rekening</a></li>
                    </ul>
                </li>

                <li><a href="{!! route('layanan.index') !!}">Layanan</a> </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Keuangan <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('penerimaan.index') !!}">Akun Penerimaan</a></li>
                        <li><a href="{!! route('pengeluaran.index') !!}">Akun Pengeluaran</a></li>
                        <li><a href="{!! route('saldo.index') !!}">Saldo</a></li>
                    </ul>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>