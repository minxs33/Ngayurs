<?php

namespace App\Http\Controllers;
use App\User;
use App\Pedagang;
use Auth;
use DB;
use Illuminate\Http\Request;

class pedagangController extends Controller
{
    public function insert(Request $request)
    {
        $this->validate($request, [

            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nomor_telepon' => 'required',
            'foto_ktp.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_profil.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required',
            'lat' => 'required',
            'lon' => 'required'

        ]);
        $insert = new User;
        $insert1 = new Pedagang;
        $insert = User::with('pedagang')->find(Auth::user()->id);
        if($insert->akses == NULL)
        {
        $insert->id = Auth::user()->id;
        $insert->akses = 'menunggu';
        $insert->save();
        
        $insert1->user_id = Auth::user()->id;
        $insert1->nama_depan = $request->nama_depan;
        $insert1->nama_belakang = $request->nama_belakang;
        $insert1->nomor_telepon = $request->nomor_telepon;
        
        if($request->hasfile('foto_profil')){

            $foto_profil = $request->foto_profil;
            $filename = time() . '.' . $foto_profil->getClientOriginalExtension();
            request()->foto_profil->move(public_path('fotoProfil'), $filename);
            $insert1->foto_profil = $filename;
        }else{
            $insert1->foto_profil = 'Tidak Ada';
        }
        if($request->hasfile('foto_ktp')){

            $foto_ktp = $request->foto_ktp;
            $filename = time() . '.' . $foto_ktp->getClientOriginalExtension();
            request()->foto_ktp->move(public_path('fotoKtp'), $filename);
            $insert1->foto_ktp = $filename;
        }else{
            $insert1->foto_ktp = 'Tidak Ada';
        }

        $insert1->alamat = $request->alamat;
        $insert1->lat = $request->lat;
        $insert1->lon = $request->lon;
        $insert1->status = 'offline';
        $insert1->save();

        return redirect('/home')->with('success','Permintaan kamu sedang di proses');
    }elseif(Auth()->user()->akses == 'menunggu'){ 
        return redirect('/home')->with('success','Permintaan kamu sedang di proses');
    }else{
    return redirect('/home')->with('error','Kamu sudah punya akun');
    }
}

    public function maps()
    {
        if(Auth()->user()->akses == '2'){
        $pedagang = DB::table('users')
        ->join('pedagangs','pedagangs.user_id','=','id')
        ->where('users.id', Auth()->user()->id)->first();
        return view('pedagang/mapspedagang',[
            'pedagang' => $pedagang
        ]);
        }else{
            return view('home')->with('success','Data sedang di proses');
        }
    }
    public function edit(request $request)
    {
        $pedagang = Pedagang::where('user_id','=',$request->user_id)->first();
        
		$deskripsi	= $request->deskripsi;

		$pedagang->deskripsi = $deskripsi;
        $pedagang->save();
        
        return redirect('mapspedagang');
    }
    public function online($id)
    {
        $pedagang = Pedagang::where('user_id',$id)->first();
        $pedagang->status = 'online';
        $pedagang->save();
        return redirect('mapspedagang');
    }
    public function offline($id)
    {
        $pedagang = Pedagang::where('user_id',$id)->first();
        $pedagang->status = 'offline';
        $pedagang->save();
        return redirect('mapspedagang');
    }
}
