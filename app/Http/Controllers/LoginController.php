<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->session()->get('status') == 'login' || $request->session()->get('divisi') == 'Karyawan' ){
            return redirect('/dashboard-karyawan');
        }else if ($request->session()->get('status') == 'login' || $request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        }else if ($request->session()->get('status') == 'login' || $request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        };
        return view('contents/login/index');
    }

    function auth(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $data = [
            'username'  => $username,
            'password'  => $password
        ];

        Auth::attempt($data);
        if (Auth::check()){
            $users = Users::where('username', $username)
                ->first();
                # code...

                $sesi = [
                    'nik'           => $users->nik,
                    'nama'          => $users->nama,
                    'jenis_kelamin' => $users->jenis_kelamin,
                    'divisi'        => $users->divisi,
                    'username'      => $users->username,
                    'status'        => 'login'       
                ];
                if ($users->divisi == 'Karyawan') {
                    # code...
                    $request->session()->put($sesi);
                    return redirect('/dashboard-karyawan');
                }else if ($users->divisi == 'Manager'){
                    $request->session()->put($sesi);
                    return redirect('/dashboard-manager');
                }else if ($users->divisi == 'HRD'){
                    $request->session()->put($sesi);
                    return redirect('/dashboard-hrd');
                }
        }else{
            return redirect()->back();
        }
    }

    function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
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
        //
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
        //
    }


}
