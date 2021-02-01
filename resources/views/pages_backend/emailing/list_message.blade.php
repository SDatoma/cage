@extends('header/header_back')
<!-- Main Content -->
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                      
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

                        <div class="body">
                        <h5>ENVOYER UN NOUVEAU MESSAGE</h5>
                           <form id="form_validation" method="POST" action="{{route('email.store')}}">
                              {{csrf_field()}}
                               <div class="form-group form-float">
                                    <select name="id_ville" class="form-control show-tick ms select2" data-placeholder="Select" required >
										<option value=""> Choisissez la ville </option> 
										@foreach($villes as $ville) 
										<option value="{{$ville->id_ville}}"> {{$ville->libelle_ville}} </option> 
										@endforeach
                                        <option value="0"> Toutes les villes </option>
								    </select>
                                </div>

                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Titre du message" name="titre_email" value="{{ old('titre_email') }}" required>
                                </div>
                                <div class="form-group form-float">
                                    <textarea name="description_email" cols="30" rows="5" placeholder="Description" class="form-control no-resize summernote" required>{{old('description_produit') }}</textarea>
                                </div>

                                <center> 
                                <button class="btn btn-raised btn-primary waves-effect " type="submit">Envoyer</button> 
                                </center>
                            </form>

                            <div class="table-responsive mt-4">
                            <h5>LISTE DES MESSAGES ENVOYER </h5>
                                <table class="table table-bordered table-striped table-hover theme-color dataTable js-exportable">
                                    <thead>
                                        <tr>
                                           <th>TITRE</th>
                                            <th>DESCRIPTION</th>
                                            <th>VILLE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($emails as $email)
                                        <tr>
                                            <td>{{$email->titre_email}}</td>
                                            <td><?php echo nl2br($email->description_email)?></td>
                                            <td>
                                            @foreach($villes as $ville)
                                                @if($ville->id_ville==$email->id_ville) 
                                                 {{$ville->libelle_ville}}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td>
                                            <button class="btn btn-succes btn-sm" title="Reenvoyer le message" data-toggle="modal"  data-target="#ce{{$email->id_email}}"><i class="zmdi zmdi-plus"></i></i></button> 

                                           <button class="btn btn-primary btn-sm" title="Modifier" data-toggle="modal" data-target="#me{{$email->id_email}}"><i class="zmdi zmdi-edit"></i></button> 

                                            <button class="btn btn-danger btn-sm" title="Supprimer" data-toggle="modal"  data-target="#se{{$email->id_email}}"><i class="zmdi zmdi-delete"></i></button>
                                            
                                             </td>
                                             @include('modals/suppression/delete_email')
                                             @include('modals/detail/confirmation_envoi')
                                        </tr>
                                        @include('modals/modification/edit_envoi_mail')
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
