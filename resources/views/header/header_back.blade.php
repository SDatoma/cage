<!doctype html>
<html class="no-js " lang="fr">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="" content="">

<title>CAGE E-Commerce - Administration</title>

<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/charts-c3/plugin.css')}}"/>
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/morrisjs/morris.min.css')}}" />
<link rel="stylesheet" href="{{asset('css_backend/style.css')}}" />
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('css_backend/assets/css/style.min.css')}}">
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{asset('css_backend/assets/css/style.min.css')}}">
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link href="{{asset('css_backend/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('css_backend/assets/plugins/select2/select2.css')}}" />

</head>


<body class="theme-blush">


<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="{{asset('css_backend/assets/images/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">CAGE BATIMEMT</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{asset('css_backend/assets/avatar.jpg')}}" alt="User"></a>
                    <div class="detail">
                        <br/><small><h6>Nom et Prenom</h6></small>
                        <small><a href="/deconnexion">Deconnexion</a></small>                       
                    </div>
                </div>
            </li>
            <li class="active open"><a href="/admin"><i class="zmdi zmdi-home"></i><span>Tableau de board</span></a></li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Paramettre</span></a>
                <ul class="ml-menu">
                    <li><a href="/list/slider">Pub des images</a></li>
                    <li><a href="/list/ville">Liste des villes</a></li>
                    <li><a href="/list/client">Liste des clients</a></li>
                    <li><a href="/list/email">Envoi d'email</a></li>
                    <!-- <li><a href="#">Liste des utilisateurs</a></li>                   -->
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Boutiques</span></a>
                <ul class="ml-menu">
                    <li><a href="/add/boutique">Ajouter une boutique</a></li>                  
                    <li><a href="/list/boutique">Liste des boutiques</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Categorie</span></a>
                <ul class="ml-menu">
                    <li><a href="/list/categorie">Liste des categorie</a></li>
                    <li><a href="/list/sous/categorie">Sous categories</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Produits</span></a>
                <ul class="ml-menu">
                    <li><a href="/add/produit">Ajouter un produit</a></li>
                    <li><a href="/list/produit">Liste des produits</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion commande</span></a>
                <ul class="ml-menu">
                    <li><a href="/list/commande/attente"> Commande en attente</a></li>
                    <li><a href="/list/commande/valider"> Commande valider</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<!-- <aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush" class="active"><div class="blush"></div></li>
                    </ul>                                        
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Report Panel Usage</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox2" type="checkbox" checked="">
                                <label for="checkbox2">Email Redirect</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>                
            </div>                
        </div>       
       
    </div>
</aside> -->


@yield('content')


@include('sweetalert::alert')

@include('footer/footer_back')

