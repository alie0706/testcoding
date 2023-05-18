<?php 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Penjualan Detail</title>

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

        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>

    <!-- Link JS -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <?php
            include '../koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"select * from tr_penjualan_detail where id='$id'");
            $d = mysqli_fetch_array($data);
        ?>

        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Penjualan Detail
            </div>
            <div class="card-body">
                <form id="formD" name="formD" action="proses.php?act=updatePenjualan" method="post">
                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                        <input type="hidden" name="id_penjualan" value="<?php echo $d['id_penjualan'] ?>">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Barang :</label>
                        <select class="form-control" name="id_barang" id="exampleFormControlSelect1">
                            <option value="0">Pilih Barang</option>
							<?php
							$data = mysqli_query($koneksi,"select * from m_barang");
								while($r = mysqli_fetch_array($data)){
                                    if($r['id']==$d['id_barang']){?>
                                    <option value="<?php echo $r['id']?>" selected><?php echo $r['kd_barang'];?>  | <?php echo $r['nm_barang'];?></option>
                                        <?php
                                    }
                                    else{?>
                                        <option value="<?php echo $r['id']?>"><?php echo $r['kd_barang'];?> | <?php echo $r['nm_barang'];?></option>
                                            <?php
                                    }
                                }
                                    ?>
                        </select>
                    </div>		
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga_satuan" type="text" class="form-control" value="<?php echo $d['harga_satuan'];?>" placeholder="Harga" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" value="<?php echo $d['jumlah'];?>" placeholder="Jumlah" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
						</div>																	
                        <div class="form-group">
							<label>Total Harga</label>
							<input name="total_harga" type="text" class="form-control" value="<?php echo $d['total_harga'];?>" autocomplete="off">
						</div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">												
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
            </div>
        </div>
       
    </div>

    <script>
      
        hargasatuan = document.formD.harga_satuan.value;
            jumlah = document.formD.jumlah.value;
            function OnChange(value){
                hargasatuan = document.formD.harga_satuan.value;
                jumlah = document.formD.jumlah.value;
                total = hargasatuan * jumlah;
                document.formD.total_harga.value = total;
            }
    </script>
</body>

</html>