<?php

$conn = mysqli_connect("localhost", "root", "", "toko");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
