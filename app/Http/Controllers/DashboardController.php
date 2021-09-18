<?php

namespace App\Http\Controllers;

use Adrianorosa\GeoLocation\GeoLocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Session;

class DashboardController extends Controller
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

    public function dashboard_karyawan(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        }elseif ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        };
        $data['hadir'] = Absensi::where('nik', Session::get('nik'))->where('jam_masuk', "!=", null)->where('jam_pulang', '!=', null)->count();
        // $data['sakit'] =
        return view('contents/main/karyawan/dashboard', $data);
    }

    public function dashboard_manager(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        }elseif ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        };
        return view('contents/main/manager/dashboard');
    }
    public function dashboard_hrd(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        }elseif ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        };
        return view('contents/main/hrd/dashboard');
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
