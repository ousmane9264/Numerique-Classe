<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authentification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use DateTime;
session_start();
use Flashy;

class HomeController extends Controller
{
    public function authVerif()
    {
        $id_user = Session::get('id_user');
        
        if($id_user){
            return;
        }else{
            return Redirect::to('/')->send();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authVerif();
        // Flashy::message('Welcome Aboard!', 'http://your-awesome-link.com');
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_user($id_user)
    {
        
        //recupere l'utilisateur connecte
        $user = DB::table('authentifications')->where('id_user', $id_user)->first();
        
        return view('users.profile', compact('user'));
    }

    public function edit_photo(Request $request, $id_user)
    {

        dd($request->id_user);
        $data = array();
        //$image= $request->file('image');
        if($request->hasfile('photo')){


            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/user_images', $filename);

            
            $data['photo']=$filename;
        }else{
            return $request;
            $data['photo']='';
        }
        DB::table('authentifications')->update($data);
    }

    // fonction de deconnexion
     public function logout()
    {
        
       auth()->logout();


        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id_user)
    {
        $data = array();
        $data[''];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_user)
    {
        $data = array();
        $data['nom'] = $request->nom;
        $data['prenom'] = $request->prenom;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['date_nais'] = $request->date_nais;
        $data['lieu_nais'] = $request->lieu_nais;
        $data['id_pay'] = $request->id_pay;
        $data['id_ville'] = $request->id_ville;
        $data['situation'] = $request->situation;
        $data['genre'] = $request->genre;
        $data['profession'] = $request->profession;
        $data['created_at'] = Carbon::now();

        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/user_images', $filename);
            $data['photo']=$filename;
        }else{
            return $request;
            $data['photo']='';
        }

        //dd($data);
        if($request->password==$request->confirm){
            DB::table('authentifications')->where('id_user', $id_user)->update($data);
            return back();
        }else{

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publication(Request $request)
    {
        $data = array();
        $data['contenu'] = $request->contenu;
        $data['id_user'] = Session::get('id_user');
        $data['created_at'] = Carbon::now();
        DB::table('publications')->insert($data);
        //dd($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentaire(Request $request, $id_pub)
    {
        $data = array();
        $data['commente'] = $request->commente;
        $data['id_user'] = Session::get('id_user');
        $data['id_pub'] = $request->id_pub;
        $data['created_at'] = Carbon::now();
        DB::table('commentaires')->insert($data);
        return back(); 
    }

    public function like_inactive($id_pub)
    {
        DB::table('publications')->where('id_pub', $id_pub)->update(['like'=>0]);
        return back();
    }

    public function like_active($id_pub)
    {
        DB::table('publications')->where('id_pub', $id_pub)->update(['like'=>1]);
        return back();
    }
}
