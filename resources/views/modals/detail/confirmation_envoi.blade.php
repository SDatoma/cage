<!-- Central Modal Small -->
<div class="modal fade" id="ce{{$email->id_email}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          
          <!--Body-->
          <div class="modal-body">
           <strong><p>Voulez-vous reenvoyer ce message ?</strong></p>
          </div>
          <!--Footer-->
               <div class="modal-footer">
               <a href="{{route('reenvoi.mail',$email->id_email)}}">
                    <button  class="btn btn-primary btn-sm">Oui,envoyer</button>
                </a>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Non</button>
                </div>
        </div>

        </form>
        <!--/.Content-->
      </div>
    </div>
  