<div id="page-wrapper">
	<div class="main-page">
		<form action="<?php echo base_url() ?>Admin/cetak_laporan_infaq" method="POST">
		<div class="form-group">
						<label for="inputText3" class="col-form-label">Nama</label>
						<input required="required"  name="bulan" type="month" class="form-control">

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
					

					<button class="btn btn-info btn-block" type="submit">Cetak Laporan</button>
		</form>

	</div>
</div>