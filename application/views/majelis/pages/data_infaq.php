<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h3 class="title1">Data Infaq</h3>
			<div class="panel-body widget-shadow">
				<table class="table table-striped">
					<tr>
						<td>Jumlah Infaq Saat Ini</td>
						<td>:</td>
						<td>Rp. <input type="text" class="form-control" readonly name="nama" value="<?php echo $majelis->infaq ?>"></td>
					</tr>



				</table>

				<table class="table table-striped">
				<thead>
					<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Jumlah</td>
						<td>Tanggal</td>
						<td>Hapus</td>
					
					</tr>
					</thead>

					<?php $no=1; foreach ($infaq as $row) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row->nama; ?></td>
						<td><?php echo $row->infaq; ?></td>
						<td><?php echo $row->tanggal; ?></td>
						<td><?php echo $row->tanggal; ?></td>
						<td><a class="btn btn-danger" href="<?php echo base_url() ?>Majelis/hapus_infaq/<?php echo $row->id_infaq ?>">hapus</a></td>
					</tr>
					

					<?php }?>
				

				</table>
				<!-- <a class="btn btn-warning" 
				href="javascript:;"
				data-infaq="<?php echo $majelis->infaq; ?>" 
				data-toggle="modal" data-target="#edit-data">Edit Data</a> -->

				<tfoot>
						<button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">Tambah Infaq</button>
					</tfoot>

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
				<form action='<?php echo base_url() ?>majelis/save_infaq' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama</label>
						<input required="required" id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Donatur...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Jumlah</label>
						<input required="required" id="inputText3" name="jumlah" type="number" class="form-control" placeholder="Jumlah...">

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


<!-- Modal Ubah -->
<!-- <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Saldo Infaq saat ini</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>majelis/update_infaq' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Saldo Infaq</label>
						<input required="required" id="infaq" id="inputText3" name="infaq" type="number" class="form-control" placeholder="infaq">

					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
					<input type="submit" value="Ubah" class="btn btn-success">
				</div>


			</form>
		</div>
	</div>
</div> -->

<!-- <script>
	$(document).ready(function() {
        // Untuk sunting


        

        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field

            modal.find('#infaq').attr("value",div.data('infaq'));

            
        });
    });
</script> -->