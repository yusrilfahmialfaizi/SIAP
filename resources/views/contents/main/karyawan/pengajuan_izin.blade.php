@extends('parts.main.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>!Note :</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <p> - Apabila karyawan sedang sakit,izin sakit bisa diinputkan maksimal H+3 sejak tanggal ketidakhadiran karyawan. </p>
                                    <p> - Apabila karyawan ingin mengajukan cuti, karyawan dapat menginputkan izin cuti maksimal H-1 dari rencana ketidakhadiran karyawan. </p><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pengajuan Izin</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <form method="POST" action="{{ url('izin')}}"accept-charset="UTF-8" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Ketidakhadiran</label>
                                                <div class="col-sm-4">
                                                    <select name="jenis_tidakhadir" id="jenis_tidakhadir"
                                                    class="js-example-placeholder-multiple col-sm-12" required>
                                                    <option value="&nbsp">--Pilih--</option>
                                                    <option value="Izin Sakit">Izin Sakit</option>
                                                    <option value="Cuti">Cuti</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Surat Keterangan Dokter</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mulai Ketidakhadiran</label>
                                            @php
                                                date_default_timezone_set('Asia/Jakarta');
                                                if ($absensi != null){
                                                    $tanggal    = $absensi->tanggal;
                                                }else{
                                                    $tanggal = date('Y-m-d');
                                                }
                                                $tgl        = date('Y-m-d', strtotime($tanggal));
                                                $min_sakit  = date('Y-m-d', strtotime($tanggal));
                                                $max_sakit  = date('Y-m-d', strtotime('+3 days',strtotime($tanggal)));
                                                $min_cuti   = date('Y-m-d', strtotime('+1 days',strtotime($tanggal)));
                                            @endphp
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="mulai_tidakhadir_sakit" name="mulai_tidakhadir_sakit" max="{{$max_sakit}}">
                                                <input type="date" class="form-control" id="mulai_tidakhadir_cuti" name="mulai_tidakhadir_cuti" min="{{$min_cuti}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Selesai Ketidakhadiran</label>
                                            <div class="col-sm-10">
                                                <input type="date" id="selesai_tidakhadir_sakit" name="selesai_tidakhadir_sakit" class="form-control"  min="{{$min_sakit}}">
                                                <input type="date" id="selesai_tidakhadir_cuti" name="selesai_tidakhadir_cuti" class="form-control"  min="{{$min_cuti}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alasan Ketidakhadiran</label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control" name="alasan" id="alasan" required></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary m-b-0" value="Simpan">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        document.getElementById("mulai_tidakhadir_sakit").style.display     = 'block';
        document.getElementById("selesai_tidakhadir_sakit").style.display   = 'block';
        document.getElementById("mulai_tidakhadir_cuti").style.display      = 'none';
        document.getElementById("selesai_tidakhadir_cuti").style.display    = 'none';
        document.getElementById('image').disabled                           = true;
        document.getElementById("mulai_tidakhadir_sakit").disabled          = true;
        document.getElementById("selesai_tidakhadir_sakit").disabled        = true;
        document.getElementById('alasan').disabled                          = true;
        $("#jenis_tidakhadir").on('change', function() {
            var value = $("#jenis_tidakhadir").val();
            var app = @json($absensi);
            if (value == "Izin Sakit") {
                document.getElementById('image').disabled                           = false;
                document.getElementById("mulai_tidakhadir_sakit").disabled          = false;
                document.getElementById("selesai_tidakhadir_sakit").disabled        = false;
                document.getElementById('alasan').disabled                          = false;
                document.getElementById("mulai_tidakhadir_sakit").style.display     = 'block';
                document.getElementById("selesai_tidakhadir_sakit").style.display   = 'block';
                document.getElementById("mulai_tidakhadir_cuti").style.display      = 'none';
                document.getElementById("selesai_tidakhadir_cuti").style.display    = 'none';
            } else if (value == "Cuti") {
                document.getElementById('image').disabled                           = true;
                document.getElementById('alasan').disabled                          = false;
                document.getElementById("mulai_tidakhadir_sakit").style.display     = 'none';
                document.getElementById("selesai_tidakhadir_sakit").style.display   = 'none';
                document.getElementById("mulai_tidakhadir_cuti").style.display      = 'block';
                document.getElementById("selesai_tidakhadir_cuti").style.display    = 'block';
            }
        })
    })
</script>
@endsection