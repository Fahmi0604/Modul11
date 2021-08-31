<?php  
    include '../proses/koneksi.php';
    require("../vendor/autoload.php");

    use Dompdf\Dompdf;
    use Dompdf\Options;

    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $options->set('isHtml5ParserEnabled', TRUE);
    $dompdf = new Dompdf($options);

    $query = mysqli_query($db,"select * from anggota");
    $html = '<center><h3>Laporan data Anggota</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                    <th style="background-color: #0175d8; color: white;">No</th>
                    <th style="background-color: #0175d8; color: white;">ID Anggota</th>
                    <th style="background-color: #0175d8; color: white;">Nama</th>
                    <th style="background-color: #0175d8; color: white;">Jenis Kelamin</th>
                    <th style="background-color: #0175d8; color: white;">Alamat</th>
                </tr>';
    $no = 1;
    
    while($row = mysqli_fetch_array($query)) {
 
        $html .= "<tr>
                    <td>".$no."</td>
                    <td>".$row['id_anggota']."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['jenis_kelamin']."</td>
                    <td>".$row['alamat']."</td>
                </tr>";
        $no++;
    }

    $html .= "</html>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_anggota.pdf');
?>