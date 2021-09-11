<form action="<?php echo site_url('/supplier/') ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id_supplier" value="<?php echo $data[0]->id_supplier;?>">
		<div class="row">
			<div class="col-sm-12">
					<div class="form-group form-floating-label">
						<input name="nama_supplier" value="<?php echo $data[0]->nama_supplier;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
						<label for="inputFloatingLabel2" class="placeholder">supplier</label>
					</div>
			</div>
			<div class="col-sm-12">
					<div class="form-group form-floating-label">
						<input name="no_telp" value="<?php echo $data[0]->no_telp;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
						<label for="inputFloatingLabel2" class="placeholder">No Telp</label>
					</div>
			</div>
			<div class="col-sm-12">
					<div class="form-group form-floating-label">
						<input name="kota" value="<?php echo $data[0]->kota;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
						<label for="inputFloatingLabel2" class="placeholder">Kota</label>
					</div>
			</div>
			<div class="col-sm-12">
					<div class="form-group form-floating-label">
						<textarea name="alamat" class="form-control input-solid" id="inputFloatingLabel2" rows="5"><?php echo $data[0]->alamat;?></textarea>
						<label for="inputFloatingLabel2" class="placeholder">Alamat</label>
					</div>
			</div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>