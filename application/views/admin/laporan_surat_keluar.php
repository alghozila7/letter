<html>
<head>
    <title>Laporan</title>
    <meta charset="utf-8">
</head>
<body onload="window.print()">
<div id="laporan">
    <!--
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>
</table>-->
 <?php 
    $no=1;
$dari=$_POST['dari'];
$sampai=$_POST['sampai'];
     ?>
     <center><h4>LAPORAN SURAT KELUAR</h4></center></br>
     <center><h4>Dari <?php echo $dari; ?> || Sampai <?php echo $sampai; ?></h4></center></br>
     <?php 
                    $query=$this->db->query("SELECT * FROM surat_keluar WHERE tgl_kirim BETWEEN '$dari'AND '$sampai' ORDER BY id_surat DESC");
                          $t=$query->num_rows();

                          if ($t==0) {
                    ?>
                    <center><h4>Tidak Ada Surat Keluar</h4></center>
                    <?php } else { ?>
     <table  width="100" border="1" align="center" >
<thead>
   
                        <td>No</td>
                        <td>Nomor Surat</td>
                        <td>Tanggal Kirim</td>
                        <td>Tujuan</td>
                        <td>Perihal</td>
                  
</thead>
<tbody>
<?php 
                    $query=$this->db->query("SELECT * FROM surat_keluar WHERE tgl_kirim BETWEEN '$dari'AND '$sampai' ORDER BY id_surat DESC");
                          $x=$query->row_array();

                                foreach($query->result() as $t){ ?>
                                <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $t->nomor_surat; ?></td>
                                    <td><?php echo $t->tgl_kirim; ?></td>
                                    <td><?php echo $t->tujuan; ?></td>
                                    <td><?php echo $t->perihal; ?></td>
                                </tr>
                                <?php } ?>
                </tbody>

</table>
<?php } ?>


</div>
</body>
</html>