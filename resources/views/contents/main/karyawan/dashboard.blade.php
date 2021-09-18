@extends('parts.main.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- ANGLE OFFSET AND ARC start -->
                        {{-- <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Notifikasi</h5>
                                    <span></span>
                                </div>
                                <div class="card-block text-center">
                                    <Center>
                                        @if (empty($record))
                                        @else
                                        {{print_r($record);}}
                                        @endif
                                        <p>Hai, {{Session::get('nama')}} anda hari ini belum absen masuk. <br> Silahkan absen pada tombol absen berikut</p>
                                        <br>
                                        <a href="{{url('absen')}}" class="btn btn-primary">Absen Masuk</a>
                                    </Center>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection