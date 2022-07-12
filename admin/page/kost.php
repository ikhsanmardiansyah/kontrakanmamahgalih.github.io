<div class="container">
	<div class="page-header">
		<h2>Daftar <small>kost_mamahgalih!</small></h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div style="width:100%; height:300px">
			<iframe
	src="https://www.google.com/maps?q=cikarang utara&output=embed" width="100%"
	height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
		    <div class="panel panel-info">
		        <div class="panel-heading"><h3 class="text-center">DAFTAR</h3></div>
		        <div class="panel-body">
		            <table class="table table-condensed">
		                <thead>
		                    <tr>
		                        <th>No</th>
								<th>Nama</th>
		                        <th>Nomor Kamar</th>
								<th>Fasilitas</th>
		                        <th>Harga/3bln</th>
		                        <th>Harga/6bln</th>
		                        <th>Harga Pertahun</th>
								<th>Pemilik Kost</th>
		                        <th></th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php $no = 1; ?>
		                    <?php if ($query = $connection->query("SELECT kost.*, pemilik.nama as nama_pemilik, pemilik.telepon as telepon_pemilik FROM kost LEFT JOIN pemilik ON kost.id_pemilik = pemilik.id_pemilik")): ?>
		                        <?php while($row = $query->fetch_assoc()): ?>
		                        <tr>
		                            <td><?=$no++?></td>
		                            <td><?=$row['nama']?></td>
		                            <td><?=$row['tersedia']?></td>
									<td><?=$row['fasilitas']?></td>
		                            <td><?=number_format($row['harga_3bulan'],0,",",".")?></td>
		                            <td><?=number_format($row['harga_6bulan'],0,",",".")?></td>
		                            <td><?=number_format($row['harga_pertahun'],0,",",".")?></td>
									<td><?=$row['nama_pemilik']?> <a class="label label-success" href="https://wa.me/<?=$row['telepon_pemilik']?>" target="_blank">Hubungi</a></td>
		                            <td>
									<!-- <a href="?page=kost&action=detail&key=<?=$row['id_kost']?>" class="btn btn-info btn-xs">Detail</a> -->
		                            </td>
		                        </tr>
		                        <?php endwhile ?>
		                    <?php endif ?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
</div>
