@extends('header/header_back')


<!-- Main Content -->
@section('content')

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                <h5>AJOUTER UNE BOUTIQUE</h5>
                    <!--<ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
                    </ul>-->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                 <!--<div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div> -->
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
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
                            <form id="form_validation" method="POST" action="{{route('fournisseur.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Nom de la boutique" name="nom_boutique" value="{{ old('nom_boutique') }}" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Slogan" value="{{ old('slogan_boutique') }}" name="slogan_boutique" >
                                </div>
                                <div class="form-group form-float">
                                    <input type="email" class="form-control" placeholder="Adresse email" value="{{ old('email_boutique') }}" name="email_boutique" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Pays" name="pays_boutique" value="{{ old('pays_boutique') }}" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Ville" name="ville_boutique" value="{{ old('ville_boutique') }}" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Quartier" name="quartier_boutique" value="{{ old('quartier_boutique') }}" >
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Rue" name="rue_boutique" value="{{ old('rue_boutique') }}" >
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Batiment" name="batiment_boutique" value="{{ old('batiment_boutique') }}" >
                                </div>
                                <div class="form-group form-float">
                                    <input type="number" class="form-control" placeholder="Contact 1 sans indicatif ( Ex. 90 00 00 00 )" value="{{ old('contact_boutique1') }}" name="contact_boutique1" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="number" class="form-control" placeholder="Contact 2 sans indicatif ( Ex. 90 00 00 00 )" value="{{ old('contact_boutique2') }}" name="contact_boutique2" >
                                </div>
                               
                                <div class="form-group form-float">
                                  <label> Description de la boutique </label>
                                    <textarea name="description_boutique" cols="30" rows="5" placeholder="Description de la boutique" class="form-control no-resize summernote" required>{{old('description_boutique')}}</textarea>
                                </div>

                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="Nom et prenom du responsable" name="responsable_boutique" value="{{ old('responsable_boutique') }}" required>
                                </div>
                                <div class="form-group form-float">
                                    <input type="number" class="form-control" placeholder="Contact du responsable ( Ex. 90 00 00 00 )" value="{{old('contact_responsable')}}" name="contact_responsable" required>
                                </div>
                                
                                   <div class="form-group form-float col-sm-5">
                                       <label> Photo de la boutique </label>
                                        <input type="file" class="dropify" name="file">
                                   </div>
                                
                               <center>
                                <button class="btn btn-raised btn-primary waves-effect" type="submit">ENREGISTRER</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection()
