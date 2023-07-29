<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state">
  <script type="text/javascript">
    try {
      ace.settings.loadState('sidebar')
    } catch (e) {}
  </script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">

    <ul class="nav nav-list">

      <li class="{{ $menu === 'dashboard' ? 'active open' : '' }} hover">
        <a href="{{ route('dashboard') }}">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'barang' ? 'active open' : '' }} hover">
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-tags"></i>
          <span class="menu-text"> Barang </span>

          <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
          <li class="hover">
            <a href="{{ route('barang.index') }}">
              <i class="menu-icon fa fa-caret-right"></i>
              Master Barang
            </a>

            <b class="arrow"></b>
          </li>

          <li class="hover">
            <a href="{{ route('barang-stok.index') }}">
              <i class="menu-icon fa fa-caret-right"></i>
              Stok Barang
            </a>

            <b class="arrow"></b>
          </li>

          <li class="hover">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Riwayat Masuk
            </a>

            <b class="arrow"></b>
          </li>

          <li class="hover">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Riwayat Keluar
            </a>

            <b class="arrow"></b>
          </li>

        </ul>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-sliders"></i>
          <span class="menu-text"> Kategori Produk </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-desktop"></i>
          <span class="menu-text"> Kasir </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-archive"></i>
          <span class="menu-text"> Barang </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-briefcase"></i>
          <span class="menu-text"> Pengeluaran </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-shopping-basket"></i>
          <span class="menu-text"> Operasional </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-arrows"></i>
          <span class="menu-text"> Laporan </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-money"></i>
          <span class="menu-text"> Transaksi </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-cogs"></i>
          <span class="menu-text"> Pengaturan </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-user"></i>
          <span class="menu-text"> Profil </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-users"></i>
          <span class="menu-text"> Pelanggan </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-file-text-o"></i>
          <span class="menu-text"> Kredit </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
        <a href="#">
          <i class="menu-icon fa fa-child"></i>
          <span class="menu-text"> Karyawan </span>
        </a>

        <b class="arrow"></b>
      </li>

    </ul><!-- /.nav-list -->
  </div>
</div>