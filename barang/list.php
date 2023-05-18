<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Barang</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- Style CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Arial';
            font-weight: 500;
        }

        .container {
            margin-top: 50px;
        }

        .foto {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>

    <!-- Link JS -->
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    <a href="list.php" class="btn btn-warning mb-4">Master Barang</a>
        <a href="../penjualan/list.php" class="btn btn-primary mb-4">Penjualan</a>

    <br>
        <h2 class="text-center mb-5">List Data Barang</h2>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "insert"){
                    echo "
                    <script>
                    alert('Barang Berhasil di Tambah')
                    </script>
                  ";
                }elseif ($_GET['pesan'] == "update") {
                    echo "
                    <script>
                    alert('Barang Berhasil di Update')
                    </script>
                  ";
                }
                elseif ($_GET['pesan'] == "delete") {
                    echo "
                    <script>
                    alert('Barang Berhasil di Hapus')
                    </script>
                  ";
                }
            }
	    ?>

        <br>
        <a href="create.php" class="btn btn-primary mb-4">Tambah Barang</a>

        <table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama Barang</th>
			<th>Satuan </th>
			<th>Kategori</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Aksi</th>
		</tr>
		
</thead>
<tbody>
		<?php 
		include '../koneksi.php';
		include '../rupiah.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select m_barang.*, m_satuan.satuan, m_kategori.kategori from m_barang 
			left join m_satuan ON m_barang.id_satuan=m_satuan.id 
			left join m_kategori ON m_barang.id_kategori=m_kategori.id");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kd_barang']; ?></td>
				<td><?php echo $d['nm_barang']; ?></td>
				<td><?php echo $d['satuan']; ?></td>
				<td><?php echo $d['kategori']; ?></td>
				<td><?php echo rupiah($d['harga_beli']); ?></td>
				<td><?php echo rupiah($d['harga_jual']); ?></td>
				<td>
                        <a href="update.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white mb-2">Edit</a>
                        <a href="proses.php?act=delete&id=<?php echo $d['id']; ?>" class="btn btn-danger mb-2">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</body>

</html>