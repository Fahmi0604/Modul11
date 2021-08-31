<?php
    include '../proses/koneksi.php';
    require("../vendor/autoload.php");

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $query = mysqli_query($db,"select * from buku");
    $html = '<center><h3>Laporan data buku</h3></center><hr/><br/>';
    $html .= '<table border="1" width="100%">
                <tr>
                    <th style="background-color: #0175d8; color: white;">No</th>
                    <th style="background-color: #0175d8; color: white;">ID Buku</th>
                    <th style="background-color: #0175d8; color: white;">Judul</th>
                    <th style="background-color: #0175d8; color: white;">Penulis</th>
                    <th style="background-color: #0175d8; color: white;">Penerbit</th>
                    <th style="background-color: #0175d8; color: white;">Tahun Terbit</th>
                </tr>';
    $no = 1;
    
    while($row = mysqli_fetch_array($query)) {
 
        $html .= "<tr>
                    <td>".$no."</td>
                    <td>".$row['id_buku']."</td>
                    <td>".$row['judul']."</td>
                    <td>".$row['penulis']."</td>
                    <td>".$row['penerbit']."</td>
                    <td>".$row['tahun_terbit']."</td>
                </tr>";
        $no++;
    }

    $html .= "</html>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan_buku.pdf');
?>