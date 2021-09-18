<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Izin;
use Session;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $izin   = Izin::all();
        return view('contents/main/karyawan/riwayat_izin', compact('izin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $absensi = Absensi::where('nik', Session::get('nik'))->where('jam_masuk', null)->where('jam_pulang', null)->latest('created_at')->first();
        return view('contents/main/karyawan/pengajuan_izin', compact('absensi'));
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
        $image                      = $request->file('image');
        $model                      = new Izin;
        $model->nik                 = Session::get('nik');
        $model->jenis_tidakhadir    = $request->jenis_tidakhadir;
        if ($image != null) {
            $destinationPath            = public_path('public/upload/images');
            $profileImage               = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $model->gambar              = $profileImage;
            $image->move($destinationPath, $profileImage);
        }
        if ($request->jenis_tidakhadir == "Cuti") {
            # code...
            $model->tgl_mulai           = $request->mulai_tidakhadir_cuti;
            $model->tgl_selesai         = $request->selesai_tidakhadir_cuti;
        }else if ($request->jenis_tidakhadir == "Izin Sakit") {
            # code...
            $model->tgl_mulai           = $request->mulai_tidakhadir_sakit;
            $model->tgl_selesai         = $request->selesai_tidakhadir_sakit;
        }
        $model->keterangan          = $request->alasan;
        $model->status              = 'Diajukan';
        $model->save();
        return redirect('izin');
        // echo "<pre>";print_r($model);echo"</pre>";
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
