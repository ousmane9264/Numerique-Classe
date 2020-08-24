<?php

namespace App\Http\Controllers;

use App\Models\Authentification;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequestForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use DateTime;
use Flashy;
session_start();




class AuthentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Session::flush();
        return view('Authentification.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthRequestForm $request)
    {  

     //Verification de unicité de l'email
        $exit=Authentification::where('email', request('email'))
                    ->orWhere('phone', request('phone'))
                    ->first();
        if(!empty($exit)){
            return back()
            ->withErrors([
                'email' => 'cet email existe déjà', 
                'phone' => 'Ce Numero de telephone existe déjà'])
            ->withInput();
        }

        $data = array();
        $data['nom'] = $request->nom;
        $data['prenom'] = $request->prenom;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['photo'] = $request->photo;
        $data['created_at'] = Carbon::now();


        if($request->password==$request->confirm){
            DB::table('authentifications')->insert($data);
            return back();
        }else{

            Flashy::error('Les mot de passe ne sont pas identique!');
            return back();
        }
         
    }

    public function Auth(Request $request)
    {
        
        $email = $request->email;

        $password = md5($request->password);
        $result = DB::table('authentifications')
            ->where('email',$email)
            ->where('password',$password)->first();
            if($result != null){
                //recuperation des information de l'utilisateur
                    Session::put('id_user', $result->id_user);
                    Session::put('nom', $result->nom);
                    Session::put('prenom', $result->prenom);
                    Session::put('email', $result->email);
                    Session::put('phone', $result->phone);
                    Session::put('photo', $result->photo);
                    Session::put('password', $result->password);
                    // Flashy::Info("vous etes connecté");
                     Flashy::message('Bienvenue Chez Numeric Class!');
                    return Redirect::to('/home');
                }else{

                    Flashy::error('Vos identifiants sont incorrects veuillez resaisir de nouveau !');
                    return back();
                }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authentification  $authentification
     * @return \Illuminate\Http\Response
     */
    public function show(Authentification $authentification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authentification  $authentification
     * @return \Illuminate\Http\Response
     */
    public function edit(Authentification $authentification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authentification  $authentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authentification $authentification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authentification  $authentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authentification $authentification)
    {
        //
    }
}
