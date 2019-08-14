<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <?php echo 'Daftar ' . $judul ?>&nbsp;&nbsp;
                <?php 
                $jab = $this->session->userdata('id_jabatan');
                if($jab==2){
                    ?>
                    <button class="btn btn-info" data-toggle="modal" data-target="#laporan_surat_masuk_id">
                    <i class="fa fa-calendar"></i> Laporan Surat Masuk
                </button>
                    <?php
                }else{ 
                ?>
                <button class="btn btn-info" data-toggle="modal" data-target="#tambah_surat_masuk">
                    <i class="fa fa-envelope"></i> Tambah <?php echo $judul ?>
                </button>
                <?php } ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal Kirim</th>
                        <th>Tanggal Terima</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($data_surat_masuk)) {
                        foreach ($data_surat_masuk as $surat_masuk) {
                            ?>
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $surat_masuk->nomor_surat ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $surat_masuk->tgl_kirim ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $surat_masuk->tgl_terima ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $surat_masuk->pengirim ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $surat_masuk->perihal ?></td>
                                <td class="text-center" style="vertical-align: middle;"><a href="<?php echo base_url('/uploads/' . $surat_masuk->file_surat) ?>"><i class="fa fa-envelope"></i></a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <?php 
                $jab = $this->session->userdata('id_jabatan');
                if($jab==2){
                }else{ 
                ?>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ubah_surat_masuk" onclick="ubah_surat(<?php echo $surat_masuk->id_surat ?>)">Ubah</button>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah_file_surat_masuk" onclick="ubah_surat(<?php echo $surat_masuk->id_surat ?>)">Ubah Surat</button>
                                    <?php } ?>
                                    <?php 
                $jab = $this->session->userdata('id_jabatan');
                if($jab==1){
                }else{ 
                ?>
                                    <a href="<?php echo base_url('home/disposisi/' . $surat_masuk->id_surat) ?>" class="btn btn-sm btn-primary">Disposisi</a>
                                    <?php } ?>
                                    <?php 
                $jab = $this->session->userdata('id_jabatan');
                if($jab==2){
                }else{ 
                ?>
                                    <a href="<?php echo base_url('home/hapus_surat_masuk/' . $surat_masuk->id_surat) ?>" class="btn btn-sm btn-danger">Hapus</a>
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

<div class="modal fade" id="laporan_surat_masuk_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="<?php echo base_url().'home/laporan_surat_masuk_id'?>" target="__blank" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Laporan Surat Masuk</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input class="form-control" type="date" name="dari" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input class="form-control" type="date" name="sampai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="tambah_surat_masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/tambah_surat_masuk') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Tambah <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input class="form-control" type="text" name="nomor_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <input class="form-control" type="date" name="tgl_kirim" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" type="date" name="tgl_terima" required>
                    </div>
                    <div class="form-group">
                        <label>Pengirim</label>
                        <input class="form-control" type="text" name="pengirim" required>
                    </div>
                    <div class="form-group">
                        <label>Penerima</label>
                        <input class="form-control" type="text" name="penerima" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" rows="1" name="perihal" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="file_surat" required>
                    </div>
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

<div class="modal fade" id="ubah_surat_masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/ubah_surat_masuk') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Ubah <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ubah_id_surat" id="ubah_id_surat">
                    <div class="form-group">
                        <label>Nomor Surat </label>
                        <input class="form-control" type="text" name="ubah_nomor_surat" id="ubah_nomor_surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <input class="form-control" type="date" name="ubah_tgl_kirim" id="ubah_tgl_kirim" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" type="date" name="ubah_tgl_terima" id="ubah_tgl_terima" required>
                    </div>
                    <div class="form-group">
                        <label>Pengirim</label>
                        <input class="form-control" type="text" name="ubah_pengirim" id="ubah_pengirim" required>
                    </div>
                    <div class="form-group">
                        <label>Penerima</label>
                        <input class="form-control" type="text" name="ubah_penerima" id="ubah_penerima" required>
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" rows="1" name="ubah_perihal" id="ubah_perihal"
                                  required></textarea>
                    </div>
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

<div class="modal fade" id="ubah_file_surat_masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/ubah_file_surat_masuk') ?>" method="post"
                  enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Ubah File <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ubah_file_surat" id="ubah_file_surat">
                    <div class="form-group">
                        <label>File Surat</label>
                        <input class="form-control" type="file" accept="application/pdf" name="ubah_file_surat"
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Ubah File <?php echo $judul ?>" name="submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function ubah_surat(id_surat) {
        $('#ubah_id_surat').empty();
        $('#ubah_nomor_surat').empty();
        $('#ubah_tgl_kirim').empty();
        $('#ubah_tgl_terima').empty();
        $('#ubah_pengirim').empty();
        $('#ubah_penerima').empty();
        $('#ubah_perihal').empty();
        $('#ubah_file_surat').empty();

        $.getJSON('<?php echo base_url('home/get_surat_masuk_by_id/')?>' + id_surat, function (data) {
            $('#ubah_id_surat').val(data.id_surat);
            $('#ubah_nomor_surat').val(data.nomor_surat);
            $('#ubah_tgl_kirim').val(data.tgl_kirim);
            $('#ubah_tgl_terima').val(data.tgl_terima);
            $('#ubah_pengirim').val(data.pengirim);
            $('#ubah_penerima').val(data.penerima);
            $('#ubah_perihal').val(data.perihal);
            $('#ubah_file_surat').val(data.id_surat);
        })
    }
</script>