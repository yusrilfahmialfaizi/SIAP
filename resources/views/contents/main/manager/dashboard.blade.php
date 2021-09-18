@extends('parts.main.master_manager')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-blue f-w-600">{{$user}}</h4>
                                            <h6 class="text-muted m-b-0">Karyawan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-check f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Jumlah </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green f-w-600">{{$hadir}}</h4>
                                            <h6 class="text-muted m-b-0">Karyawan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-file-text f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Hadir Hari Ini</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-yellow f-w-600">{{$izin}}</h4>
                                            <h6 class="text-muted m-b-0">Karyawan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-calendar f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Izin / Sakit Hari ini</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            @php
                                                $alfa = $alfa - $izin; //digunakan ketika data diambil pada hari minggu
                                                if ($alfa < 0){
                                                    $alfa = 0;
                                                }
                                            @endphp
                                            <h4 class="text-c-pink f-w-600">{{$alfa}}</h4>
                                            <h6 class="text-muted m-b-0">Karyawan</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-download f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-pink">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Tidak Hadir</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Dashboard</h5>
                                    <span></span>
                                </div>
                                <div class="card-block ">
                                    <h4>Hallo, Selamat Datang {{Session::get('nama')}} !!!</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection