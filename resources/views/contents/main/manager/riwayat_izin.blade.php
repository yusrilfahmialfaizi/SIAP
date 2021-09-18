@extends('parts.main.master_manager')
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
                                    <h5>Riwayat Izin</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-btn"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal Diajukan</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Jenis Ketidakhadiran</th>
                                                    <th>Surat Dokter</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $n=1;
                                                @endphp
                                                @foreach($izin as $data)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$data->created_at}}</td>
                                                    <td>{{$data->tgl_mulai}}</td>
                                                    <td>{{$data->tgl_selesai}}</td>
                                                    <td>{{$data->jenis_tidakhadir}}</td>
                                                    <td><a href="{{asset('public/upload/images/'.$data->gambar)}}" target="_blank">{{$data->gambar}}</a></td>
                                                    <td>{{$data->keterangan}}</td>
                                                    <td>{{$data->status}}</td>
                                                    @if ($data->status == 'Diajukan')
                                                        <td>
                                                            <div class="form-group row">
                                                                <form method="POST" action="{{ url('izin/'.$data->id)}}"accept-charset="UTF-8">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_method" id="_method"
                                                                    class="form-control" value="PATCH"
                                                                    required>
                                                                    <input type="hidden" id="id" name="id" value="{{$data->id}}">
                                                                    <input type="hidden" id="status" name="status" value="Diterima">
                                                                    <button type="submit" name="simpan"
                                                                    id="simpan" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-check-alt"></i></i>Terima</button>
                                                            </form>
                                                            <br>
                                                            <form method="POST" action="{{ url('izin/'.$data->id)}}"accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" id="_method"
                                                            class="form-control" value="PATCH"
                                                                        required>
                                                                        <input type="hidden" id="id" name="id" value="{{$data->id}}">
                                                                <input type="hidden" id="status" name="status" value="Ditolak">
                                                                <button type="submit" name="simpan"
                                                                    id="simpan" class="btn btn-danger btn-sm waves-effect waves-light"><i class="icofont icofont-close"></i></i>Tolak</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @elseif ($data->status == 'Ditolak')
                                                        <td>Anda telah menolak pengajuan izin</td>
                                                    @elseif ($data->status == 'Diterima')
                                                        <td>Anda telah menerima pengajuan izin</td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal Diajukan</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Jenis Ketidakhadiran</th>
                                                    <th>Surat Dokter</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
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