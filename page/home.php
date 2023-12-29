<?php
$kamarKosong = $connection->query("SELECT kamar.*, pemilik.nama, pemilik.alamat, pemilik.telepon 
										FROM kamar 
										LEFT JOIN pemilik ON kamar.id_pemilik = pemilik.id_pemilik
										
	");
?>

<div id="map" style="width:100%; height:500px">
	<iframe src="https://www.google.com/maps?q=cikarang utara&output=embed" width="100%" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="container">
	<div class="row" style="padding-top: 40px;">
		<h2>Kamar Kosong</h2>
		<hr>
		<?php $i=1; while ($row = $kamarKosong->fetch_assoc()) { ?>
			<div class="col-md-3">
				<div class="card" style="width: 18rem;padding-top:15px">
					<img class="card-img-top" src="<?php echo ('assets/img/kost/') . $row['foto'] ?>" style="height:286" height="186" width="180" alt="Card image cap">
					<div class="card-body">
						<b class="card-title" style="text-transform: uppercase;"><?php echo $row['nama'] ?></b>

						<p class="card-text"><?php echo $row['deskripsi'] ?></p>
						<?php if($row['status'] == 0) { ?>
							<p><b>Sudah Terisi</b></p>
						<?php } else { ?>
						<p class="card-text"><b>Kamar Kosong : <?php echo $row['nomor_kamar'] ?></b></p>
						<?php } ?>
						<a class="btn btn-success" href="https://wa.me/<?= $row['telepon'] ?>" target="_blank">WHATSAPP</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<hr>
	<h2>Cari kost!</h2>
	<!-- search -->
	<div class="row">
		<form action="<?= $_SERVER["REQUEST_URI"] ?>">
			<input type="hidden" name="searched" value="true">
			<div class="col-md-5">
				<label for="nama" class="control-label">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control">
			</div>
			<div class="col-md-3">
				<label for="status" class="control-label">Status</label>
				<select class="form-control" name="status" id="status">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="">Harga</label>
				<div class="input-group">
					<span class="input-group-addon" style="border-right: 0;">Min</span>
					<input type="number" name="min" id="min" class="form-control" value="0">
					<span class="input-group-addon" style="border-left: 0; border-right: 0;">Max</span>
					<input type="number" name="max" id="max" class="form-control" value="0">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary" id="submit">Cari...</button>
					</span>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<!-- /search -->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Harga/3bln</th>
						<th>Harga/6bln</th>
						<th>Harga/tahun</th>
						<th>Status</th>
						<th>Kamar Tersedia</th>
						<th>Pemilik Kost</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_GET["searched"])) {
						if ($_GET["searched"] == "click") {
							$query = $connection->query("SELECT kost.*, pemilik.nama as nama_pemilik, pemilik.telepon
															FROM kost
															LEFT JOIN pemilik ON kost.id_pemilik = pemilik.id_pemilik
															WHERE kost.id_kost=$_GET[key]");
						} else {
							$query = $connection->query("SELECT kost.*, pemilik.nama as nama_pemilik, pemilik.telepon
															FROM kost
															LEFT JOIN pemilik ON kost.id_pemilik = pemilik.id_pemilik 
															WHERE kost.nama LIKE '%$_GET[nama]%' AND  status='$_GET[status]' AND  (kost.`harga_pertahun` BETWEEN $_GET[min] AND $_GET[max])");
						}
					} else {
						$query = $connection->query("SELECT kost.*, pemilik.nama as nama_pemilik, pemilik.telepon
														FROM kost
														LEFT JOIN pemilik ON kost.id_pemilik = pemilik.id_pemilik 
														ORDER BY harga_3bulan, harga_6bulan, harga_pertahun");
					}
					$no = 1;
					?>
					<?php while ($row = $query->fetch_assoc()) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $row["nama"] ?></td>
							<td>Rp. <?= number_format($row['harga_3bulan'], 0, ",", ".") ?>,-</td>
							<td>Rp. <?= number_format($row['harga_6bulan'], 0, ",", ".") ?>,-</td>
							<td>Rp. <?= number_format($row['harga_pertahun'], 0, ",", ".") ?>,-</td>
							<td><span class="label label-<?= ($row["status"] == "Perempuan") ? "info" : "primary" ?>"><?= $row["status"] ?></span></td>
							<td><?= $row["tersedia"] ?></td>
							<!-- <td><a href="?searched=click&key=<?= $row["id_kost"] ?>" class="btn btn-success btn-xs">Lihat maps</a></td> -->
							<td><?= $row['nama_pemilik'] ?> <a class="label label-success" href="https://wa.me/<?= $row['telepon'] ?>" target="_blank">Hubungi</a></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>