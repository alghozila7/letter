<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <?php echo 'Daftar ' . $judul ?>&nbsp;&nbsp;
                <?php 
                $jab = $this->session->userdata('id_jabatan');
                ?>
                <button class="btn btn-info" data-toggle="modal" data-target="#tambah_pegawai">
                    <i class="fa fa-user"></i> Tambah <?php echo $judul ?>
                </button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    if (isset($data_pengguna)) {
                        foreach ($data_pengguna as $row) {
                            ?>
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $no++ ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $row->nik ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $row->nama_pegawai ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $row->nama_jabatan ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $row->password ?></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah_pegawai<?php echo $row->id_pegawai?>">Ubah</button>
                                    <?php 
                                    if ($row->status == 0) {
                                    ?>
                                    <a href="<?php echo base_url('home/non_pengguna/' . $row->id_pegawai) ?>" class="btn btn-warning btn-sm">Non-Aktifkan</a>
                                    <?php 
                                    } else {
                                    ?>
                                    <a href="<?php echo base_url('home/aktif_pengguna/' . $row->id_pegawai) ?>" class="btn btn-primary btn-sm">Aktifkan</a>
                                    <?php } ?>
                                
                                </td>
                            </tr>
                        
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="modal fade" id="tambah_pegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/tambah_pegawai') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Tambah <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" type="text" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama_pegawai" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="id_jabatan">
                        <?php foreach($data_jabatan as $l){ ?>
                        <option value="<?php echo $l->id_jabatan; ?>"><?php echo $l->nama_jabatan; ?></option>
                        <?php } ?>
                  </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <!--<div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="file_surat" required>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Tambah <?php echo $judul ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

 <?php
                    foreach ($data_pengguna as $row) {
                    ?>

<div class="modal fade" id="ubah_pegawai<?php echo $row->id_pegawai?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/ubah_pegawai') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Ubah <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $row->id_pegawai ?>">
                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" type="text" name="nik" id="nik" value="<?php echo $row->nik ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama_pegawai" id="nama_pegawai" value="<?php echo $row->nama_pegawai ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="id_jabatan" id="id_jabatan">
                                <?php foreach ($data_jabatan as $j) {
                                    $id_jabat=$j->id_jabatan;
                                    $nm_jabat=$j->nama_jabatan;
                                    if($id_jabat==$row->id_jabatan)
                                        echo "<option value='$id_jabat' selected>$nm_jabat</option>";
                                    else
                                        echo "<option value='$id_jabat'>$nm_jabat</option>";
                                }
                                ?>

                  </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <!--<div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="file_surat" required>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Ubah <?php echo $judul ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>


<!--<script>
    function ubah_pegawai(id_pegawai) {
        $('#id_pegawai').empty();
        $('#nik').empty();
        $('#nama_pegawai').empty();
        $('#id_jabatan').empty();
        //$('#password').empty();

        $.getJSON('<?php echo base_url('home/get_pengguna_by_id/')?>' + id_pegawai, function (data) {
            $('#id_pegawai').val(data.id_pegawai);
            $('#nik').val(data.nik);
            $('#nama_pegawai').val(data.nama_pegawai);
            $('#id_jabatan').val(data.id_jabatan);
            //$('#password').val(data.password);
        })
    }
</script>-->