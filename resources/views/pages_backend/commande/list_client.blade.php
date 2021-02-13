@extends('header/header_back')


<!-- Main Content -->
@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                       <h5><strong>LISTE DES COMPTES CLIENTS</strong></h5>
                   
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>

            </div>
        </div>

        <div class="container-fluid">
           <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                           <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                    <thead>
                                        <tr style="background-color:#0069d9;color:white">
                                            <th>TOUT COCHER <input type="checkbox" id="check_all"></th>
                                            <th>NOM & PRENOM</th>
                                            <th>VILLE</th>
                                            <th>SEXE</th>
                                            <th>ADRESSE MAIL</th>
                                            <th>TELEPHONE</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr id="tr_{{$user->id_user}}">
                                            <td> <input type="checkbox" class="checkbox" data-id="{{$user->id_user}}"> </td>
                                            <td>{{$user->nom_user}} {{$user->prenom_user}}</td>
                                            <td>
                                            @foreach($villes as $ville)
                                                @if($ville->id_ville == $user->id_ville)
                                                 {{$ville->libelle_ville}}
                                                @endif
                                            @endforeach
                                            </td>
                                            <td>{{$user->sexe_user}}</td>
                                            <td>{{$user->email_user}}</td>
                                            <td>{{$user->telephone_user}}</td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                            </BR></BR>
                        <div class="body">
                           <h5><strong>ENVOYER UN MESSAGE PERSONNALISER</strong></h5>
                           <div id="affectation">
                             <form id="doaffect" method="post" action="/envoi/email/personnaliser">
                                {{csrf_field()}}
                                <input type="hidden" id="selectedids" name="selectedids">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



@endsection()
