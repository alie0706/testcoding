<?php

include '../koneksi.php';

$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$id_satuan = $_POST['id_satuan'];
$id_kategori = $_POST['id_kategori'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$act = $_GET['act'];

if($act=='input'){
mysqli_query($koneksi, "INSERT INTO m_barang VALUES('', '$kd_barang' , '$nm_barang' , '$id_satuan' , '$id_kategori' , '$harga_beli' , '$harga_jual')");
header("location:list.php?pesan=insert");
}
elseif($act=='update'){    
$id = $_POST['id'];
    mysqli_query($koneksi, "UPDATE m_barang SET kd_barang = '$kd_barang',
                                                nm_barang = '$nm_barang',
                                                id_satuan = '$id_satuan',
                                                id_kategori = '$id_kategori',
                                                harga_beli = '$harga_beli',
                                                harga_jual = '$harga_jual'
                                        WHERE id = '$id'");
header("location:list.php?pesan=update");
}
elseif($act=='delete'){   
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM m_barang WHERE id='$id'");
    
    header("location:list.php?pesan=delete");
}


?>