                    @extends('parts.main.master')
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
                                                        <div class="form-group row">
                                                            <div class="col-sm-2">
                                                                <a href="{{url('data-karyawan/create')}}" class="btn btn-primary"> + Tambah Data</a>
                                                            </div>
                                                        </div>
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
                                                                        <th>Action</th>
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
                                                                        <td>
                                                                            {{-- <div class="btn-group " role="group"> --}}
                                                                                <a href="{{url('data-karyawan/'.$data->nik.'/edit')}}" type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="tooltip"
                                                                                data-placement="top" title=""
                                                                                data-original-title="Update Password"><i class="feather icon-edit-2"></i>Edit Password</a>
                                                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm waves-effect waves-light button" id="delete" data-toggle="tooltip"
                                                                                data-placement="top" title=""
                                                                                data-original-title="delete" data-url="{{url('data-karyawan/'.$data->nik)}}" data-id="{{$data->nik}}"><i class="feather icon-trash"></i>Delete</a>
                                                                            {{-- </div> --}}
                                                                        </td>    
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
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-1"></div>
                                            <!--  sale analytics end -->
                                        </div>
                                    </div>
                                </div>

                                {{-- <div id="styleSelector">
                                    
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".button").on('click', function() {
                                var id = $(this).data('id');
                                var url = $(this).data('url');
                                // e.preventDefault();
                                // var url = e.target;
                                console.log(url);
                                swal({
                                        title: "Are you sure?",
                                        text: "Your will not be able to recover this imaginary file!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Yes, delete it!",
                                        closeOnConfirm: false
                                    },
                                    function () {
                                        $.ajax({
                                            type: "DELETE",
                                            url: url,
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                                    .attr('content')
                                            },
                                            success: function (response) {
                                                if (response.message == 'sukses') {
                                                    swal({
                                                        title: "Deleted!",
                                                        text: "File anda telah dihapus.",
                                                        type: "success",
                                                        confirmButtonClass: "btn-primary",
                                                        confirmButtonText: "Ok",
                                                        closeOnConfirm: false
                                                    },
                                                    function () {location.reload()});
                                                }
                                            }         
                                        })
                                });
                            })
                        })
                    </script>
                    @endsection