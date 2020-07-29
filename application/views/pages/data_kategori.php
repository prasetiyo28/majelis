<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h3 class="title1">Data Kategori</h3>
			<div class="panel-body widget-shadow">
				<h4>Data Kategori:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Kategori</th>
							<th>Action</th>
							<!-- <th>Firebase Token</th> -->
							
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($kategori as $u ) { ?>
							<tr>
								<th scope="row"><?php echo $no++; ?></th>
								<td><?php echo $u->kategori; ?></td>
								<td>
								<a class="btn btn-info" 
									href="javascript:;"
									data-id="<?php echo $u->id_kategori; ?>" 
									data-kategori="<?php echo $u->kategori; ?>"
									data-toggle="modal" data-target="#edit-data">Edit Data</a>
									<a class="btn btn-danger" href="<?php echo base_url() ?>admin/hapus_kategori/<?php echo $u->id_kategori ?>">Hapus</a></td>
								
								
							<!-- 	<td>
									<a class="btn btn-info" href="">Detail</a>
									<a class="btn btn-info" href="">Edit</a>
									<a class="btn btn-danger" href="">Block</a>
								</td> -->
							</tr>

						<?php } ?>


					</tbody>
					<tfoot>
						<button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">Buat Baru</button>
					</tfoot>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>Admin/save_kategori' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Kategori</label>
						<input required="required" id="inputText3" name="kategori" type="text" class="form-control" placeholder="Kategori...">

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
				<form action='<?php echo base_url() ?>Admin/update_kategori' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Majelis</label>
						<input type="hidden" name="id" id="id">
						<input required="required" id="kategori" name="kategori" type="text" class="form-control" placeholder="Kategori...">

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
        
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#kategori').attr("value",div.data('kategori'));
          
            
        });
    });
</script>


<?php if ($this->session->userdata('alert') == 'gagal') { ?>
		<script>
			alert('Data Kategori tidak dapat dihapus , karena sudah digunakan');
		</script>
<?php	} ?>