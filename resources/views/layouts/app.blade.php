<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Codebucks" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- dark layout js -->
    <script src="{{ asset('assets/js/pages/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- simplebar css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }} " rel="stylesheet">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }} " id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.min.css') }}">
    @stack("styles")
</head>
<body>

    <div id="layout-wrapper">
    
        
        <!-- Start topbar -->
        <header id="page-topbar">
            <div class="navbar-header">
    
                <!-- Logo -->
    
                <!-- Start Navbar-Brand -->
                <div class="navbar-logo-box">
                    <a href="index-2.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png')}}" alt="logo-sm-dark" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-dark.png')}}" alt="logo-dark" height="18">
                        </span>
                    </a>
    
                    <a href="index-2.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png')}}" alt="logo-sm-light" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-light.png')}}" alt="logo-light" height="18">
                        </span>
                    </a>
    
                    <button type="button" class="btn btn-sm top-icon sidebar-btn" id="sidebar-btn">
                        <i class="mdi mdi-menu-open align-middle fs-19"></i>
                    </button>
                </div>
                <!-- End navbar brand -->
    
                <!-- Start menu -->
                <div class="d-flex justify-content-between menu-sm px-3 ms-auto">
                    <div class="d-flex align-items-center gap-2">
                       
    
                        
                    </div>
    
                    <div class="d-flex align-items-center gap-2">
                        <!--Start App Search-->
                       
                        <!-- End Notification -->
    
                        <!-- Start Activities -->
                     
                        <!-- End Activities -->
    
                        <!-- Start Profile -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-sm top-icon p-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded avatar-2xs p-0" src="{{ asset('assets/images/users/avatar-6.png')}}" alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-wide dropdown-menu-end dropdown-menu-animated overflow-hidden py-0">
                                <div class="card border-0">
                                    <div class="card-header bg-primary rounded-0">
                                        <div class="rich-list-item w-100 p-0">
                                            <div class="rich-list-prepend">
                                                <div class="avatar avatar-label-light avatar-circle">
                                                    <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                                </div>
                                            </div>
                                            <div class="rich-list-content">
                                                <h3 class="rich-list-title text-white">Admin</h3>
                                                <span class="rich-list-subtitle text-white">admin@codubucks.in</span>
                                            </div>
                                            <div class="rich-list-append"><span class="badge badge-label-light fs-6">6+</span></div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="grid-nav grid-nav-flush grid-nav-action grid-nav-no-rounded">
                                            <div class="grid-nav-row">
                                                <a href="apps-contact.html" class="grid-nav-item">
                                                    <div class="grid-nav-icon"><i class="far fa-address-card"></i></div>
                                                    <span class="grid-nav-content">Profile</span>
                                                </a>
                                                
                                                 
                                            </div>
                                             
                                        </div>
                                    </div>

                                   
                                    <div class="card-footer card-footer-bordered rounded-0">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-label-danger">Sign out</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile -->
                    </div>
                </div>
                <!-- End menu -->
            </div>
        </header>
        <!-- End topbar -->
    
        <!-- ========== Left Sidebar Start ========== -->
        <div class="sidebar-left">
    
            <div data-simplebar class="h-100">
    
                <!--- Sidebar-menu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="left-menu list-unstyled" id="side-menu">
                        <li>
                            <a href="{{route('index')}}" class="">
                                <i class="fas fa-desktop"></i>
                                <span>Home</span>
                            </a>
                        </li>
    
                        
    
                       
                       
    
                        <li class="menu-title">Profile </li>
    
                         
    
                        <li>
                            <a href="javascript: void(0);" class="has-arrow ">
                                <i class="fas fa-table"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                              
                                <li>
                                    <a href="javascript: void(0);"  ><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Attendance </a>
                                   
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow "><i class="mdi mdi-checkbox-blank-circle align-middle"></i> HR </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="datatable-base.html"><i class="mdi mdi-circle-outline"></i> Leave </a></li>
                                        <li><a href="datatable-footer.html"><i class="mdi mdi-circle-outline"></i> Travel </a></li>
                                        <li><a href="datatable-scrollable.html"><i class="mdi mdi-circle-outline"></i> Service Book </a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#!" class="has-arrow "><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Payroll </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="datatable-adv-col-render.html"><i class="mdi mdi-circle-outline"></i> Salary Slip (Monthly)</a></li>
                                        <li><a href="datatable-adv-col-visibility.html"><i class="mdi mdi-circle-outline"></i> Salary Report (Annually)</a></li>
                                        
                                    </ul>
                                </li>
                                 
                            </ul>
                        </li>
                    
     
                     
    
                        <li class="menu-title">Email</li>
    
                        <li>
                            <a href="javascript: void(0);"   >
                                <i class="fas fa-mail-bulk"></i>
                                <span>Email</span>
                            </a>
                            
                        </li>

                        <li class="menu-title">Approval</li>
    
                        <li>
                            <a href="javascript: void(0);"   >
                                <i class="fas fa-mail-bulk"></i>
                                <span>Approval</span>
                            </a>
                            
                        </li>


                        <li class="menu-title">Directory  </li>
    
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Category </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('Category-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Category </a></li>
                                <li><a href="{{ route('Category')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Category </a></li>
                            </ul>
                        </li>
    
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Employee </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('Employee-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Employee </a></li>
                                <li><a href="{{ route('Employee')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Employee </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Client/ Vendor  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('Client-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Client/ Vendor  </a></li>
                                <li><a href="{{ route('Client')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Client/ Vendor  </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Worker  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Worker  </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Worker  </a></li>
                            </ul>
                        </li>





                        <li class="menu-title">Directorate</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Construction  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Construction  </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Construction  </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Products  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Products   </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Products   </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Quality Assurance   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Quality Assurance   </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Quality Assurance   </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Safety  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Safety   </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Safety   </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Asset Management   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Asset Management   </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Asset Management   </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Human Resource   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Human Resource   </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Human Resource   </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Finance & Account    </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Finance & Account    </a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Finance & Account    </a></li>
                            </ul>
                        </li>
                        <li class="menu-title">Library </li>
    
                        
    
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Department</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('department-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Department</a></li>
                                <li><a href="{{ route('department')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Department</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Acts & Rules </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('ActsRules_add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Acts & Rules </a></li>
                                <li><a href="{{route('Acts&Rules')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Acts & Rules </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Books </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('book-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Books </a></li>
                                <li><a href="{{ route('book')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Books </a></li>
                            </ul>
                        </li>
                       

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Circulars </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('circular-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Circulars </a></li>
                                <li><a href="{{ route('circular')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Circulars </a></li>
                            </ul>
                        </li>
                       

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Codes and Standards</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('code-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Codes and Standards</a></li>
                                <li><a href="{{ route('code')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Codes and Standards</a></li>
                            </ul>
                        </li>
                       

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage e-Gurukul</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('comming')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add e-Gurukul</a></li>
                                <li><a href="{{ route('comming')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show e-Gurukul</a></li>
                            </ul>
                        </li>
                       

                         

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage e-Magazine</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('comming')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add e-Magazine</a></li>
                                <li><a href="{{ route('comming')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show e-Magazine</a></li>
                            </ul>
                        </li>
                       

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Formats </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('format-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Formats </a></li>
                                <li><a href="{{ route('format')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Formats </a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage HQI  </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('HQI-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add HQI  </a></li>
                                <li><a href="{{ route('HQI')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show HQI  </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Legal   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('legal-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Legal   </a></li>
                                <li><a href="{{ route('legal')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Legal   </a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Standard Procedures   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('Procedures-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Standard Procedures   </a></li>
                                <li><a href="{{ route('Procedures')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Standard Procedures   </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fa fa-icons"></i>
                                <span>Manage Technical Specification   </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('Technical-add')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Add Technical Specification  </a></li>
                                <li><a href="{{ route('Technical')}}"><i class="mdi mdi-checkbox-blank-circle align-middle"></i> Show Technical Specification </a></li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <div class="main-content">
    @yield('content')
    
        <!-- Start right Content here -->
     
        <!-- end main content-->
    </div>
    </div>
    <!-- end layout-wrapper -->
    
    
     
    
    
    <!-- Rightbar Sidebar -->
     
 
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    
    
    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    
    <!-- App js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables-extension.init.js') }}"></script>



    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>    



    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
    </body>
</html>
