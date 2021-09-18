@extends('parts.main.master_hrd')
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
                                    <h5>Absensi Bulanan</h5>
                                    <span></span>
                                </div>
                                <div class="card-block">
                                    <form method="GET" action="{{ route('absensi-bulanan-hrd.filter')}}"accept-charset="UTF-8">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-sm-1 col-form-label">Bulan</label>
                                                <div class="col-sm-4">
                                                    <select name="bulan" id="bulan"
                                                    class="js-example-placeholder-multiple col-sm-12" required>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-1 col-form-label">Tahun</label>
                                                <div class="col-sm-4">
                                                    <select name="tahun" id="tahun"
                                                    class="js-example-placeholder-multiple col-sm-12" required>
                                                    @foreach ($tahun as $item)
                                                    <option value="{{date('Y', strtotime($item->tanggal))}}">{{date('Y', strtotime($item->tanggal))}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="submit" class="btn btn-success" value="Filter">
                                        </div>
                                    </form>
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-btn"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $n=1;
                                                date_default_timezone_set('Asia/Jakarta');
                                                $batas_masuk    = "09:00:00";
                                                $batas_pulang   = "17:00:00";
                                                @endphp
                                                @foreach($record as $data)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$data->nama}}</td>
                                                    <td>{{date("d M Y",strtotime($data->tanggal))}}</td>
                                                    @if ((date("H:i:s",strtotime($data->jam_masuk)) > date("H:i:s", strtotime($batas_masuk))))
                                                    <td>Absen invalid</td>
                                                    @else
                                                    @if ($data->jam_masuk == null)
                                                    <td>Absen invalid</td>
                                                    @else
                                                    <td>{{$data->jam_masuk}}</td>
                                                    @endif
                                                    @endif
                                                    @if ((date("H:i:s",strtotime($data->jam_pulang)) < date("H:i:s", strtotime($batas_pulang))))
                                                    <td>Absen invalid</td>
                                                    @else
                                                    @if ($data->jam_pulang == null)
                                                    <td>Absen invalid</td>
                                                    @else
                                                    <td>{{$data->jam_pulang}}</td>
                                                    @endif
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
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