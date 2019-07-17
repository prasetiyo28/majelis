
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">
	<!-- <body> -->
		<center>
			<h1>Data Majelis Tahun 2019</h1>
			<table width="80%" class="table" style="border-color: black" border="1">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Majelis</th>
						<th>Ketua</th>
						<th>Alamat</th>
						<th>Kontak</th>
						<th>Kategori</th>

					</tr>
				</thead>
				<tbody>

					<?php $no=1;  foreach ($majelis as $m) {  ?>
						<tr>
							<th scope="row"><?php echo $no++; ?></th>
							<td><?php echo $m->nama_majelis; ?></td>
							<td><?php echo $m->ketua; ?></td>
							<td><?php echo $m->alamat; ?></td>
							<td><?php echo $m->kontak; ?></td>
							<td><?php echo $m->kategori; ?></td>

						</td>
					</tr>
				<?php } ?>


			</tbody>

		</table>

	</center>
</body>
</html>
