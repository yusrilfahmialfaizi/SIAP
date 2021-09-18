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
                                                        <h5>Tambah Data Karyawan</h5>
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
                                                        <form method="POST" action="{{ url('data-karyawan')}}"accept-charset="UTF-8">
                                                            {{ csrf_field() }}
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">NIK</label>
                                                                <div class="col-sm-4">
                                                                    <input type="number" name="nik" id="nik"
                                                                        class="form-control" placeholder="Contoh : 350xxxx"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nama Karyawan</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="nama" id="nama"
                                                                        class="form-control" placeholder="Contoh : Udin"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                                                        class="js-example-placeholder-multiple col-sm-12" required>
                                                                        <option value="&nbsp">--Pilih--</option>
                                                                        <option value="L">Laki - Laki</option>
                                                                        <option value="P">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Divisi</label>
                                                                    <div class="col-sm-4">
                                                                        <select name="divisi" id="divisi"
                                                                        class="js-example-placeholder-multiple col-sm-12" required>
                                                                        <option value="&nbsp">--Pilih--</option>
                                                                        <option value="Manager">Manager</option>
                                                                        <option value="HRD">HRD</option>
                                                                        <option value="Karyawan">Karyawan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                                        class="form-control" placeholder="Contoh : Surabaya"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                                        class="form-control" placeholder="Contoh : Udin"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                                <div class="col-sm-4">
                                                                    <textarea rows="5" cols="5" id="alamat" name="alamat" class="form-control" placeholder="Jl. Ahmadxx" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Username</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="username" id="username"
                                                                        class="form-control" placeholder="Contoh : Udin"
                                                                        required>
                                                                    <p id="check"></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-4">
                                                                    <input type="password" name="password" id="password"
                                                                        class="form-control" placeholder="Contoh : Udin"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <div class="col-sm-2">
                                                                    <button type="submit" class="btn btn-primary" name="simpan"
                                                                    id="simpan">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-1"></div>
                                            <!--  sale analytics end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $("#username").on('keyup', function(){
                                var username = $('#username').val();
                                $.ajax({
                                    type: "POST",
                                    url:"{{ route('ajaxRequest.post') }}",
                                    data: {username:username},
                                    success: function (response) {
                                        console.log(response);
                                        if (response < 1) {
                                            var d = document.getElementById("username");
                                            var c = document.getElementById("check");
                                            d.classList.remove('form-control-success');
                                            d.classList.remove('form-control-danger');
                                            d.classList.add('form-control-success');
                                            document.getElementsByName('username').id = 'username inputSuccess1';
                                            c.innerHTML = "&#10003; Username ready";
                                            c.style.color = 'green';
                                            document.getElementById('simpan').disabled = false;
                                        }else{
                                            var d = document.getElementById("username");
                                            var c = document.getElementById("check");
                                            d.classList.remove('form-control-success');
                                            d.classList.remove('form-control-danger');
                                            d.classList.add('form-control-danger');
                                            document.getElementsByName('username').id = 'username inputDanger1';
                                            c.innerHTML = "&#x2718; Username already taken";
                                            c.style.color = 'red';
                                            document.getElementById('simpan').disabled = true;
                                        }
                                    }
                                })
                            })
                        });
                    </script>
                    @endsection