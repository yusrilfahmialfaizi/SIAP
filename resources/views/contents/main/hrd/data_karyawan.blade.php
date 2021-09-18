                    @extends('parts.main.master_hrd')
                    @section('content')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body m-t-50">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->

                                            <!-- task, page, download counter  end -->
                                            <div class="col-xl-1"></div>
                                            <!--  sale analytics start -->
                                            <div class="col-xl-10 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Data Karyawan</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <hr>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="basic-btn"
                                                                class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>NIK</th>
                                                                        <th>Nama Karyawan</th>
                                                                        <th>Jenis Kelamin</th>
                                                                        <th>Tempat Tanggal Lahir</th>
                                                                        <th>Alamat</th>
                                                                        <th>Divisi</th>
                                                                        <th>Username</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                    @endphp
                                                                    @foreach($dataset as $data)
                                                                    <tr>
                                                                        @if ($data->jabatan != 'admin')
                                                                        <td>{{$data->nik}}</td>
                                                                        <td>{{$data->nama}}</td>
                                                                        @if ($data->jenis_kelamin == "L")
                                                                        <td>Laki - Laki</td>
                                                                        @else
                                                                        <td>Perempuan</td>
                                                                        @endif
                                                                        <td>{{$data->tempat_lahir.", ".date('d M Y',strtotime($data->tanggal_lahir))}}</td>
                                                                        <td>{{$data->alamat}}</td>
                                                                        <td>{{$data->divisi}}</td>
                                                                        <td>{{$data->username}}</td>
                                                                        @endif
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>NIK</th>
                                                                        <th>Nama Karyawan</th>
                                                                        <th>Jenis Kelamin</th>
                                                                        <th>Tempat Tanggal Lahir</th>
                                                                        <th>Alamat</th>
                                                                        <th>Divisi</th>
                                                                        <th>Username</th>
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