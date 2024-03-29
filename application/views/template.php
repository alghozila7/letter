<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Surat Rakit Aplikasi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- DataTable Button CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation  style="background-color: #7FFF00;"-->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('Home') ?>">Aplikasi Surat
                (<?php echo $this->session->userdata('nama_jabatan') ?>)</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <?php
            $jab = $this->session->userdata('id_jabatan');
            $peg = $this->session->userdata('id_pegawai');
                                    if($jab==1){

                                    ?>
            <?php 
            $query2=$this->db->query("SELECT count(id_disposisi) as mm FROM disposisi WHERE mark = 0 AND id_pegawai_penerima = '$peg'");
            $t2=$query2->row_array();
            if ($t2['mm'] > 0) {
                
            ?>
            <a href="<?php echo base_url('home/disposisi_masuk') ?>"><i class="fa fa-envelope fa-fw"></i> <?php echo $t2['mm']; ?> Surat</a>
            <?php } else { ?>
            <?php } ?>
            <?php }else{ 
            } ?>

            <?php
            $jab = $this->session->userdata('id_jabatan');
            $peg = $this->session->userdata('id_pegawai');
                                    if($jab==3){

                                    ?>
            <?php 
            $query2=$this->db->query("SELECT count(id_disposisi) as mm FROM disposisi WHERE mark = 0 AND id_pegawai_penerima = '$peg'");
            $t2=$query2->row_array();
            if ($t2['mm'] > 0) {
                
            ?>
            <a href="<?php echo base_url('home/disposisi_masuk') ?>"><i class="fa fa-envelope fa-fw"></i> <?php echo $t2['mm']; ?> Surat</a>
            <?php } else { ?>
            <?php } ?>
            <?php }else{ 
            } ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nama_pegawai'); ?> <i
                            class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <?php
                    if ($this->session->userdata('nama_jabatan') == 'Sekretaris') {
                        echo '
                        <li>
                            <a href="' . base_url('home') . '"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/surat_masuk') . '"><i class="fa fa-envelope fa-fw"></i> Surat Masuk</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/surat_keluar') . '"><i class="fa fa-envelope fa-fw"></i> Surat Keluar</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/disposisi_masuk') . '"><i class="fa fa-mail-reply fa-fw"></i> Disposisi Surat</a>
                        </li>
                        ';
                    } else if ($this->session->userdata('nama_jabatan') == 'Pimpinan'){
                        echo '
                        <li>
                            <a href="' . base_url('home') . '"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/surat_masuk') . '"><i class="fa fa-envelope fa-fw"></i> Surat Masuk</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/surat_keluar') . '"><i class="fa fa-envelope fa-fw"></i> Surat Keluar</a>
                        </li>
                        <li>
                            <a href="' . base_url('home/pengguna') . '"><i class="fa fa-users fa-fw"></i> Pengguna</a>
                        </li>
                        ';
                    } else {
                      ?>
                        <li>
                            <a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/disposisi_masuk') ?>"><i class="fa fa-mail-reply fa-fw"></i> Disposisi Surat</a>
                        </li>
                        <!--<?php 
                        $jab = $this->session->userdata('id_jabatan');
                        if($jab==3){
                        }else{
                        ?>
                        <li>
                            <a href="<?php echo base_url('home/disposisi_keluar') ?>"><i class="fa fa-mail-forward fa-fw"></i> Surat Keluar</a>
                        </li>
                        <?php } ?>-->
                        

                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $judul;
                    if (isset($data_surat->nomor_surat))
                        echo ' Nomor ' . $data_surat->nomor_surat
                    ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php
        $notif = $this->session->flashdata('notif');
        if ($notif != null) {
            echo '
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $notif . '
                    </div>                
                </div>
            </div>
            ';
        }
        ?>
        <?php $this->load->view($main_view); ?>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url() ?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url() ?>assets/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/js/buttons.print.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</body>

</html>
