@extends('header/header_back')
<!-- Main Content -->
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                       <h5>LISTE DES VILLES</h5>
                            <div class="pull-right mt-4">
                               <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ville">
                                   <i class="zmdi zmdi-plus"></i> Ajouter une ville
                               </button>
                            </div>
                            @include('modals/ajout/add_ville')
                    <!-- 
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Normal Tables</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <!-- <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div> -->
            </div>
        </div>

        <div class="container-fluid">
           <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>LISTE DES FOURNISSEURS</h2>
                        </div> -->
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover theme-color dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>LIBELLE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($villes as $ville)
                                        <tr>
                                            <td>{{$ville->libelle_ville}}</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" title="Modifier" data-toggle="modal" data-target="#mv{{$ville->id_ville}}"><i class="zmdi zmdi-edit"></i></button> 

                                            <button class="btn btn-danger btn-sm" title="Supprimer" data-toggle="modal" data-target="#sv{{$ville->id_ville}}"><i class="zmdi zmdi-delete"></i></button>
                                            
                                            </td>
                                            @include('modals/suppression/delete_ville')
                                        </tr>
                                             @include('modals/modification/edit_ville')
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection()
