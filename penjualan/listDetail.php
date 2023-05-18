<?php 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Penjualan</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
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
    
</head>

<body>
    <div class="container">
        <div class="card">
        
        <table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total Harga</th>
		</tr>
		
</thead>
<tbody>
		<?php 
		include '../koneksi.php';
		include '../rupiah.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select tr_penjualan_detail.*, m_barang.kd_barang, 
        m_barang.nm_barang,m_barang.id_satuan,m_barang.id_kategori,
        m_satuan.satuan, m_kategori.kategori from tr_penjualan_detail 
			left join m_barang ON tr_penjualan_detail.id_barang=m_barang.id 
			left join m_satuan ON m_barang.id_satuan=m_satuan.id 
			left join m_kategori ON m_barang.id_kategori=m_kategori.id
            WHERE tr_penjualan_detail.id_penjualan='$_GET[id]'");
        // $data = mysqli_query($koneksi,"select tr_penjualan.* FROM tr_penjualan");
		
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kd_barang']; ?></td>
				<td><?php echo $d['nm_barang']; ?></td>
				<td><?php echo $d['jumlah']; ?></td>
				<td><?php echo rupiah($d['harga_satuan']); ?></td>
				<td><?php echo rupiah($d['total_harga']); ?></td>
				
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="card-header text-center font-weight-bold">
                List Data Penjualan
            </div>
            <?php
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"select * from tr_penjualan where id='$id'");
            $d = mysqli_fetch_array($data);
            ?>
            <div class="card-body">
                   
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <div class="form-group">
                        <label for="kd_barang">No Faktur :</label>
                        <input type="text" name="no_faktur" value="<?php echo $d['no_faktur'];?>" readonly class="form-control" id="no_faktur" placeholder="No Faktur" required>
                    </div>
					<div class="form-group">
                        <label for="kd_barang">Tanggal Faktur :</label>
                        <input type="date" name="tgl_faktur" value="<?php echo $d['tgl_faktur'];?>" readonly  class="form-control" id="tgl_faktur" placeholder="Tgl Faktur" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="kd_barang">Nama Konsumen :</label>
                        <input type="text" name="nm_konsumen" value="<?php echo $d['nm_konsumen'];?>" readonly  class="form-control" id="nm_konsumen" placeholder="Nama Konsumen" required>
                    </div>
                    
                    <br>

                </form>
            </div>
        </div>
    </div>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penjualan
				</div>
				<div class="modal-body">				
					<form id="formD" name="formD" action="proses.php?act=inputdetail" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Barang :</label>
                        <select class="form-control" name="id_barang" id="exampleFormControlSelect1">
                            <option value="0">Pilih Barang</option>
							<?php
							$data = mysqli_query($koneksi,"select * from m_barang");
								while($r = mysqli_fetch_array($data)){?>
								<option value="<?php echo $r['id']?>"><?php echo $r['kd_barang'];?> | <?php echo $r['nm_barang'];?></option>
								<?php
								}
								?>
                        </select>
                    </div>						
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input name="harga_satuan" type="text" class="form-control" placeholder="Harga" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
						</div>																	
                        <div class="form-group">
							<label>Total Harga</label>
							<input name="total_harga" type="text" class="form-control" value="0" id="total_harga" autocomplete="off">
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

   
    <script type="text/javascript">
        $(document).on("click", ".browse", function () {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

            hargasatuan = document.formD.harga_satuan.value;
                          document.formD.total_harga.value = hargasatuan;
            jumlah = document.formD.jumlah.value;
            document.formD.total_harga.value = jumlah;
            function OnChange(value){
                hargasatuan = document.formD.harga_satuan.value;
                jumlah = document.formD.jumlah.value;
                total = hargasatuan * jumlah;
                document.formD.total_harga.value = total;
            }
</script>
</body>

</html>