<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\User;
use App\Models\Emailing;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Mail;
use App\Mail\EnvoiMail;
use Alert;

class EmailingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::where(['id_ville' =>$request->id_ville])->get() ;

        foreach($users as $user){
          Mail::to($user->email_user)->send(new EnvoiMail($user->nom_user, $user->prenom_user, $request->titre_email,$request->description_email));
        }

        $email = new Emailing();
       
        $email->titre_email= $request->titre_email;
        $email->description_email= $request->description_email;
        $email->id_ville= $request->id_ville;

        $email->save();
        
       return back()->with('success', 'Email envoyes avec succè');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function getAllEmail()
    {
        $villes = Ville::where(['etat_ville' =>1])->get();
        $emails = Emailing::all();

        return view('pages_backend/emailing/list_message',compact('villes','emails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Emailing::where(['id_email' =>$id])->first() ;
         
        $email->delete();
        
        return back()->with('success', 'Suppression effectuée avec succè');
    }
}
