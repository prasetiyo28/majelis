<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h3 class="title1">Data Majelis</h3>
			<div class="panel-body widget-shadow">
				<h4>Basic Table:</h4>
				<table class="table table-striped">
					<tr>
						<td>Nama Majelis</td>
						<td>:</td>
						<td><input type="text" class="form-control" readonly name="nama" value="<?php echo $majelis->nama_majelis ?>"></td>
					</tr>
					<tr>
						<td>Nama Ketua</td>
						<td>:</td>
						<td><input class="form-control" type="text" readonly name="nama" value="<?php echo $majelis->ketua ?>"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><input class="form-control" type="text" readonly name="nama" value="<?php echo $majelis->alamat ?>"></td>
					</tr>
					<tr>
						<td>Kontak</td>
						<td>:</td>
						<td><input class="form-control" type="text" readonly name="nama" value="<?php echo $majelis->kontak ?>"></td>
					</tr>


				</table>
				<a class="btn btn-info" 
				href="javascript:;"
				data-nama="<?php echo $majelis->nama_majelis; ?>" 
				data-ketua="<?php echo $majelis->ketua; ?>"
				data-alamat="<?php echo $majelis->alamat; ?>"
				data-kontak="<?php echo $majelis->kontak; ?>"
				data-toggle="modal" data-target="#edit-data">Edit Data</a>

			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Majelis</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>Admin/save_majelis' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Majelis</label>
						<input required="required" id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Majelis...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Ketua Majelis</label>
						<input required="required" id="inputText3" name="ketua" type="text" class="form-control" placeholder="Ketua Majelis...">

					</div>


					<div class="form-group">
						<label for="inputText3" class="col-form-label">Kontak Majelis</label>
						<input required="required" id="inputText3" name="kontak" type="text" class="form-control" placeholder="Kontak Majelis...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Alamat Majelis</label>
						<textarea name="alamat" class="form-control" placeholder="Alamat Majelis..."></textarea>
					</div>


					<div class="form-group">
						<label for="inputText3" class="col-form-label">Kategori</label>
						<select required="required" class="form-control" name="kategori">
							<option value="" selected disabled>-Pilih Kategori-</option>
							<?php foreach ($kategori as $k) { ?>
								<option value="<?php echo $k->id_kategori ?>"><?php echo $k->kategori; ?></option>
							<?php } ?>
						</select>
					</div>



					<div class="form-group">
						<label for="inputText3" class="col-form-label">Logo Majelis</label>
						<p>*file yang diterima hanya berekstensi .jpg, .jpeg, .png</p>
						<input required="required" type="file" accept="image/jpg, image/jpeg, image/png" name="foto">
					</div>

					<script type="text/javascript">
						$(document).ready(function() {
							$('#summernote').summernote();
							$('#summernote2').summernote();
						});
					</script>




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
				<form action='<?php echo base_url() ?>majelis/update_majelis' method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama Majelis</label>
						<input type="hidden" name="id_majelis" id="id">
						<input required="required" id="nama" id="inputText3" name="nama" type="text" class="form-control" placeholder="Nama Majelis...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Ketua Majelis</label>
						<input required="required" id="ketua" id="inputText3" name="ketua" type="text" class="form-control" placeholder="Ketua Majelis...">

					</div>


					<div class="form-group">
						<label for="inputText3" class="col-form-label">Kontak Majelis</label>
						<input required="required" name="kontak" type="text" class="form-control" id="kontak" placeholder="Kontak Majelis...">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Alamat Majelis</label>
						<input type="text" id="alamat" name="alamat"  class="form-control" placeholder="Alamat Majelis...">
					</div>
					

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Password Lama</label>
						<input type="password" id="old" name="old"  class="form-control" placeholder="kosongkan password jika tidak diganti">
					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Password Baru</label>
						<input type="password" id="password" name="password"  class="form-control" placeholder="kosongkan password jika tidak diganti">
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

<?php if ($this->session->userdata('alert') == 'gagal') { ?>
		<script>
			alert('Password lama tidak sesuai , data gagal dirubah');
		</script>
<?php	} ?>

<script>
	$(document).ready(function() {
        // Untuk sunting

        

        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#ketua').attr("value",div.data('ketua'));
            modal.find('#alamat').attr("value",div.data('alamat'));
            modal.find('#kontak').attr("value",div.data('kontak'));

            
        });
    });
</script>