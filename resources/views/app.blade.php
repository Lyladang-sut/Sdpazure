<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SKILLS DEVELOPMENT PROGRAMME</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/PACE/themes/blue/pace-theme-flash.css') }}">
    <script type="text/javascript" src="{{ asset('plugins/PACE/pace.min.js') }}"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/animo.js/animate-animo.min.css') }}">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-icon/custom-icon.css') }}">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/message.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery.steps/demo/css/jquery.steps.css') }}"/>
    <!-- DataTables-->
    <link href="https://fonts.googleapis.com/css?family=Battambang|Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-keytable-bs/css/keyTable.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-select-bs/css/select.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-fixedcolumns-bs/css/fixedColumns.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/css/fourth-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesnt work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
    <![endif]-->

    @stack('styles')
</head>

<body >

    <div id="overlay">
        <div class="text">កំពុងដំណើរការ | Processing...</div>
    </div>

    <!-- Header start-->
    <header>
        <div class="search-bar closed">
            <form>
                <div class="input-group input-group-lg">
                    <input type="text" placeholder="Search for..." class="form-control"><span class="input-group-btn">
              <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
                </div>
            </form>
        </div>
        <a href="index.html" class="brand pull-left"><img src="#" alt="" width="100" class="logo"><img src="{{ asset('build/images/logo/logo-sm-light.png') }}" alt="" width="28" class="logo-sm"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
        <form class="mt-15 mb-15 pull-left hidden-xs">
            <div class="form-group has-feedback mb-0">
                <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 200px" class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputSearchFor" class="sr-only">(default)</span>
            </div>
        </form>
        <ul class="notification-bar list-inline pull-right">
            <li class="dropdown">
                <a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
                    <div class="media mt-0">
                        <div class="media-left avatar"><img src="{{ asset('images/default.png') }}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                        <div class="media-right media-middle pl-0">
                            <p class="fs-12 text-base mb-0">Hi, {{ \Auth::user()->{'Full Name'} }}</p>
                        </div>
                    </div>
                </a>
                <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
                    <li><a href="profile.html"><i class="ti-user mr-5"></i> My Profile</a></li>
                    <li><a href="profile.html"><i class="ti-settings mr-5"></i> Account Settings</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="ti-power-off mr-5"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Header end-->
    <div id="App" class="main-container">
        <!-- Main Sidebar start-->
        <aside class="main-sidebar"  style="z-index: 1;">
            <div class="user" style="padding:0">
                <div  data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="avatar img-circle">
                    
                </div>
                <h3 class="fs-16 text-white mt-15 mb-5 fw-300">SDP Database</h4>
                <p class="mb-0 text-muted text-white">Management System</p>
            </div>
            <ul class="list-unstyled navigation mb-0">
                @foreach(Menu::get('Navigation')->roots() as $MENU => $menu)
                    @if(Menu::get('Navigation')->item($menu->nickname)->hasChildren())
                        <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#{{$menu->id}}" aria-expanded="{{ ($menu->isActive) ? 'true' : 'false' }}" aria-controls="collapse1" class="bubble collapsed {{ ($menu->isActive) ? 'active' : '' }}"><i class="{{ $menu->beforeHTML }}"></i><span class="sidebar-title">{{$menu->title}}</span></a>
                            <ul id="{{$menu->id}}" class="list-unstyled collapse {{ ($menu->isActive) ? 'in' : '' }}">
                                @foreach(Menu::get('Navigation')->{$menu->nickname}->children() as $SUB => $sub)
                                    <li><a class="{{ ($sub->isActive) ? 'active' : '' }}" href="{!! $sub->url() !!}">{{$sub->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="panel"><a href="{!! $menu->url() !!}"><i class="{{ $menu->beforeHTML }}"></i><span class="sidebar-title"> {{$menu->title}} </span></a></li>
                    @endif
                @endforeach
            </ul>
        </aside>
        <!-- Main Sidebar end-->
        <div class="page-container">
            <div class="page-header container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">@yield('title')</h4>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">

                @if(Session::has('message'))
                    <div class="ui positive message">
                        <i class="close icon"></i>
                        <div class="header">
                            Success
                        </div>
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header">
                            Please recheck and try again!
                        </div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')
            </div>
            <!--<div class="footer">2018 &copy; <a href="http://angkordev.com">Developed By Angkor Dev</a></div>-->
        </div>
    </div>
    <!-- Modal -->
    <div id="warning-modal-error" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Warning:</h4>
            </div>
            <div class="modal-body">
                <p style="color:red;" id='warning-modal-error-msg'></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>
   
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery-->
    <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="{{ asset('plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="{{ asset('plugins/animo.js/animo.min.js') }}"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="{{ asset('plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
    <!-- date picker -->
    <script type="text/javascript" src="{{ asset('js/datepicker.min.js') }}"></script>
    <!-- DataTables-->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jszip/dist/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/pdfmake/build/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/pdfmake/build/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="{{ asset('build/js/fourth-layout/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/js/fourth-layout/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/js/page-content/tables/data-tables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/moment.js') }}"></script>

    @stack('scripts')
</body>

</html>