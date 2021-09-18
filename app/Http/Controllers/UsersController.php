<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }
        else if ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        };
        $data['dataset'] = Users::all();
        return view('contents/main/manager/data_karyawan', $data);
    }
    public function data_karyawan_hrd(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        }elseif ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        };
        $data['dataset'] = Users::all();
        return view('contents/main/hrd/data_karyawan', $data);
    }

    function ajax_cek(Request $request){
        $username   = $request->username;
        $result     = Users::where('username', $username)->count();
        return response()->json($result); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return \view('contents/main/manager/tambah_karyawan');
        
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
        $model                  = new Users;
        $model->nik             = $request->nik;
        $model->nama            = $request->nama;
        $model->jenis_kelamin   = $request->jenis_kelamin;
        $model->tempat_lahir    = $request->tempat_lahir;
        $model->tanggal_lahir   = $request->tanggal_lahir;
        $model->divisi          = $request->divisi;
        $model->alamat          = $request->alamat;
        $model->username        = $request->username;
        $model->password        = Hash::make($request->password);
        $model->save();
        return redirect('data-karyawan');

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
        $data['data'] = Users::find($id);
        return view('contents/main/manager/edit_pass_karyawan', $data);
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
        $model = Users::find($id);
        $model->password = Hash::make($request->password);
        $model->save();
        return redirect('data-karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = Users::find($id);
        $model->delete();
        return response()->json([
            'message'   => 'sukses'
        ]);
    }
}
