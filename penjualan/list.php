<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Penjualan</title>

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
    <a href="../barang/list.php" class="btn btn-warning mb-4">Master Barang</a>
    <a href="list.php" class="btn btn-warning mb-4">Master Penjualan</a>

    <br>
        <h2 class="text-center mb-5">List Data Penjualan</h2>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "insert"){
                    echo "
                    <script>
                    alert('Penjualan Berhasil di Tambah')
                    </script>
                  ";
                }elseif ($_GET['pesan'] == "update") {
                    echo "
                    <script>
                    alert('Penjualan Berhasil di Update')
                    </script>
                  ";
                }
                elseif ($_GET['pesan'] == "delete") {
                    echo "
                    <script>
                    alert('Penjualan Berhasil di Hapus')
                    </script>
                  ";
                }
            }
	    ?>

        <br>
        <a href="create.php" class="btn btn-primary mb-4">Tambah Penjualan</a>

        <table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>No Faktur</th>
			<th>Tanggal Faktur</th>
			<th>Nama Konsumen </th>
			<th>Aksi</th>
		</tr>
		
</thead>
<tbody>
		<?php 
		include '../koneksi.php';
		include '../rupiah.php';
		$no = 1;
		
        $data = mysqli_query($koneksi,"select tr_penjualan.* FROM tr_penjualan");
		
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['no_faktur']; ?></td>
				<td><?php echo $d['tgl_faktur']; ?></td>
				<td><?php echo $d['nm_konsumen']; ?></td>
				<td>
                        <a href="updateDetail.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white mb-2">Edit</a>
                        <a href="proses.php?act=deleteall&id=<?php echo $d['id']; ?>" class="btn btn-danger mb-2">Hapus</a>
                        <a href="listDetail.php?id=<?php echo $d['id']; ?>" class="btn btn-primary text-white mb-2">Detail</a>
                        
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