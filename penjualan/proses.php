<?php
session_start();
include '../koneksi.php';

$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$harga_satuan = $_POST['harga_satuan'];
$total_harga = $_POST['total_harga'];
$act = $_GET['act'];


if($act=='input'){
    
$no_faktur = $_POST['no_faktur'];
$tgl_faktur = $_POST['tgl_faktur'];
$nm_konsumen = $_POST['nm_konsumen'];
mysqli_query($koneksi, "INSERT INTO tr_penjualan(no_faktur,tgl_faktur,nm_konsumen)
                            VALUES('$no_faktur' , '$tgl_faktur' , '$nm_konsumen')");

$id_penjualan=mysqli_insert_id($koneksi);
$sid = session_id(); 
    mysqli_query($koneksi, "UPDATE tr_penjualan_detail SET id_penjualan = '$id_penjualan', session_id=''
                        WHERE session_id = '$sid'");                           
header("location:list.php?pesan=insert");
}
elseif($act=='inputdetail'){
    $sid = session_id(); 
    mysqli_query($koneksi, "INSERT INTO tr_penjualan_detail (id_barang, jumlah, harga_satuan, total_harga, session_id) 
                        VALUES('$id_barang' , '$jumlah' , '$harga_satuan' , '$total_harga', '$sid')");
    header("location:create.php?pesan=insert");
    }
elseif($act=='update'){    
$id = $_POST['id'];
    mysqli_query($koneksi, "UPDATE tr_penjualan_detail SET id_barang = '$id_barang',
                                                jumlah = '$jumlah',
                                                harga_satuan = '$harga_satuan',
                                                total_harga = '$total_harga'
                                        WHERE id = '$id'");
header("location:create.php?pesan=update");
}
elseif($act=='deletedetail'){   
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM tr_penjualan_detail WHERE id='$id'");
    
    header("location:create.php?pesan=delete");
}

elseif($act=='updatePenjualan'){    
    $id = $_POST['id'];
    $id_penjualan = $_POST['id_penjualan'];
        mysqli_query($koneksi, "UPDATE tr_penjualan_detail SET id_barang = '$id_barang',
                                                    jumlah = '$jumlah',
                                                    harga_satuan = '$harga_satuan',
                                                    total_harga = '$total_harga'
                                            WHERE id = '$id'");
    header("location:updateDetail.php?id=".$id_penjualan);
    }
elseif($act=='updateDetail'){
    $id = $_POST['id'];
    $no_faktur = $_POST['no_faktur'];
    $tgl_faktur = $_POST['tgl_faktur'];
    $nm_konsumen = $_POST['nm_konsumen'];
        mysqli_query($koneksi, "UPDATE tr_penjualan SET no_faktur = '$no_faktur',
                                    tgl_faktur = '$tgl_faktur',
                                    nm_konsumen = '$nm_konsumen'
                                WHERE id = '$id'");
        
        // $id_penjualan=mysqli_insert_id($koneksi);
        $sid = session_id(); 
            mysqli_query($koneksi, "UPDATE tr_penjualan_detail SET id_penjualan = '$id'
                                WHERE session_id = '$sid'");                           
        header("location:list.php?pesan=update");
        }
elseif($act=='deleteall'){   
            $id = $_GET['id'];
        
            mysqli_query($koneksi, "DELETE FROM tr_penjualan WHERE id='$id'");
            mysqli_query($koneksi, "DELETE FROM tr_penjualan_detail WHERE id_penjualan='$id'");
            
            header("location:list.php?pesan=delete");
        }
?>