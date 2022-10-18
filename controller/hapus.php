<?php 
// koneksi database
include '../config/db.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$sql = "DELETE FROM novels where id=$id";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);
 
// mengalihkan halaman kembali ke index.php
header("location:../novels.php");
 
?>
