<?php

require_once('../dompdf/autoload.inc.php');
include "../koneksi.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$select1 = mysqli_query($koneksi,"SELECT * FROM eventdt where id_acara='".$_GET['id']."'");
$select2 = mysqli_query($koneksi,"SELECT * FROM bookingdt where id_acara='".$_GET['id']."'");

$html = '<h2>Data Acara</h2>';
$html .=  '<table border="1" cellspacing="0" width=100%>
            <tr style="text-align:center;font-weight:bold;">
            <td>Event Name</td>
            <td>Event Date</td>
            <td>Description</td>
            <td>Event Held</td>
            <td>Ticket Price</td>
            <td>Total Participant</td>
            <td>Category</td>
            <td>Due Date</td>
            <td>Start Time</td>
            <td>End Time</td>
            <td>Thumbnail</td>
        </tr>';
  
    
    while($hasil = mysqli_fetch_array($select1)){
    
    $html .="<tr>
            <td>".$hasil ['nama_acara']."</td>
            <td>".$hasil ['tgl_acara']."</td>
            <td>".$hasil ['desc_acara']."</td>
            <td>".$hasil ['almt_acara']."</td>
            <td>".$hasil ['hrg_tiket']."</td>
            <td>".$hasil ['jml_peserta']."</td>
            <td>".$hasil ['kategori']."</td>
            <td>".$hasil ['tgl_batas']."</td>
            <td>".$hasil ['jam_mulai']."</td>
            <td>".$hasil ['jam_akhir']."</td>
            <td>".'<img src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'"width="250px" height="170px">'."</td>
    </tr>";
    }

    $html .='<br/>';
    
    $html .='<table border="1" cellspacing="0" width=100%>
                <tr style="text-align:center;font-weight:bold;">
                <td>Nomor</td>
                <td>Nama</td>
                <td>E-mail</td>
                <td>Telepon</td>
                </tr>';

    $x=1;
    while($hasil = mysqli_fetch_array($select2)){
    
     $html .="<tr>
                <td>".$x."</td>
                <td>".$hasil ['nama']."</td>
                <td>".$hasil ['email']."</td>
                <td>".$hasil ['telp']."</td>
            </tr>";
            $x++;
            }

  '</body></html>';
  
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('laporan.pdf');

?>