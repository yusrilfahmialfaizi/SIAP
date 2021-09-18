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
    public function index(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        }elseif ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        };
        $izin   = Izin::all();
        return view('contents/main/karyawan/riwayat_izin', compact('izin'));
    }
    public function izin_manager(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        }elseif ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        };
        $izin   = Izin::all();
        return view('contents/main/manager/riwayat_izin', compact('izin'));
    }
    public function izin_hrd(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        }elseif ($request->session()->get('divisi') == 'Karyawan' ) {
            # code...
            return redirect('/dashboard-karyawan');
        };
        $izin   = Izin::all();
        return view('contents/main/hrd/riwayat_izin', compact('izin'));
    }

    public function terima(Request $request, $id){
        $model = Izin::find($id);
        $model->id              = $request->id;
        $model->status          = 'Diterima';
        $model->save();
        return response()->json([
            'message'   => 'sukses'
        ]);
    }
    public function tolak(Request $request){
        $model->id              = $request->id;
        $model->status          = 'Ditolak';
        // $model->save();
        return response()->json([
            'message'   => 'sukses'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if ($request->session()->get('status') != 'login' ){
            return redirect('/');
        }else if ($request->session()->get('divisi') == 'HRD' ) {
            # code...
            return redirect('/dashboard-hrd');
        }elseif ($request->session()->get('divisi') == 'Manager' ) {
            # code...
            return redirect('/dashboard-manager');
        };
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
        $model                  = Izin::find($id);
        $model->status          = $request->status;
        $model->save();
        return  redirect('izin-manager');
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
        $model = Izin::find($id);
        $model->delete();
        return response()->json([
            'message'   => 'sukses'
        ]);
    }
}
