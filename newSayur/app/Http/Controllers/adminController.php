<?php

namespace App\Http\Controllers;
use DB;
use Input;
use App\User;
use App\Pedagang;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //pedagang
    public function index()
    {
        $pedagang = DB::table('users')
        ->join('pedagangs','pedagangs.user_id','=','id')
        ->select('users.id','pedagangs.user_id','pedagangs.nama_depan','pedagangs.nama_belakang','pedagangs.alamat','pedagangs.nomor_telepon','pedagangs.foto_profil','pedagangs.foto_ktp','users.akses','pedagangs.lon','pedagangs.lat')
        ->where('users.akses','menunggu')
        ->get();
        $pedagang1 = DB::table('users')
        ->join('pedagangs','pedagangs.user_id','=','id')
        ->select()
        ->where('users.akses','2')
        ->get();
        $pedagang2 = DB::table('pedagangs')
        ->select()
        ->where('pedagangs.status','online')
        ->get();
        return view('admin/tukangsayur',[
            'pedagang' => $pedagang,
            'pedagang1' => $pedagang1,
            'pedagang2' => $pedagang2
        ]);
    }

    public function terima($id , request $request)
    {
        $edit = user::where('id',$id)->first();
        $edit->akses = 2;
        $edit->save();
        
        return redirect('admin/');
    }
    public function tolak($id,request $request)
    {
        $update = User::where('id',$request->id)->first();
        $update->akses = NULL;
        $update->save();
        $delete = Pedagang::where('user_id',$id);
        $delete->delete();
        return redirect('admin/');
    }
    
    //user

    public function user()
    {
        $user = User::where('akses' , NULL)->get();
        return view('admin/user',[
            'user' => $user
        ]);
    }
    public function getedit($id)
    {
        $user = user::where('id',$id)->first();
        return view('admin/editpage',[
            'user' => $user
        ]);
    }
    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        
		$name	= $request->name;
		$email	= $request->email;

		$user->name = $name;
		$user->email  = $email;
        $user->save();
        
        return redirect('admin/user');
    }
    public function hapus($id){
        $user = user::where('id',$id);
        $user->delete();

        return redirect('admin/user');
    }
    
}