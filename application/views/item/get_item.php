<form action="<?php echo site_url('/item/') ?>" method="POST">
	<div class="modal-body">
		<input type="hidden" name="id_item" value="<?php echo $data[0]->id_item;?>">
		<div class="row">
    <div class="col-sm-12">
      <div class="form-group form-floating-label">
            <input name="nama_item" value="<?php echo $data[0]->nama_item;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">item</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="kategori" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php 
                $this->db->select('*');
                $this->db->from('kategori');                            
                $query = $this->db->get();            
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_kategori;?>"<?php if($data[0]->kategori == $row->id_kategori){ echo 'selected'; }?>><?php echo $row->nama_kategori;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Kategori</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="ukuran" value="<?php echo $data[0]->ukuran;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Ukuran</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="warna" value="<?php echo $data[0]->warna;?>" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
            <label for="inputFloatingLabel2" class="placeholder">Warna</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <textarea name="deskripsi" autocomplete="off" class="form-control input-solid" id="inputFloatingLabel2" rows="5"><?php echo $data[0]->deskripsi;?></textarea>
            <label for="inputFloatingLabel2" class="placeholder">Deskripsi</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="harga_beli" value="<?php echo $data[0]->harga_beli;?>" autocomplete="off" id="inputFloatingLabel2" min="0" type="number" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Harga Beli</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input name="harga_jual" value="<?php echo $data[0]->harga_jual;?>" autocomplete="off" id="inputFloatingLabel2" min="0" type="number" class="form-control input-solid" required>
            <label for="inputFloatingLabel2" class="placeholder">Harga Jual</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="id_supplier" class="form-control input-solid" id="selectFloatingLabel2" required>
              <option value="">&nbsp;</option>
              <?php 
                $query = $this->db->get('supplier');
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_supplier;?>" <?php if($data[0]->id_supplier == $row->id_supplier){ echo 'selected'; }?>><?php echo $row->nama_supplier;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Supplier</label>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>