<li class="nav-item dropdown">
  <a class="dropdown-toggle" href="javascript:void(0);">
    <span class="icon-holder">
      <i class="c-orange-500 ti-panel"></i>
    </span>
    <span class="title">Referensi</span>
    <span class="arrow">
      <i class="ti-angle-right"></i>
    </span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="{!! route('ref.fakultas') !!}">Fakultas</a></li>
    <li><a href="{!! route('ref.jurusan') !!}">Jurusan</a></li>
    <li><a href="{!! route('ref.prodi') !!}">Program Studi</a></li>
    {{--<li><a href="{!! route('ref.kelas') !!}">Kelas</a></li>--}}
    <li><a href="{!! route('ref.akreditasi') !!}">Akreditasi</a></li>
    <li><a href="{!! route('ref.jenisakun') !!}">Jenis Akun</a></li>
    <li><a href="{!! route('ref.jenisrekening') !!}">Rekening</a></li>
  </ul>
</li>
<li class="nav-item dropdown">
  <a class="dropdown-toggle" href="javascript:void(0);">
    <span class="icon-holder">
      <i class="c-orange-500 ti-money"></i>
    </span>
    <span class="title">Keuangan</span>
    <span class="arrow">
      <i class="ti-angle-right"></i>
    </span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="{!! route('penerimaan.index') !!}">Akun Penerimaan</a></li>
    <li><a href="{!! route('pengeluaran.index') !!}">Akun Pengeluaran</a></li>
    <li><a href="{!! route('saldo.index') !!}">Saldo</a></li>
  </ul>
</li>
<li class="nav-item">
  <a class='sidebar-link' href="{!! route('layanan.index') !!}">
    <span class="icon-holder">
      <i class="c-orange-500 ti-cloud"></i>
    </span>
    <span class="title">Layanan</span>
  </a>
</li>
<li class="nav-item">
  <a class='sidebar-link' href="#">
    <span class="icon-holder">
      <i class="c-orange-500 ti-user"></i>
    </span>
    <span class="title">Users</span>
  </a>
</li>