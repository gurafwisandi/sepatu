<form action="<?php echo site_url('/penjualan/item/'.$data[0]->id_penjualan) ?>" method="POST">
	<div class="modal-body">
    <input type="hidden" name="id_penjualan" value="<?php echo $data[0]->id_penjualan;?>">
		<input type="hidden" name="id_detail_penjualan" value="<?php echo $data[0]->id_detail_penjualan;?>">
		<input type="hidden" name="harga" value="<?php echo $data[0]->harga;?>">
		<div class="row">
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <select name="id_item" class="form-control input-solid" id="selectFloatingLabel2" required>
              <?php 
                $this->db->select('*');
                $this->db->from('item');                            
                $this->db->where('item.id_item',$data[0]->id_item);
                $query = $this->db->get();            
                foreach ($query->result() as $row)
                {
              ?>
                <option value="<?php echo $row->id_item;?>" <?php if($row->id_item == $data[0]->id_item){ echo 'selected'; }?>><?php echo $row->nama_item;?></option>
              <?php	} ?>
            </select>
            <label for="selectFloatingLabel2" class="placeholder">Supplier</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input value="<?php echo $data[0]->qty;?>" name="qty" autocomplete="off" id="inputFloatingLabel2" type="number" class="form-control input-solid" size="20" required>
            <label for="inputFloatingLabel2" class="placeholder">Qty</label>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="form-group form-floating-label">
            <input value="<?php echo $data[0]->diskon;?>" name="diskon" autocomplete="off" id="inputFloatingLabel2" min="0" type="number" class="form-control input-solid" size="20">
            <label for="inputFloatingLabel2" class="placeholder">Diskon (%)</label>
          </div>
      </div>
		</div>
	</div>
	<div class="modal-footer no-bd">
		<button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</form>