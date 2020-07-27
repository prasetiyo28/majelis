<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h3 class="title1">Data Majelis</h3>
			<div class="panel-body widget-shadow">
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
									<a class="btn btn-danger" href="<?php echo base_url() ?>Majelis/hapus_kegiatan/<?php echo $k->id ?>">Delete</a>
								
								<a class="btn btn-info" 
				href="javascript:;"
				data-id="<?php echo $k->id; ?>" 
				data-nama="<?php echo $k->nama_kegiatan; ?>" 
				data-tempat="<?php echo $k->tempat; ?>"
				data-tanggal="<?php echo $k->tanggal; ?>"
				data-toggle="modal" data-target="#edit-data">Edit Data</a>
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


<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ubah</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>Majelis/update_kegiatan' method="POST" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Kegiatan</label>
						<input type="hidden" name="id" id="id">
						<input required="required" id="nama" id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Kegiatan...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Tempat</label>
						<input required="required" id="tempat"  name="tempat" type="text" class="form-control" placeholder="Tempat Kegiatan...">

					</div>



					<div class="form-group">
						<label for="inputText3" class="col-form-label">tanggal</label>
						<input type="date" id="tanggal" min="<?php echo date("yy-m-d")?>" name="tanggal"  class="form-control" placeholder="Tanggal Kegiatan...">
					</div>








				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
					<input type="submit" value="Ubah" class="btn btn-success">
				</div>


			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
        // Untuk sunting

        

        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#tempat').attr("value",div.data('tempat'));
            modal.find('#tanggal').attr("value",div.data('tanggal'));
          
            
        });
    });
</script>