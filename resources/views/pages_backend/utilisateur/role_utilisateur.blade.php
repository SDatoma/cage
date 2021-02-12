@extends('header/header_back')


<!-- Main Content -->
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12"> <br/>
                       <h5><strong>AFFECTATION/DESAFFECTATION DE ROLE A <a href="">{{$users_ligne->nom_user}} {{$users_ligne->prenom_user}} </a> </strong></h5>
                           <div class="pull-right mt-4">
                               <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Afrole">
                                   <i class="zmdi zmdi-plus"></i> Affecter des rôles
                               </button>
                            </div>
                            @include('modals/ajout/affecte_role')
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
           <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color:#0069d9;color:white">
                                            <th>LIBELLE ROLE</th>
                                            <th>CODE ROLE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($utilisateurs as $utilisateur)
										
                                        <tr>
                                            <td>@foreach($roles as $role)
												@if($role->id_role == $utilisateur->id_role)
													{{$role->libelle_role}}
												@endif
												@endforeach
											</td>
                                            <td>@foreach($roles as $role)
												@if($role->id_role == $utilisateur->id_role)
													{{$role->code_role}}
												@endif
												@endforeach
											</td>
                                            <td> 
												<button class="btn btn-danger btn-sm" title="Retirer" data-toggle="modal" data-target="#ar{{$utilisateur->id_affecter_roles}}"><i class="zmdi zmdi-delete"></i> Retirer</button>
                                            </td>
                                        </tr>
										 @include('modals/suppression/delete_role_affecter')
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
