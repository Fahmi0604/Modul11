<?php 

    include "../proses/koneksi.php";
    require("../vendor/autoload.php");

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
    $spreadsheet = new Spreadsheet();
    $Excel_writer = new Xlsx($spreadsheet);
    
    $spreadsheet->setActiveSheetIndex(0);
    $activeSheet = $spreadsheet->getActiveSheet();
    
    $activeSheet->setCellValue('A1', 'ID Pengembalian');
    $activeSheet->setCellValue('B1', 'ID Petugas');
    $activeSheet->setCellValue('C1', 'Tanggal Peminjaman');
    $activeSheet->setCellValue('D1', 'Tanggal Pengembalian');
    $activeSheet->setCellValue('E1', 'Judul Buku');
    $activeSheet->setCellValue('F1', 'Nama Anggota');
    $activeSheet->setCellValue('G1', 'Status');
    
    $query = mysqli_query($db, "SELECT * FROM pengembalian as p INNER JOIN buku as b ON p.id_buku = b.id_buku INNER JOIN anggota as a ON p.id_anggota = a.id_anggota ORDER BY p.id_pengembalian DESC");
    
    // if(mysqli_num_rows($query) > 0) {
        $i = 2;
        $status =  $row['status'] ? 'Belum Dikembalikan' : 'Dikembalikan';
        while($row = mysqli_fetch_assoc($query)) {
            $activeSheet->setCellValue('A'.$i , $row['id_pengembalian']);
            $activeSheet->setCellValue('B'.$i , $row['id_petugas']);
            $activeSheet->setCellValue('C'.$i , $row['tanggal_pinjam']);
            $activeSheet->setCellValue('D'.$i , $row['tanggal_pengembalian']);
            $activeSheet->setCellValue('E'.$i , $row['judul']);
            $activeSheet->setCellValue('F'.$i , $row['nama']);
            $activeSheet->setCellValue('G'.$i , $status);
            $i++;
        }
    // }
    
    $filename = 'laporan_transaksi.xlsx';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='. $filename);
    header('Cache-Control: max-age=0');
    $Excel_writer->save('php://output');
?>