<form action="<?php echo site_url('/pegawai/') ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id_pegawai" value="<?php echo $data[0]->id_pegawai;?>">
		<div class="row">
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="nama_pegawai" value="<?php echo $data[0]->nama_pegawai;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Nama Pegawai</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="email" value="<?php echo $data[0]->email;?>" autocomplete="off" id="inputFloatingLabel2" type="email" class="form-control input-solid" size="20" required>
            <label for="inputFloatingLabel2" class="placeholder">Email</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="jabatan" value="<?php echo $data[0]->jabatan;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Jabatan</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="no_telp" value="<?php echo $data[0]->no_telp;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Telp</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <textarea name="alamat" autocomplete="off" class="form-control input-solid" id="inputFloatingLabel2" rows="5"><?php echo $data[0]->alamat;?></textarea>
            <label for="inputFloatingLabel2" class="placeholder">Alamat</label>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group form-floating-label">
            <input name="username" value="<?php echo $data[0]->username;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Username</label>
          </div>
      </div>
      <div class="col-sm-6">
          <div class="form-group form-floating-label">
            <input name="password_old" value="<?php echo $data[0]->password;?>" autocomplete="off" id="inputFloatingLabel2" type="hidden" class="form-control input-solid" required>
            <input name="password" value="<?php echo $data[0]->password;?>" autocomplete="off" id="inputFloatingLabel2" type="password" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Password</label>
          </div>
      </div>
    </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>