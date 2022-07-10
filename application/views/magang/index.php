<!DOCTYPE html>
<html lang="en">

<head>
    <title>MAGANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!--load all styles -->
    <!--load all styles -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
        height: 700px
    }

    /* Set gray background color and 100% height */
    .sidenav {
        background-color: #f1f1f1;

        height: 100%;
    }


    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 500px) {
        .sidenav {
            height: 25%;
            padding: 15px;
        }


    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <h1><strong>SIDUL</strong></h1>
                <ul class="nav nav-pills nav-stacked">

                    <li class="active"><a href="#section1">MAGANG</a></li>
                </ul><br>
            </div>

            <br>
            <br>
            <div class="card-body">
                <div class="card-header" style="text-align: center; color:purple">
                    <!-- <h3 class="card-title"><b>PROKER</b> </h3>
                      <p style="color: purple;"><b> D3TI UNIVERSITAS AMIKOM YOGYAKARTA</b></p> -->

                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12" style="text-align: left;">
                            <button class="btn btn-success " data-toggle="modal" data-target="#tambah">TAMBAH</button>
                            <br>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="table-responsive">

                            <table class="table">
                                <?= $this->session->flashdata('message'); ?>

                                <br>
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA</th>
                                        <th>NIM</th>
                                        <th>Konsentrasi</th>
                                        <th>Tahun</th>
                                        <th>Pembimbing</th>
                                        <th>Tempat Magang</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Dokumen</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
							$no = 1;
						foreach ($magang as $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['nim'] ?></td>

                                        <?php
										$konsentrasi = $value['konsentrasi'];
										if ($konsentrasi == 1) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: maroon; border:solid 2px green; border-radius: 5px; color:white;'</p><b>WEB</b></></td>";
										} else if  ($konsentrasi == 2) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: red; border:solid 2px red; border-radius: 5px; color:white;'</p><b>JARINGAN</b></></td>";
										} else if  ($konsentrasi == 3) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: blue; border:solid 2px blue; border-radius: 5px; color:white;'</p><b>ANIMASI</b></></td>";
										
										}
									?>
                                        <td><?= $value['tahun'] ?></td>
                                        <td><?= $value['pembimbing']; ?></td>
                                        <td><?= $value['tempat_magang']; ?></td>
                                        <td><?= $value['waktu_mulai']; ?></td>
                                        <td><?= $value['waktu_selesai']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= base_url('assets/img/')?><?= ($value['dokumen']) ?>">
                                                <img src="<?= base_url('assets/img/download.png')?>"
                                                    style="width:60px; height:60px">
                                            </a>
                                        </td>
                                        <?php
										$status = $value['status'];
										if ($status == 1) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: red; border:solid 2px red; border-radius: 5px; color:white;'</p><b>Belum ACC</b></></td>";
										} else if  ($status == 2) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: navy; border:solid 2px navy; border-radius: 5px; color:white;'</p><b>On Process</b></></td>";
										} else if  ($status == 3) {
										echo " <td style='text-align:center; height:4%'><p style='background-color: green; border:solid 2px green; border-radius: 5px; color:white;'</p><b>ACC</b></></td>";
										
										} 
									?>
                                        <td style="text-align: center; width:10%">

                                            <button class="btn btn-primary " data-toggle="modal"
                                                data-target="#edit<?= $value['id'] ?>"> <i
                                                    class="fas fa-user">Update</i>
                                            </button>
                                            <br>
                                            <br>
                                            <button class="btn btn-danger " data-toggle="modal"
                                                data-target="#delete<?= $value['id'] ?>"><i
                                                    class="fas fa-user">Delete</i></button>
                                        </td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tambah">
        <form role="form" action="<?= base_url('index.php/magang/tambah') ?>" method="POST"
            enctype="multipart/form-data">
            <div class="modal-dialog  ">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Konsentrasi</label>
                                    <select class="form-control m-input m-input--air" type="text" name="konsentrasi"
                                        required>
                                        <?php

                                     $konsentrasi = $value['konsentrasi'];
                                     if ($konsentrasi == '1') {?>
                                        <option value="">Pilih</option>
                                        <option value="1" selected>WEB</option>
                                        <option value="2">JARINGAN</option>
                                        <option value="3">ANIMASI</option>

                                        <?php } else if ($konsentrasi == '2' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">WEB</option>
                                        <option value="2" selected>JARINGAN</option>
                                        <option value="3">ANIMASI</option>

                                        <?php } else if ($konsentrasi == '3' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">WEB</option>
                                        <option value="2">JARINGAN</option>
                                        <option value="3" selected>ANIMASI</option>

                                        <?php }?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number	" class="form-control" name="tahun" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" class="form-control" name="nim" required>
                                </div>

                                <div class="form-group">
                                    <label>Dokumen</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="image" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pembimbing</label>
                                    <input type="texy" class="form-control" name="pembimbing" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Mulai</label>
                                    <input type="date" class="form-control" name="waktu mulai" required>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Magang</label>
                                    <input type="texy" class="form-control" name="tempat_magang" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Waktu Selesai</label>
                                    <input type="date" class="form-control" name="waktu_selesai" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control m-input m-input--air" type="text" name="status"
                                        required>
                                        <?php

                                     $status = $value['status'];
                                     if ($status == '1') {?>
                                        <option value="">Pilih</option>
                                        <option value="1" selected>Belum ACC</option>
                                        <option value="2">On Proses</option>
                                        <option value="3">ACC</option>

                                        <?php } else if ($status == '2' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">Belum ACC</option>
                                        <option value="2" selected>On Proses</option>
                                        <option value="3">ACC</option>

                                        <?php } else if ($status == '3' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">Belum Acc</option>
                                        <option value="2">On Proses</option>
                                        <option value="3" selected>ACC</option>

                                        <?php
                                    } else {?>
                                        <option value="">Pilih</option>
                                        <option value="1">Terlaksana</option>
                                        <option value="2">Belum Terlaksana</option>
                                        <?php }?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
    </div>


    </form>
    </div>

    <?php
    foreach ($magang as $value) : ?>
    <div class="modal fade" id="edit<?= $value['id'] ?>">
        <form role="form" action="<?= base_url('index.php/magang/edit') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $value['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Konsentrasi</label>
                                    <select class="form-control m-input m-input--air" type="text" name="konsentrasi"
                                        required>
                                        <?php

                                     $konsentrasi = $value['konsentrasi'];
                                     if ($konsentrasi == '1') {?>
                                        <option value="">Pilih</option>
                                        <option value="1" selected>WEB</option>
                                        <option value="2">JARINGAN</option>
                                        <option value="3">ANIMASI</option>

                                        <?php } else if ($konsentrasi == '2' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">WEB</option>
                                        <option value="2" selected>JARINGAN</option>
                                        <option value="3">ANIMASI</option>

                                        <?php } else if ($konsentrasi == '3' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">WEB</option>
                                        <option value="2">JARINGAN</option>
                                        <option value="3" selected>ANIMASI</option>

                                        <?php }?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number	" class="form-control" name="tahun"
                                        value="<?= $value['tahun'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" class="form-control" name="nim" value="<?= $value['nim'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Dokumen</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="image"
                                            value="<?= $value['dokumen'] ?>">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pembimbing</label>
                                    <input type="texy" class="form-control" name="pembimbing"
                                        value="<?= $value['pembimbing'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Mulai</label>
                                    <input type="date" class="form-control" name="waktu_mulai"
                                        value="<?= $value['waktu_mulai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Magang</label>
                                    <input type="texy" class="form-control" name="tempat_magang"
                                        value="<?= $value['tempat_magang'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Waktu Selesai</label>
                                    <input type="date" class="form-control" name="waktu_selesai"
                                        value="<?= $value['waktu_selesai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control m-input m-input--air" type="text" name="status"
                                        required>
                                        <?php

                                     $status = $value['status'];
                                     if ($status == '1') {?>
                                        <option value="">Pilih</option>
                                        <option value="1" selected>Belum ACC</option>
                                        <option value="2">On Proses</option>
                                        <option value="3">ACC</option>

                                        <?php } else if ($status == '2' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">Belum ACC</option>
                                        <option value="2" selected>On Proses</option>
                                        <option value="3">ACC</option>

                                        <?php } else if ($status == '3' ) {?>
                                        <option value="">Pilih</option>
                                        <option value="1">Belum Acc</option>
                                        <option value="2">On Proses</option>
                                        <option value="3" selected>ACC</option>

                                        <?php }?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="old_image" value="<?= $value['dokumen'] ?>">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>

    <?php

    foreach ($magang as $value) : ?>
    <div class="modal fade" id="delete<?= $value['id'] ?>">
        <form role="form" action="<?= base_url('index.php/magang/delete') ?>" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <h4>Are you sure?</h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="width: 80px;">Cancel</button>
                        <button type="submit" class="btn btn-primary" style="width: 80px;">Yes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>




</body>












</html>
