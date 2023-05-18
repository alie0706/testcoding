<?php 
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>

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
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Tambah Data Barang
            </div>
            <div class="card-body">
                <form method="post" action="proses.php?act=input" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kd_barang">Kode :</label>
                        <input type="text" name="kd_barang" class="form-control" id="kd_barang" placeholder="kode Barang" required>
                    </div>
					<div class="form-group">
                        <label for="nm_barang">Nama Barang :</label>
                        <input type="text" name="nm_barang" class="form-control" id="nm_barang" placeholder="Nama Barang" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Satuan :</label>
                        <select class="form-control" name="id_satuan" id="exampleFormControlSelect1">
                            <option value="0">Pilih Satuan</option>
							<?php
							$data = mysqli_query($koneksi,"select * from m_satuan");
								while($r = mysqli_fetch_array($data)){?>
								<option value="<?php echo $r['id']?>"><?php echo $r['satuan'];?></option>
								<?php
								}
								?>
                        </select>
                    </div>
					<div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori :</label>
                        <select class="form-control" name="id_kategori" id="exampleFormControlSelect1">
                            <option value="0">Pilih Kategori</option>
							<?php
							$data = mysqli_query($koneksi,"select * from m_kategori");
								while($r = mysqli_fetch_array($data)){?>
								<option value="<?php echo $r['id']?>"><?php echo $r['kategori'];?></option>
								<?php
								}
								?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli :</label>
                        <input type="text" name="harga_beli" class="form-control" id="harga_beli" placeholder="Harga Beli" required>
                    </div>
					<div class="form-group">
                        <label for="harga_jual">Harga Jual :</label>
                        <input type="text" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Jual" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>

</html>