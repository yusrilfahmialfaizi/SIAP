<?php

namespace App\Http\Controllers;

use Adrianorosa\GeoLocation\GeoLocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Session;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['record'] = Absensi::where('nik', Session::get('nik'))->whereDate('created_at', DB::raw('CURDATE()'))->get();
        return view('contents/main/karyawan/absen_hari_ini', $data);
    }

    public function masuk(){
        date_default_timezone_set('Asia/Jakarta');
        $ip                     = '125.166.117.206'; /* Static IP address */
        // $ip                 = $_SERVER['REMOTE_ADDR']; /* Dynamic IP address */
        $batas_absen            = '09:00:00';
        $details                = GeoLocation::lookup($ip);
        $model                  = new Absensi;
        $model->nik             = Session::get('nik');
        $model->tanggal         = date("Y-m-d");
        $model->jam_masuk       = date("H:i:s");
        $model->longtd_masuk    = $details->getLongitude();
        $model->latd_masuk      = $details->getLatitude();
        $model->save();
        if ((date("H:i:s") >= date("H:i:s", strtotime($batas_absen)))) {
            return response()->json([
                'message'   => 'invalid'
            ]);
        }else{
            return response()->json([
                'message'   => 'sukses'
            ]);
        }
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
        date_default_timezone_set('Asia/Jakarta');
        $ip                     = '125.166.117.206'; /* Static IP address */
        // $ip                 = $_SERVER['REMOTE_ADDR']; /* Dynamic IP address */
        $details                = GeoLocation::lookup($ip);
        $batas_absen            = "17:00:00";
        $model                  = Absensi::find($id);
        $model->nik             = Session::get('nik');
        $model->tanggal         = date("Y-m-d");
        $model->jam_pulang      = date("H:i:s");
        $model->longtd_pulang   = $details->getLongitude();
        $model->latd_pulang     = $details->getLatitude();
        $model->save();
        if ((date("H:i:s") <= date("H:i:s", strtotime($batas_absen)))) {
            return response()->json([
                'message'   => 'invalid'
            ]);
        }else{
            return response()->json([
                'message'   => 'sukses'
            ]);
        }
        // return redirect('absensi');
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
