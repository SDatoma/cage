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
      <input type="search" value="" placeholder="Recherche..." />
      <button type="submit" class="btn btn-primary">Recherche</button>
    </form>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="{{asset('files_upload/LOGOT.png')}}" width="25" alt="CAGE BATIMEMT"><span class="m-l-10"><strong>CAGE BATIMEMT</strong></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{asset('css_backend/assets/avatar.jpg')}}" alt="User"></a>
                    <div class="detail">
                        <br/><small><h6>{{Cookie::get('nom_user') ?? 'Admin'}} {{Cookie::get('prenom_user') ?? ' Principal'}}</h6></small>
                        <small><a href="/deconnexion">Deconnexion</a></small>                       
                    </div>
                </div>
            </li>
            <li class="active open"><a href="/admin"><i class="zmdi zmdi-home"></i><span>Tableau de board</span></a></li>
			
			<?php
			     $roles = DB::table('affecter_roles')
				->join('role', 'role.id_role', '=', 'affecter_roles.id_role')
				->join('user', 'user.id_user', '=', 'affecter_roles.id_user')
				->where('affecter_roles.id_user', '=', Cookie::get('id_user'))
				->get();
			?>
		@foreach($roles as $role)
				@if($role->code_role == "PARAM")
					<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Paramettre</span></a>
						<ul class="ml-menu">
							<li><a href="/list/ville">Liste des villes</a></li>
							<li><a href="/list/role">Liste des roles</a></li>
							<li><a href="/list/client">Liste des clients</a></li>
							<li><a href="/list/slider">Pub des images</a></li>
							<li><a href="/list/email">Envoi d'email</a></li>
							<!-- <li><a href="#">Liste des utilisateurs</a></li>                   -->
						</ul>
					</li>
				@endif

				@if($role->code_role == "UTIL")
					<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Utilisateur</span>
					</a>
						<ul class="ml-menu">               
							<li><a href="/list/utilisateur">Liste des utilisateurs</a></li>
							<!--li><a href="/affecte/role">Affectation des rôles</a></li-->
						</ul>
					</li>
				@endif
				
				@if($role->code_role == "BOUT")
					<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Boutiques</span>
					</a>
						<ul class="ml-menu">
							<li><a href="/add/boutique">Ajouter une boutique</a></li>                  
							<li><a href="/list/boutique">Liste des boutiques</a></li>
						</ul>
					</li>
				@endif
				
				@if($role->code_role == "CAT")
					<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Categorie</span></a>
						<ul class="ml-menu">
							<li><a href="/list/categorie">Ajout categorie/sous-categorie</a></li>
							<li><a href="/list/sous/categorie">Liste sous categorie</a></li>
						</ul>
					</li>
				@endif
				
				@if($role->code_role == "PROD")
					<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion Produits</span></a>
						<ul class="ml-menu">
							<li><a href="/add/produit">Ajouter un produit</a></li>
							<li><a href="/list/produit">Liste des produits</a></li>
						</ul>
					</li>
				@endif
				
				@if($role->code_role == "COMM")
					<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Gestion commande</span></a>
						<ul class="ml-menu">
							<li><a href="/list/commande/attente"> Commandes en attente</a></li>
							<li><a href="/list/commande/valider"> Commandes clôturées</a></li>
							<li><a href="#"> Suivi des commandes</a></li>
							<li><a href="#"> Commande rejetée </a></li>
						</ul>
					</li>
				@endif
		@endforeach

        </ul>
    </div>
</aside>

@yield('content')


@include('sweetalert::alert')

@include('footer/footer_back')

