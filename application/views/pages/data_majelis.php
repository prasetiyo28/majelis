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
							<th>Nama Majelis</th>
							<th>Ketua</th>
							<th>Alamat</th>
							<th>Kontak</th>
							<th>Kategori</th>
							<th>Action</th>
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
								<td>
									<a class="btn btn-info" 
									href="javascript:;"
									data-id="<?php echo $m->id_majelis; ?>" 
									data-nama="<?php echo $m->nama_majelis; ?>" 
									data-ketua="<?php echo $m->ketua; ?>"
									data-alamat="<?php echo $m->alamat; ?>"
									data-kontak="<?php echo $m->kontak; ?>"
									data-kategori="<?php echo $m->kategori; ?>"
									data-toggle="modal" data-target="#edit-data">Edit Data</a>
									<!-- <a class="btn btn-info" href="">Edit</a> -->
									<a class="btn btn-danger" href="<?php echo base_url() ?>admin/hapus_majelis/<?php echo $m->id_majelis ?>">Deleted</a>
									<br>

									<?php if ($m->block == 1) { ?>
										<a href="<?php echo base_url() ?>admin/unblock/<?php echo $m->id_majelis ?>">Majelis telah diblock</a>
									<?php }else{ ?>
										<a class="btn btn-default" href="<?php echo base_url() ?>admin/block_majelis/<?php echo $m->id_majelis ?>">Block</a>
									<?php } ?>

									<a class="btn btn-default" href="<?php echo base_url() ?>admin/reset_password/<?php echo $m->id_majelis ?>">Reset Password</a>
									<br>
									
								</td>
							</tr>
						<?php } ?>


					</tbody>
					<tfoot>
						<button type="button" class="btn btn-success" href="#" data-toggle="modal" data-target="#exampleModal">Buat Baru</button>
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
						<input required="required" id="inputText3" name="kontak" type="tel" class="form-control" placeholder="Kontak Majelis...">

					</div>
					<div class="form-group">
						<label for="inputText3" class="col-form-label">Email Majelis</label>
						<input required="required" id="inputText3" name="email" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-control" placeholder="Email Majelis...">

					</div>

					<div class="form-group">
						<label class="col-form-label">Koordinat</label><br>
						<div class="col-sm-4">
							<div class="input-group">
								<input id="input-calendar" type="text" name="latitude" class="form-control"  placeholder="latitude">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							</div>
							
						</div>
						<div class="col-sm-4">
							<div class="input-group">
								<input id="input-calendar" type="text" name="longitude" class="form-control" placeholder="longitude">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							</div>
							
						</div>
						<div class="col-sm-12">
							
							<?php echo $map['html'] ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Alamat Majelis</label>
						<input type="text" id="alamat_a" name="alamat"  class="form-control alamat_a" placeholder="Alamat Majelis...">
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
				<form action='<?php echo base_url() ?>Admin/update_majelis' method="POST" enctype="multipart/form-data">

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
	function setMapToForm(latitude, longitude) 
	{
		
		
		var addressLoc = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&key=AIzaSyCz1LkOZmWBZRyC1WUJcrOqZiK-7yMuQXk';
		var city;
                let address = $.get(addressLoc, function(data){
    // console.log("address",data.results[0].formatted_address.split(','));
    var loc = data.results[0].formatted_address;
    var cari = loc.toLowerCase().search("tegal");
    

    if (cari > 1) {
		$('input[name="latitude"]').val(latitude);
		$('input[name="longitude"]').val(longitude);
		$("#alamat_a").val(loc);
		// console.log("address",loc);
	}else{
		alert("hanya dapat memilih di kabupaten/kota tegal");
		$('input[name="latitude"]').val('');
		$('input[name="longitude"]').val('');
	}
   
    
    return loc
                });
	}

	

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