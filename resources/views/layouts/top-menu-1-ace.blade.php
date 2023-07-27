<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Program Toko Bangunan - Trial</title>

  <meta name="description" content="top menu &amp; navigation" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0')}}" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

  <!-- page specific plugin styles -->
  @stack('header')

  <!-- text fonts -->
  <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css')}}" />

  <!-- ace styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

  <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
  <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css')}}" />

  <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

  <!-- inline styles related to this page -->

  <!-- ace settings handler -->
  <script src="{{ asset('assets/js/ace-extra.min.js')}}"></script>

  <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

  <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Intro.js -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/intro.js/minified/introjs.min.css">
  <script type="text/javascript" src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
</head>
<body class="no-skin">
  <div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state">
    @include('layouts.header.topmenu-main-ace')
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
      try { ace.settings.loadState('main-container') } catch (e) { }
    </script>

    @include('layouts.menu.topmenu-main-ace')

    <div class="main-content">
      @include('sweetalert::alert')
      <div class="main-content-inner">
        <div class="page-content">

          <div class="ace-settings-container" id="ace-settings-container">
            <a href="javascript:void(0);" onclick="javascript:introJs().start();">  
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-info bigger-130"></i>
              </div>
            </a>
          </div>
          <!-- /.tutorial-settings-container -->

          @yield('page-header')

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
				      @yield('main')
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->

    <div class="footer">
      <div class="footer-inner">
        <div class="footer-content">
          <span class="bigger-120">
          <span class="blue bolder">Toko</span>
            Jaya Lestari &copy; 2022-2023
          </span>
        </div>
      </div>
    </div>
    <!-- footer -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
  </div><!-- /.main-container -->

  <!-- basic scripts -->

  <!--[if !IE]> -->
  <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
  
  <!-- <![endif]-->
  
  <!--[if IE]>
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <![endif]-->
  <script type="text/javascript">
  	if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
  </script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

  <!-- page specific plugin scripts -->
  @stack('script')

  <!-- ace scripts -->
  <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
	<script src="{{ asset('assets/js/ace.min.js') }}"></script>
  
  <!-- inline scripts related to this page -->
  @stack('inline_scripts')

  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  <script>
    function deleteConfirmation() {
      swal({
        title: "Apakah Anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        buttons: {
          cancel: {
            text: "Batal",
            value: false,
            visible: true,
            className: "",
            closeModal: true,
          },
          confirm: {
            text: "Hapus",
            value: true,
            visible: true,
            className: "btn-danger",
            closeModal: true
          }
        },
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          document.getElementById('delete').submit();
        }
      });
    }
  </script>
</body>

</html>