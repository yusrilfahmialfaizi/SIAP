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
                                        {{-- <form method="POST" action="/absen_masuk"accept-charset="UTF-8">
                                            {{ csrf_field() }} --}}
                                            <p>Hai, {{Session::get('nama')}} anda hari ini belum absen masuk. <br> Silahkan absen pada tombol absen berikut</p>
                                            <br>
                                            <button class="btn btn-primary" id="submit_masuk">Absen Masuk</button>
                                        {{-- </form> --}}
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
                                        {{-- <form method="POST" action="{{url('absensi/'.$item->id)}}"accept-charset="UTF-8">
                                            {{ csrf_field() }} --}}
                                            <p>Hai, {{Session::get('nama')}} anda hari ini belum absen pulang. <br> Silahkan absen pada tombol absen berikut</p>
                                            <br>
                                            <input type="hidden" name="_method" id="_method" class="form-control" value="PATCH" required>
                                            <button class="btn btn-primary" id="submit_pulang" data-url="{{url('absensi/'.$item->id)}}">Absen Pulang</button>
                                        {{-- </form> --}}
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
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-btn"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Lokasi</th>
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
                                                    <td>{{$data->tanggal}}</td>
                                                    @if ((date("H:i:s",strtotime($data->jam_masuk)) >= date("H:i:s", strtotime($batas_masuk))))
                                                    <td>Absen invalid</td>
                                                    @else
                                                    <td>{{$data->jam_masuk}}</td>
                                                    @endif
                                                    @if ((date("H:i:s",strtotime($data->jam_pulang)) < date("H:i:s", strtotime($batas_pulang))))
                                                    <td>Absen invalid</td>
                                                    @else
                                                    <td>{{$data->jam_pulang}}</td>
                                                    @endif
                                                    <td>
                                                        <button type="button" id="masuk" data-longtd="{{$data->longtd_masuk}}" data-latd="{{$data->latd_masuk}}" class="btn btn-warning btn-sm waves-effect waves-light"><i class="icofont icofont-eye-alt"></i>Masuk</button>
                                                        <div class="modal fade" id="modal-masuk" tabindex="-1"
                                                            role="dialog">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div id="map"></div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default waves-effect "
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" id="pulang" data-longtd="{{$data->longtd_pulang}}" data-latd="{{$data->latd_pulang}}" class="btn btn-warning btn-sm waves-effect waves-light"><i class="icofont icofont-eye-alt"></i>Pulang</button>
                                                        <div class="modal fade" id="modal-pulang" tabindex="-1"
                                                            role="dialog">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div id="map-pulang"></div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-default waves-effect "
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Lokasi</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#submit_masuk").on('click', function() {
            swal({
                    title: "Anda belum absen masuk",
                    text: "Silahkan klik pada tombol absen berikut",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Absen",
                    closeOnConfirm: false
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: "/absen_masuk",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        },
                        success: function (response) {
                            if (response.message == 'sukses') {
                                swal({
                                    title: "Berhasil",
                                    text: "Anda telah melakukan absensi",
                                    type: "success",
                                    confirmButtonClass: "btn-primary",
                                    confirmButtonText: "Ok",
                                    closeOnConfirm: false
                                },
                                function () {location.reload()});
                            }else if (response.message == 'invalid'){
                                swal({
                                    title: "Invalid!",
                                    text: "Anda terlambat!",
                                    type: "error",
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
        $("#submit_pulang").on('click', function() {
            var url     = $(this).data('url');
            var method  = $("#_method").val();
            console.log(url);
            swal({
                    title: "Anda belum absen pulang",
                    text: "Silahkan klik pada tombol absen berikut",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Absen",
                    closeOnConfirm: false
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        },
                        data: {_method:method},
                        success: function (response) {
                            if (response.message == 'sukses') {
                                swal({
                                    title: "Berhasil",
                                    text: "Anda telah melakukan absensi",
                                    type: "success",
                                    confirmButtonClass: "btn-primary",
                                    confirmButtonText: "Ok",
                                    closeOnConfirm: false
                                },
                                function () {location.reload()});
                            }else if (response.message == 'invalid'){
                                swal({
                                    title: "Invalid!",
                                    text: "Masih belum waktu pulang!",
                                    type: "error",
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
        $("#masuk").on('click', function(){
            var mapmargin = 50;
            $('#map').css("height", ($(window).height() - mapmargin));
            $(window).on("resize", resize);
            resize();

            function resize() {

                if ($(window).width() >= 980) {
                    $('#map').css("height", ($(window).height() - mapmargin));
                    $('#map').css("margin-top", 50);
                } else {
                    $('#map').css("height", ($(window).height() - (mapmargin + 12)));
                    $('#map').css("margin-top", -21);
                }

            }
            var longtd  = $(this).data('longtd');
            var latd    = $(this).data('latd');
            var map = L.map('map').setView([latd, longtd], 17);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);
                L.marker([latd, longtd]).addTo(map);
                $("#modal-masuk").modal('show');
                $('#modal-masuk').on('shown.bs.modal', function (e) {
                    setTimeout(function(){ map.invalidateSize()}, 1000);
                })
            $('#modal-masuk').on('hidden.bs.modal', function () {
                map.remove();
            });
        })
        $("#pulang").on('click', function(){
            var mapmargin = 50;
            $('#map-pulang').css("height", ($(window).height() - mapmargin));
            $(window).on("resize", resize);
            resize();

            function resize() {

                if ($(window).width() >= 980) {
                    $('#map-pulang').css("height", ($(window).height() - mapmargin));
                    $('#map-pulang').css("margin-top", 50);
                } else {
                    $('#map-pulang').css("height", ($(window).height() - (mapmargin + 12)));
                    $('#map-pulang').css("margin-top", -21);
                }

            }
            var longtd  = $(this).data('longtd');
            var latd    = $(this).data('latd');
            var map = L.map('map-pulang').setView([latd, longtd], 17);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);
                L.marker([latd, longtd]).addTo(map);
                $("#modal-pulang").modal('show');
                $('#modal-pulang').on('shown.bs.modal', function (e) {
                    setTimeout(function(){ map.invalidateSize()}, 1000);
                })
            $('#modal-pulang').on('hidden.bs.modal', function () {
                map.remove();
            });
        })
    })
</script>
@endsection