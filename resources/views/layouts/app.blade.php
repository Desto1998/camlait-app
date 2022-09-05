<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAMLAIT @yield('title')</title>
    @yield('css_before')
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo/logo_gssc.png')}}">
    <!-- Datatable css -->
    <link href="{{asset('template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <!-- Toastr -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <!-- Toastr -->

    <link href="{{asset('template/vendor/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <!-- Javascript -->
    <script src="{{ asset('app.js') }}" defer></script>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>

</head>
<body>
<!--*******************
       Preloader start
   ********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->
<!--**********************************
       Main wrapper start
   ***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{ route('home') }}" class="brand-logo">
            {{--            <img class="logo-abbr" style="width: 60px;height: 40px" src="{{asset('images/logo/logo_gssc.png')}}"--}}
            {{--                 alt="Not found">--}}
            <img class="logo-compact" src="{{asset('images/logo/logo_gssc.png')}}" alt="">
            <img class="brand-title" style="width: 500px" src="{{asset('images/logo/logo_gssc.png')}}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="list-unstyled">
                                    <a href="{{ route('notify.all') }}" class="all-notification" id="all-notification">Voir
                                        plus</a>
                                </ul>
                                <a href="#" class="all-notification" id="no-notification">Aucune notification pour
                                    l'instant</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                {{ Auth::user()->lastname }} {{ Auth::user()->firstname }}
                                @if (!empty(Auth::user()->profile_photo_path))
                                    <img src="{{ asset('images/profil/'.Auth::user()->profile_photo_path) }}"
                                         style="height: 60px; width: 60px" alt="Image introuvable">
                                @else
                                    <i class="mdi mdi-account"></i>
                                @endif

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('user.profile') }}" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Profil </span>
                                </a>

                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    @csrf
                                    <a type="submit" class="dropdown-item" data-toggle="modal"
                                       data-target="#logoutModal">
                                        <i class="fa fa-lock"></i>
                                        <span class="ml-2">Se déconnecter </span>
                                    </a>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">

                <li><a class="" href="{{ route('home') }}" aria-expanded="false"><i
                            class="icon icon-home"></i><span class="nav-text">Tableau de bord</span></a>
                </li>
                <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><i
                            class="fa fa-file-archive-o"></i><span class="nav-text">Interventions</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('activite.index') }}">Gestion des fiches</a></li>
                        <li><a href="{{ route('activite.create') }}">Créer une fiche</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><i
                            class="fa fa-pencil-square"></i><span class="nav-text">Gestion des B.T</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('bt.index') }}">Gestion des bons de travail</a></li>
                        <li><a href="{{ route('bt.create') }}">Créer un bon de travail</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void(0);" title="Gestion des demandes d'intervention" aria-expanded="false"><i
                            class="fa fa-briefcase"></i><span class="nav-text">Gestion des D.I</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('di.index') }}">Gestion des D.I</a></li>
                        <li><a href="{{ route('di.create') }}">Créer une D.I</a></li>
                    </ul>
                </li>

                <li><a class="" href="{{ route('personnel.index') }}" aria-expanded="false"><i
                            class="fa fa-users"></i><span class="nav-text">Personnels</span></a>
                </li>
                <li><a class="" href="{{ route('equipement.index') }}" aria-expanded="false"><i
                            class="fa fa-database"></i><span class="nav-text">Equipements</span></a>
                </li>


{{--                <li><a class="" href="{{ route('gestion.caisses') }}" aria-expanded="false"><i--}}
{{--                            class="fa fa-dollar"></i><span class="nav-text">Caisses</span></a>--}}
{{--                </li>--}}

                <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><i
                            class="fa fa-file-pdf-o"></i><span class="nav-text">Rapports</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('rapport.charge') }}">Rapport des dépenses</a></li>
{{--                        <li><a href="{{ route('rapport.vente') }}">Rapport des ventes</a></li>--}}
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><i
                            class="icon icon-payment"></i><span class="nav-text">Gestions dépenses</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('gestion.tache') }}">{{--Tâches--}} Dépenses</a></li>
                    </ul>
                </li>

                @if (Auth::user()->is_admin==1)
                    <li class="nav-label">GESTION DES UTILISATEURS</li>
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon icon-users-mm"></i><span class="nav-text">Comptes</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('user.all') }}">Utilisateurs</a></li>

                            <li><a href="{{ route('user.add') }}">Ajouter</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @yield('content')

    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
@include('_partial._modals')
@include('_partial.footer')
<!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->

<script src="{{asset('template/vendor/global/global.min.js')}}"></script>
<script src="{{asset('template/js/quixnav-init.js')}}"></script>
<script src="{{asset('template/js/custom.min.js')}}"></script>

{{--<script src="{{asset('template/vendor/toastr/js/toastr.min.js')}}"></script>--}}

{{--<!-- All init script -->--}}
{{--<script src="{{asset('template/js/plugins-init/toastr-init.js')}}"></script>--}}
<!-- Toastr -->
<script src="{{asset('template/vendor/plugins/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('template/vendor/plugins/toastr/js/toastr.init.js')}}"></script>
{{--<script src="{{asset('template/vendor/plugins/tooltip/popper.min.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/tooltip.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/popover.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/bootstrap.bundle.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/bootstrap.js')}}"></script>--}}
{{--<script src="{{asset('template/vendor/plugins/tooltip/bootstrap.min.js')}}"></script>--}}

@include('_partial._toastr-message')
@yield('script')
{{--@include('scripts.dashboard')--}}
</body>
</html>
