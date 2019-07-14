<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h3 class="title1">Data Majelis</h3>
			<div class="panel-body widget-shadow">
				<h4>Basic Table:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Majelis Taklim</th>
							<th>Jenis Kelamin</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($users as $u ) { ?>
							<tr>
								<th scope="row"><?php echo $no++; ?></th>
								<td><?php echo $u->nama; ?></td>
								<td><?php echo $u->alamat; ?></td>
								<td><?php echo $u->nama_majelis; ?></td>
								<td><?php echo $u->jenis_kelamin; ?></td>
								
								<td>
									<a class="btn btn-info" href="">Detail</a>
									<!-- <a class="btn btn-info" href="">Edit</a> -->
									<a class="btn btn-danger" href="">Block</a>
								</td>
							</tr>

						<?php } ?>


					</tbody>
					<tfoot>
						<a class="btn btn-success" href="">Tambah Baru</a>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>