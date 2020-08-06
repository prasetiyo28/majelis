
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">
	<!-- <body> -->
		<center>
			<h1>Data Infaq <?echo $bulan_tahun?></h1>
			<h2>Kategori <?echo $kategori?></h2>
			<table width="80%" class="table" style="border-color: black" border="1">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Majelis</th>
						<th>Total Infaq</th>

					</tr>
				</thead>
				<tbody>

					<?php $no=1;  foreach ($infaq as $m) {  ?>
						<tr>
							<th scope="row"><?php echo $no++; ?></th>
							<td><?php echo $m->nama_majelis; ?></td>
							<td><?php echo $m->total; ?></td>

						</td>
					</tr>
				<?php } ?>


			</tbody>

		</table>

	</center>
</body>
</html>
