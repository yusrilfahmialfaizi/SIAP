@extends('parts.main.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        @if ($record->isEmpty())
                        <!-- ANGLE OFFSET AND ARC start -->
                        <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h5>Notifikasi</h5> --}}
                                    <span></span>
                                </div>
                                <div class="card-block text-center">
                                    <Center>
                                        <form method="POST" action="/absen_masuk"accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <p>Hai, {{Session::get('nama')}} anda hari ini belum absen masuk. <br> Silahkan absen pada tombol absen berikut</p>
                                            <br>
                                            <input type="submit" class="btn btn-primary" value="Absen Masuk">
                                        </form>
                                    </Center>
                                </div>
                            </div>
                        </div>
                        @else
                        @foreach ($record as $item)
                        @if (!$item->jam_masuk == null && $item->jam_pulang == null)
                        <div class="col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h5>Notifikasi</h5> --}}
                                    <span></span>
                                </div>
                                <div class="card-block text-center">
                                    <Center>
                                        <form method="POST" action="{{url('absensi/'.$item->id)}}"accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <p>Hai, {{Session::get('nama')}} anda hari ini belum absen pulang. <br> Silahkan absen pada tombol absen berikut</p>
                                            <br>
                                            <input type="hidden" name="_method" id="_method" class="form-control" value="PATCH" required>
                                            <input type="submit" class="btn btn-primary" value="Absen Pulang">
                                        </form>
                                    </Center>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                            
                        @endif
                        <div class="col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Absensi Anda Hari Ini</h5>
                                    <span></span>
                                </div>
                                <div class="card-block text-center">
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-btn"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $n=1;
                                                @endphp
                                                @foreach($record as $data)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$data->tanggal}}</td>
                                                    <td>{{$data->jam_masuk}}</td>
                                                    <td>{{$data->jam_pulang}}</td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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