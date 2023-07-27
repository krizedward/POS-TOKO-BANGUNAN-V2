<!-- import-template -->
@extends('layouts.top-menu-ace')

<!-- main -->
@push('header')
<!-- untuk style header -->
@endpush

@section('breadcrumbs')
<!-- breadcrumbs -->
@endsection

@section('page-header')
  <!-- page-header -->
  <div class="page-header">
    <h1>
      Dashboard
      <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Ringkasan Semua Fitur
      </small>
    </h1>
  </div><!-- /.page-header -->
@endsection

@section('main')
  <div class="row">
    <div class="space-6"></div>
    <div class="col-sm-7 infobox-container">
      <div class="row-1">
        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">TOTAL BARANG</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>

        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">KEUNTUNGAN</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>

        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">OMSET</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>
      </div>

      <div class="row-2">
        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">MODAL</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>

        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">OPERASIONAL</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>

        <div class="infobox infobox-blue">
          <div class="infobox-icon">
            <i class="ace-icon fa fa-building"></i>
          </div>
          <div class="infobox-data">
            <span class="infobox-data-number">0</span>
            <div class="infobox-content">PENGELUARAN</div>
          </div>
          <!-- <div class="stat stat-success">8%</div> -->
        </div>
      </div>
    </div>
    <div class="vspace-12-sm"></div>
    <div class="col-sm-5">
      <div class="widget-box">
        
        <div class="widget-header widget-header-flat widget-header-small">
          <h5 class="widget-title">Tabel Barang Masuk</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <table class="table  table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Semen</td>
                  <td>30</td>
                  <td>Sak</td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->

      </div><!-- /.widget-box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@push('script')
<!-- none -->
@endpush

@push('inline_scripts')
  <!-- membuat tambahain script -->
  <script type="text/javascript">
    jQuery(function($) {
      var $sidebar = $('.sidebar').eq(0);
      if (!$sidebar.hasClass('h-sidebar')) return;
      $(document).on('settings.ace.top_menu', function(ev, event_name, fixed) {
        if (event_name !== 'sidebar_fixed') return;
        var sidebar = $sidebar.get(0);
        var $window = $(window);
        //return if sidebar is not fixed or in mobile view mode
        var sidebar_vars = $sidebar.ace_sidebar('vars');
        if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {
          $sidebar.removeClass('lower-highlight');
          //restore original, default marginTop
          sidebar.style.marginTop = '';
          $window.off('scroll.ace.top_menu')
          return;
        }
        var done = false;
        $window.on('scroll.ace.top_menu', function(e) {
          var scroll = $window.scrollTop();
          scroll = parseInt(scroll / 4); //move the menu up 1px for every 4px of document scrolling
          if (scroll > 17) scroll = 17;
          if (scroll > 16) {
            if (!done) {
              $sidebar.addClass('lower-highlight');
              done = true;
            }
          } else {
            if (done) {
              $sidebar.removeClass('lower-highlight');
              done = false;
            }
          }
          sidebar.style['marginTop'] = (17 - scroll) + 'px';
        }).triggerHandler('scroll.ace.top_menu');
      }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
      $(window).on('resize.ace.top_menu', function() {
        $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass(
          'sidebar-fixed')]);
      });
    });
  </script>
@endpush