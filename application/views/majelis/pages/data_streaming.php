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
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Link</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($streaming as $k ) { ?>
							<tr>
								<th scope="row"><?php echo $no++; ?></th>
								<td><?php echo $k->judul; ?></td>
								<td><?php echo $k->deskripsi; ?></td>
								<td><?php echo $k->link; ?></td>
								
								
								<td>
									<a class="btn btn-info" href="<?php echo base_url() ?>Majelis/selesai/<?php echo $k->id_streaming ?>">Selesai</a>
								</td>
							</tr>

						<?php } ?>


					</tbody>
					<tfoot>
						<button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">Streaming</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Streaming</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>majelis/save_streaming' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Judul</label>
						<input required="required" id="inputText3" name="judul" type="text" class="form-control" placeholder="Judul Streaming...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Deskripsi</label>
						<input required="required" id="inputText3" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Link</label>
						<input required="required" id="inputText3" placeholder="Link..." name="link" type="text" class="form-control">

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