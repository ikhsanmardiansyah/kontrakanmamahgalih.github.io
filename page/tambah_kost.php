<?php

if (!isset($_SESSION["is_logged"])) {
    echo alert("Harus login dulu!", "?page=home");
}

$err = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $x = explode('.', $_FILES['file']['name']);
    $file_name = $_SESSION["id"].date("dmYHis").".".strtolower(end($x));
    if (!@move_uploaded_file($_FILES['file']['tmp_name'], "assets/img/kost/" . $file_name)) {
        echo alert("Upload File Gagal!", "?page=tambah_kost");
        $err = true;
    }else{
		$sql = "INSERT INTO kamar VALUES (NULL, '$_SESSION[id]', '$_POST[kamar_kosong]', '$_POST[deskripsi]', '$file_name', 1)";
        if($connection->query($sql)) {

            echo alert("Data berhasil ditambah", "?page=tambah_kost");
        }

    }
    @unlink("assets/img/kost/" . $row["file"]);
}
?>

<div class="container">
    <div id="container"></div>
    <div class="page-header">
        <!-- <?php if ($update) : ?> -->
        <h2>Tambah <small>data kamar kosong!</small></h2>
        <!-- <?php else : ?>
			<h2>Daftar <small>sebagai pemilik kost!</small></h2>
		<?php endif; ?> -->
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="file" class="form-control" autofocus="on">
            </div>
            <div class="form-group">
                <label for="kamar_kosong">Kamar Kosong</label>
                <select name="kamar_kosong" title="Pilih Kamar Kosong" id="daftar_kamar_kosong" class="form-control selectpicker" placeholder="Pilih Kamar...">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="3" rows="3" class="form-control"></textarea>
            </div>
            <!-- <div class="row">
							<div class="col-md-10">
								<button type="submit" class="btn btn-warning btn-block">Update</button>
							</div>
							<div class="col-md-2">
								<a href="?page=kriteria" class="btn btn-default btn-block">Batal</a>
							</div>
					</div> -->
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<script>
    $('select').selectpicker();
</script>