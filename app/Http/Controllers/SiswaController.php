<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Login;

class SiswaController extends Controller
{
    public $user;
    public function __construct() {

        // $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            // return $next($request);
        // });
    }

    public function index()
    {
      return view('/login');

      $login = DB::table('users')->get();

       return redirect('output');
    }

    public function login(Request $request)
    {
      //return view('/login');
      // return $request->all();
      $data = array(
      'username'=>$request->username ,
      'password'=>$request->password ,
    );

    if(\Auth::attempt($data))
    {
      return redirect ('output');
    }
    else{
      return view('errors/gagal');
    }
    // $data['users'] = Login::where('hak_akses','!=','admin')->get();

      // $cek = \App\Login::where()

    }

    public function store(Request $request)
    {
      $data = new Login;
      $data->username = $request->username;
      $data->password = bcrypt($request->password);
      $data->email = $request->email;
      $data->hak_akses = $request->hak_akses;
      $data->save();

      return redirect('output')->with('success_message','Berhasil Memasukkan '.$data->username);;
    }

    public function edit($id_login)
    {
      // return $id_login;
      $data = Login::find($id_login);
      return view('edit', ['data'=>$data]);
    }

    public function update(Request $request, $id_login)
    {
      $data = Login::find($id_login);
      $data->username = $request->username;
      $username = $data->username;
      $data->email = $request->email;
      $data->hak_akses = $request->hak_akses;
      $data->save();

      return redirect('output')->with('success_message','Berhasil Edit '.$username);
    }

    public function output()
    {
      $data['user'] = Session::get('auth');

      $data['users'] = Login::where('hak_akses','!=','admin')->get();
       return view('output', compact('data'));
    }

    public function destroy($id_login)
    {
      $data = Login::find($id_login);
      $data->delete();
      return redirect('output')->with('success_message','Berhasil Menghapus');
    }

}
