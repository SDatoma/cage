@extends('header/header_back')

<!-- Main Content -->
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                       <h5><strong>LISTE DES ROLES</strong></h5>
                            <div class="pull-right mt-4">
                               <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#role">
                                   <i class="zmdi zmdi-plus"></i> Ajouter un role
                               </button>
                            </div>
                            @include('modals/ajout/add_role')
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
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                    <thead>
                                        <tr style="background-color:#0069d9;color:white">
                                            <th>LIBELLE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->libelle_role}}</td>
                                             <td>
                                             
                                             <button class="btn btn-primary btn-sm" title="Modifier" data-toggle="modal" data-target="#mv{{$role->id_role}}"><i class="zmdi zmdi-edit"></i></button> 

                                            <button class="btn btn-danger btn-sm" title="Supprimer" data-toggle="modal" data-target="#sv{{$role->id_role}}"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                            @include('modals/suppression/delete_role')
                                        </tr>
                                             @include('modals/modification/edit_role')
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
