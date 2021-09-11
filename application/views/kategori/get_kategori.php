<form action="<?php echo site_url('/kategori/') ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id_kategori" value="<?php echo $data[0]->id_kategori;?>">
		<div class="row">
    <div class="col-sm-12">
      <div class="form-group form-floating-label">
            <input name="nama_kategori" value="<?php echo $data[0]->nama_kategori;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Kategori</label>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>