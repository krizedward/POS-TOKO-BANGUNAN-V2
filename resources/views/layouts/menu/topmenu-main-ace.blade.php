<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state">
  <script type="text/javascript">
    try {
      ace.settings.loadState('sidebar')
    } catch (e) {}
  </script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-info">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-info"></span>

      <span class="btn btn-info"></span>

      <span class="btn btn-info"></span>

      <span class="btn btn-info"></span>
    </div>
  </div><!-- /.sidebar-shortcuts -->

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
        <i class="menu-icon fa fa-desktop"></i>
        <span class="menu-text">
          Barang
        </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">

        <li class="hover">
          <a href="{{ route('barang.index') }}">
            <i class="menu-icon fa fa-caret-right"></i>
            Barang
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
          <a href="{{ route('log-barang-masuk.index') }}">
            <i class="menu-icon fa fa-caret-right"></i>
            Riwayat Masuk
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="{{ route('log-barang-keluar.index') }}">
            <i class="menu-icon fa fa-caret-right"></i>
            Riwayat Keluar
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="{{ route('kategori-barang-umum.index') }}">
            <i class="menu-icon fa fa-caret-right"></i>
            Kategori Barang Umum
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="{{ route('kategori-barang.index') }}">
            <i class="menu-icon fa fa-caret-right"></i>
            Kategori Barang
          </a>

          <b class="arrow"></b>
        </li>

      </ul>

    </li>

    <li class="hover">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Tables </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="hover">
          <a href="tables.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Simple &amp; Dynamic
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="jqgrid.html">
            <i class="menu-icon fa fa-caret-right"></i>
            jqGrid plugin
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <li class="hover">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-pencil-square-o"></i>
        <span class="menu-text"> Forms </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="hover">
          <a href="form-elements.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Form Elements
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="form-elements-2.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Form Elements 2
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="form-wizard.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Wizard &amp; Validation
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="wysiwyg.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Wysiwyg &amp; Markdown
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="dropzone.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Dropzone File Upload
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <li class="hover">
      <a href="widgets.html">
        <i class="menu-icon fa fa-list-alt"></i>
        <span class="menu-text"> Widgets </span>
      </a>

      <b class="arrow"></b>
    </li>
    <!-- 
        <li class="hover">
          <a href="calendar.html">
            <i class="menu-icon fa fa-calendar"></i>

            <span class="menu-text">
              Calendar

              <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
              </span>
            </span>
          </a>

          <b class="arrow"></b>
        </li> -->

    <li class="hover">
      <a href="gallery.html">
        <i class="menu-icon fa fa-picture-o"></i>
        <span class="menu-text"> Gallery </span>
      </a>

      <b class="arrow"></b>
    </li>

    <li class="hover">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-tag"></i>
        <span class="menu-text"> More Pages </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="hover">
          <a href="profile.html">
            <i class="menu-icon fa fa-caret-right"></i>
            User Profile
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="inbox.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Inbox
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="pricing.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Pricing Tables
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="invoice.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Invoice
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="timeline.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Timeline
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="search.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Search Results
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="email.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Email Templates
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="login.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Login &amp; Register
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>

    <li class="hover">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-file-o"></i>

        <span class="menu-text">
          Other Pages

          <span class="badge badge-primary">5</span>
        </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="hover">
          <a href="faq.html">
            <i class="menu-icon fa fa-caret-right"></i>
            FAQ
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="error-404.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Error 404
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="error-500.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Error 500
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="grid.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Grid
          </a>

          <b class="arrow"></b>
        </li>

        <li class="hover">
          <a href="blank.html">
            <i class="menu-icon fa fa-caret-right"></i>
            Blank Page
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>
  </ul><!-- /.nav-list -->
</div>