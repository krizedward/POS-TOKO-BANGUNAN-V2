    <div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state">
      <script type="text/javascript">
        try { ace.settings.loadState('sidebar') } catch (e) { }
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

        <li class="{{ $menu === 'produk' ? 'active open' : '' }} hover">
          <a href="{{ route('produk.index') }}">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text"> Monitor Produk </span>
          </a>

          <b class="arrow"></b>
        </li>

        <li class="{{ $menu === 'kategori-produk' ? 'active open' : '' }} hover">
          <a href="{{ route('kategori.produk.index') }}">
            <i class="menu-icon fa fa-book"></i>
            <span class="menu-text"> Kategori Produk </span>
          </a>

          <b class="arrow"></b>
        </li>
        

        <!-- <li class="{{ Route::currentRouteName() === 'kategori.produk.index' ? 'active open' : '' }} hover">
          <a href="{{ route('kategori.produk.index') }}">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> Monitor Kategori </span>
          </a>

          <b class="arrow"></b>
        </li> -->
        
      </ul><!-- /.nav-list -->
    </div>