<?php
function totalPendapatan($conn){
    $q = mysqli_query($conn,"
        SELECT SUM(Total) 
        FROM t_transaksi_jual
        WHERE status_byr='LUNAS'
    ");
    return mysqli_fetch_row($q)[0] ?? 0;
}

function pendapatanHariIni($conn){
    $q = mysqli_query($conn,"
        SELECT SUM(Total)
        FROM t_transaksi_jual
        WHERE DATE(Tanggal)=CURDATE()
        AND status_byr='LUNAS'
    ");
    return mysqli_fetch_row($q)[0] ?? 0;
}

function piutang($conn){
    $q = mysqli_query($conn,"
        SELECT SUM(Total-IFNULL(uang_titipan,0))
        FROM t_transaksi_jual
        WHERE status_byr='BELUM'
    ");
    return mysqli_fetch_row($q)[0] ?? 0;
}

function totalTransaksiMTD($conn){
    $q = mysqli_query($conn,"
        SELECT IFNULL(SUM(Total),0)
        FROM t_transaksi_jual
        WHERE Tanggal >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
          AND Tanggal <= CURDATE()
    ");
    return mysqli_fetch_row($q)[0];
}
?>