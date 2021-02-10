@extends('header/header_back')

@section('content')
<!-- Right Sidebar -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h5><strong>DETAIL DU PRODUIT</strong></h5>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item">eCommerce</li>
                        <li class="breadcrumb-item active">Product Detail</li>
                    </ul> -->
                            @if($promotion==null)
                               <button class="btn btn-primary btn-sm" style="float:right" data-toggle="modal" data-target="#promotion">
                                   <i class="zmdi zmdi-plus"></i> Definir une Promotion
                               </button>
                               @include('modals/ajout/definir_promotion')
                            @else
                            <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#mp{{$promotion->id_promotion}}">
                            <i class="zmdi zmdi-plus"></i> Modifier Promotion
                            </button>
                               @include('modals/modification/edit_promotion')
                            @endif

                            <button class="btn btn-warning btn-sm" style="float:right" data-toggle="modal"   data-target="#add-image">
                            <i class="zmdi zmdi-plus"></i> Ajouter une image
                            </button>
                               @include('modals/ajout/add_produit_image')

                    <button class="btn btn-primary btn-icon mobile_menu" type="button">
                    <i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                      <!-- <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div> -->
            </div>
        </div>
                        @if(Session::has('succes'))
                            <div class="form-group">
                              <div class="alert alert-success text-center">
                                  <p style="font-size:15px;text-aligne:center">{{Session::pull('succes')}} </p>
                               </div>
                            </div>
                        @elseif(Session::has('error'))
                            <div class="form-group">
                              <div class="alert alert-danger text-center">
                                  <p style="font-size:15px;text-aligne:center">{{Session::pull('error')}} </p>
                               </div>
                           </div>
                        @endif
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-12">
                                    <div class="preview preview-pic tab-content">
                                        <div class="tab-pane active" id="product_1"><img src="/{{$produit->image_produit}}" class="img-fluid" widht="50px" height="50px" alt="" /></div>
                                        @foreach($produit_images as $produit_image)
                                        <div class="tab-pane" id="product_2"><img src="/{{$produit_image->photo_produit}}" class="img-fluid" widht="50px" height="50px" alt=""/></div>
                                        @endforeach
                                        
                                    </div>
                                    <ul class="preview thumbnail nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product_1"><img src="/{{$produit->image_produit}}" alt=""/></a></li>
                                        @foreach($produit_images as $produit_image)
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_2">
                                        <img src="/{{$produit_image->photo_produit}}" widht="50px" height="30px" alt=""/></a>
                                       <i class="zmdi zmdi-edit" data-toggle="modal" data-target="#mp{{$produit_image->id_photo_produit}}"></i>
                                        <i class="zmdi zmdi-delete" style="color:red" data-toggle="modal" data-target="#si{{$produit_image->id_photo_produit}}"></i>
                                        @include('modals/modification/edit_photos')
                                        @include('modals/suppression/delete_photos')
                                        </li>
                                        @endforeach
                                                                         
                                    </ul>                
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-12">
                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{$produit->nom_produit}}</h3>
                                        <hr>
                                        <!-- <p class="product-description">{{$produit->description_produit}}</p> -->
                                        <p class="vote"><strong>QUANTITE</strong> : {{$produit->quantite_produit ?? '0'}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        @if($produit->quantite_produit>3)
                                        <strong style="color:blue">En stock</strong>
                                        @else
                                        <strong style="color:red">En rupture</strong>
                                        @endif
                                        </p>
                                        <p class="vote"><strong>PRIX</strong> : {{$produit->prix_ttc ?? '0'}} FCFA 
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        @if($promotion!=null)
                                          <b style="color:red">En promotion {{$promotion->pourcentage_promotion ?? '0'}} % ; Code promo : {{$promotion->code_promotion ?? '0'}} <sup><a href="" title="Supprimer" data-toggle="modal" data-target="#sp{{$promotion->id_promotion}}"><i class="fa fa-remove"></i> Supprimer</a></sup></b>
                                          @include('modals/suppression/delete_promotion')
                                        @endif
                                        </p>
                                        <hr>
                                        <p class="vote"><strong>SOUS CATEGORIE</strong> : {{$produit->libelle_sous_categorie}}</p>
                                        <p class="vote"><strong>FOURNISSEUR</strong> : {{$produit->nom_boutique}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Description</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Commentaires</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Composition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p><?php echo nl2br($produit->description_produit)?></p>
                                </div>
                                <div class="tab-pane" id="review">
                                            <?php
                                $commentaires = \App\Models\Commentaire::where(['id_produit' =>$produit->id_produit])->get();
                                             ?>
                                    @if(count($commentaires)==0)
                                    <h5 style="color:red">Aucun commentaire poster pour ce produit </h5>
                                    @else
                                    @foreach($commentaires as $commentaire)
                                    <ul class="row list-unstyled c_review mt-4">
                                        <li class="col-12">
                                            <div class="avatar">
                                                <a href="javascript:void(0);"><img class="rounded" src="{{asset('css_backend/assets/avatar.jpg')}}" alt="user" width="60"></a>
                                            </div>                                
                                            <div class="comment-action">
                                                <h5 class="c_name">{{$commentaire->nom_commentaire}}</h5>
                                                <p class="c_msg mb-0">{{$commentaire->resume_commentaire}}</p>
                                                <span class="m-l-10">
                                                    <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i class="zmdi zmdi-star-outline text-muted"></i></a>
                                                </span>
                                                <small class="comment-date float-sm-right"><?php setlocale(LC_TIME, "fr_FR","French");
										        echo $date = utf8_encode(strftime("%d %B %Y", strtotime($commentaire->date_commentaire))); ?></small>
                                            </div>                                
                                        </li>
                                        
                                    </ul>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane" id="about">
                                    <!-- <h6>Composition</h6> -->
                                    <p><?php echo nl2br($produit->caracteristique_produit)?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()
