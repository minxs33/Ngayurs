<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Posts;
use App\User;
use App\Pedagang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $User = User::find(Auth::user()->id)->pedagang;
        $article = Posts::All();
        return view('/home',[
            'article' => $article,
            'User' => $User
        ]);
    }
    public function pedagang()
    {
        if(Auth()->user()->akses == 2){
            return redirect('/home')->with('error','Anda sudah mempunyai akun');
        }elseif(Auth()->user()->akses == 'menunggu'){
            return redirect('/home')->with('error','Permintaan anda sedang di proses');
        }else{
            return view('pedagang/daftar');
        }
    }
    public function maps()
    {
        if(Auth()->user()->akses == NULL){
            $Pedagang = DB::table('pedagangs')
            ->join('users','users.id','=','user_id')
            ->select()
            ->where('users.akses','2')
            ->where('pedagangs.status','online')
            ->get();
            return view('maps',[
                'Pedagang' => $Pedagang
        ]);
    }elseif(Auth()->user()->akses == 2){
        $Pedagang = pedagang::Where('user_id',Auth()->user()->id);
        return view('pedagang/mapspedagang',[
            'Pedagang' => $Pedagang
    ]);
    }else{
        $Pedagang = DB::table('pedagangs')
            ->join('users','users.id','=','user_id')
            ->select()
            ->where('users.akses','2')
            ->where('pedagangs.status','online')
            ->get();
            return view('maps',[
                'Pedagang' => $Pedagang
        ]);
    }
    }
}
