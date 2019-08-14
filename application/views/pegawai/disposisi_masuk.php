<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <?php echo 'Daftar ' . $judul ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Unit Pengirim</th>
                        <th>Nama Pengirim</th>
                        <th>Tanggal Disposisi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $jab = $this->session->userdata('id_jabatan');
                    if (isset($data_disposisi_masuk)) {
                        $no = 0;
                        foreach ($data_disposisi_masuk as $disposisi_masuk) {
                            ?>
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><?php echo ++$no ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $disposisi_masuk->nama_jabatan ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $disposisi_masuk->nama_pegawai ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $disposisi_masuk->tgl_disposisi ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?php echo $disposisi_masuk->keterangan ?></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    
                                    <a href="<?php echo base_url('/uploads/' . $disposisi_masuk->file_surat) ?>" class="btn btn-sm btn-success" style="width: 100%">Lihat Surat</a><br>
                                    <?php 
                        if ($disposisi_masuk->mark==0) {
                        ?>
                        <a href="<?php echo base_url('home/mark/' . $disposisi_masuk->id_disposisi) ?>" class="btn btn-sm btn-warning" style="width: 100%">Tandai Baca</a>
                        <?php }else{
                            echo "telah dibaca";
                        } ?>
                                    <?php
                                    if($jab==3 OR $jab==1){

                                    }else{ ?>
                                    <a href="<?php echo base_url('home/disposisi_keluar_pegawai/' . $disposisi_masuk->id_surat) ?>" class="btn btn-sm btn-info" style="width: 100%; margin-top: 5%">Tambah Disposisi</a>
                                    <?php
                                    }
                                    ?>
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

<div class="modal fade" id="tambah_surat_masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?php echo base_url('home/tambah_disposisi/' . $this->uri->segment(3)) ?>"
                  method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Tambah <?php echo $judul ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tujuan Unit</label>
                        <select class="form-control" name="tujuan_unit"
                                onchange="get_pegawai_id_by_jabatan(this.value)">
                            <option value="">-- Pilih Tujuan Unit --</option>
                            <?php
                            if (isset($drop_down_jabatan)) {
                                foreach ($drop_down_jabatan as $jabatan) {
                                    if ($jabatan->id_jabatan != $this->session->userdata('id_jabatan')) {
                                        echo '<option value="' . $jabatan->id_jabatan . '">' . $jabatan->nama_jabatan . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Pegawai</label>
                        <select class="form-control" name="tujuan_pegawai" id="tujuan_pegawai">
                            <option value="">-- Pilih Nama Pegawai --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="5"></textarea>
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

<script>
    function get_pegawai_id_by_jabatan(id_jabatan) {
        $('#tujuan_pegawai').empty();
        $.getJSON('<?php echo base_url('home/get_pegawai_by_jabatan/')?>' + id_jabatan, function (data) {
            $('#tujuan_pegawai').append('<option value="">-- Pilih Nama Pegawai --</option>');
            $.each(data, function (index, value) {
                $('#tujuan_pegawai').append('<option value="' + value.id_pegawai + '">' + value.nama_pegawai + '</option>');
            })
        })
    }
</script>