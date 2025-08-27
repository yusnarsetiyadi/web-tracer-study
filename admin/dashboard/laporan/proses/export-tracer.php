<?php
include "../../../../db/db_koneksi.php";

$con = new db_koneksi;
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_tracer.xls");
header("Pragma: no-cache");
header("Expires: 0");

$data = $con->get_laporan_data_tracer();
?>

<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Alumni</th>
            <th>Jurusan</th>
            <th>Tahun Lulus</th>
            <th>Nama Instansi</th>
            <th>Alamat Instansi</th>
            <th>Sektor</th>
            <th>Telp</th>
            <th>Gaji</th>
            <th>Ket UMR</th>
            <th>Waktu Tunggu Pertama Kerja</th>
            <th>Sektor Instansi Pertama</th>
            <th>Gaji Pertama</th>
            <th>Ket UMR</th>
            <th>Diinput</th>
            <th>Diedit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $d) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$d['nama_alumni']}</td>
                <td>{$d['jurusan']}</td>
                <td>{$d['tahun_lulus']}</td>
                <td>{$d['nama_instansi']}</td>
                <td>{$d['alamat_instansi']}</td>
                <td>{$d['sektor_perusahaan']}</td>
                <td>{$d['no_telepon_instansi']}</td>
                <td>{$d['nilai_gaji']}</td>
                <td>{$d['ket_umr']}</td>
                <td>{$d['waktu_tunggu_kerja']}</td>
                <td>{$d['instansi_pertama']}</td>
                <td>{$d['nilai_gaji_pertama']}</td>
                <td>{$d['ket_umr_gaji_pertama']}</td>
                <td>{$d['created_at']}</td>
                <td>{$d['updated_at']}</td>
            </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>