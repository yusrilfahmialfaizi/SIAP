@extends('parts.main.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Profile</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item" style="float: left;">
                                        <a href="https://demo.dashboardpack.com/adminty-html/index.html"> <i
                                                class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item" style="float: left;"><a href="#!">User Profile</a>
                                    </li>
                                    <li class="breadcrumb-item" style="float: left;"><a href="#!">User Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!--profile cover start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid" src="{{asset('assets/assets/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                                    
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    @if ($data->jenis_kelamin == "P")
                                                    <img class="user-img img-radius"
                                                    src="{{asset('assets/assets/images/user-profile/user-img.jpg')}}"
                                                    alt="user-img">
                                                    @else
                                                    <img class="profile-bg-img img-fluid" src="{{asset('assets/assets/images/avatar-4.jpg')}}" alt="bg-img">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{$data->nama}}</h2>
                                                        <span class="text-white">{{$data->divisi}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--profile cover end-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab header start -->
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal"
                                            role="tab">Info</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- tab header end -->
                            <!-- tab content start -->
                            <div class="tab-content">
                                <!-- tab panel personal start -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <!-- personal card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">About</h5>
                                            <button id="edit-btn" type="button" data-toggle="modal" data-target="#modalEdit"
                                                class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                <i class="icofont icofont-edit"></i>
                                            </button>
                                        </div>
                                        <div class="modal fade" id="modalEdit" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ url('profil/'. $data->nik)}}"accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">NIK</label>
                                                                <div class="col-sm-4">
                                                                    <input type="hidden" name="_method" id="_method"
                                                                        class="form-control" value="PATCH"
                                                                        required>
                                                                    <input type="number" name="nik" id="nik"
                                                                        class="form-control" placeholder="Contoh : 350xxxx" value="{{$data->nik}}"
                                                                        required>
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="nama" id="nama"
                                                                        class="form-control" placeholder="Contoh : Udin" value="{{$data->nama}}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                                                        class="form-control" required>
                                                                        <option value="&nbsp">--Pilih--</option>
                                                                        <option @if($data->jenis_kelamin =='L') selected @endif value="L">Laki-Laki</option>
                                                                        <option @if($data->jenis_kelamin =='P') selected @endif value="P">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                                        class="form-control" placeholder="Contoh : Surabaya" value="{{$data->tempat_lahir}}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                                        class="form-control" placeholder="Contoh : Udin" value="{{$data->tanggal_lahir}}"
                                                                        required>
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                                <div class="col-sm-4">
                                                                    <textarea rows="5" cols="5" id="alamat" name="alamat" class="form-control" placeholder="Jl. Ahmadxx" required>{{$data->alamat}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                            class="btn btn-default waves-effect "
                                                            data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-success waves-effect " value="Simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Nama Lengkap
                                                                                    </th>
                                                                                    <td>{{$data->nama}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Jenis Kelamin</th>
                                                                                    <td>@if ($data->jenis_kelamin == 'L')
                                                                                        Laki - Laki
                                                                                    @else
                                                                                        Perempuan
                                                                                    @endif</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Tempat Tanggal Lahir
                                                                                    </th>
                                                                                    <td>{{$data->tempat_lahir.", ".date("d M Y", strtotime($data->tanggal_lahir))}}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Alamat</th>
                                                                                    <td>{{$data->alamat}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        Divisi</th>
                                                                                    <td>{{$data->divisi}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                            </div>
                                                            <!-- end of row -->
                                                        </div>
                                                        <!-- end of general info -->
                                                    </div>
                                                    <!-- end of col-lg-12 -->
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                        </div>
                                        <!-- end of card-block -->
                                    </div>
                                </div>
                            </div>
                            <!-- tab content end -->
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main body end -->
    </div>
</div>
@endsection