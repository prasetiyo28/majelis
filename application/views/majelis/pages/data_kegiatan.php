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
							<th>Nama Kegiatan</th>
							<th>Tempat</th>
							<th>Tanggal</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($kegiatan as $k ) { ?>
							<tr>
								<th scope="row"><?php echo $no++; ?></th>
								<td><?php echo $k->nama_kegiatan; ?></td>
								<td><?php echo $k->tempat; ?></td>
								<td><?php echo $k->tanggal; ?></td>

								
								<td>
									<!-- <a class="btn btn-info" href="">Detail</a> -->
									<!-- <a class="btn btn-info" href="">Edit</a> -->
									<a class="btn btn-danger" href="">Delete</a>
								</td>
								<td>
									<!-- <a class="btn btn-info" href="">Detail</a> -->
									<!-- <a class="btn btn-info" href="">Edit</a> -->
									<a class="btn btn-success" href="">edit</a>
								</td>
							</tr>

						<?php } ?>


					</tbody>
					<tfoot>
						<button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">Tambah Kegiatan</button>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>majelis/save_kegiatan' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Kegiatan</label>
						<input required="required" id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Kegiatan...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Tempat</label>
						<input required="required" id="inputText3" name="tempat" type="text" class="form-control" placeholder="Tempat...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Tanggal</label>
						<input required="required" id="inputText3" name="tanggal" type="date" min="<?php echo date("yy-m-d")?>" class="form-control">

					</div>






				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
					<input type="submit" value="Simpan" class="btn btn-success">
				</div>


			</form>
		</div>
	</div>
</div>