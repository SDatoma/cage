@component('mail::message')
# Bonjour Mr/Mme {{$first_name}} {{$last_name}},

{{$titre_email}}
<br><br>
{{-- @component('mail::panel', ['url' => 'fgfhghghg']) --}}
<?php echo nl2br($description_email)?>
{{-- @endcomponent --}}
<br>
<br>
<p style="float:right">Signature</p>
<br><br>

<p style="float: right">L'équipe de Cage Batiment,</p>
{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent