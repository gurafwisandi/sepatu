<div class="page-header">
	<h4 class="page-title">Laporan</h4>
	<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-database"></i>
			</a>
		</li>
	</ul>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
      <form action="<?php echo site_url('/laporan') ?>" method="POST" target="_blank">
        <div class="row row-demo-grid">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body">
                <label for="selectFloatingLabel2" class="placeholder">Jenis Laporan</label>
                <select name="laporan" id="laporan" onchange="myFunction()" class="form-control input-solid" id="selectFloatingLabel2" required>
                  <option value="">-- Pilih Laporan --</option>
                  <option value="Kategori">Data Kategori</option>
                  <option value="Supplier">Data Supplier</option>
                  <option value="Item">Data Item</option>
                  <option value="Pegawai">Data Pegawai</option>
                  <option value="Pembelian">Data Pembelian</option>
                  <option value="Penjualan">Data Penjualan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
				<div id="myDIV" style="display:none;">
					<div class="row row-demo-grid">
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder"> Dari Tanggal</label>
                    <input required style="font-size:13px;" name="dari" id="dari" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
                </div>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                    <label for="inputFloatingLabel2" class="placeholder"> Sampai Tanggal</label>
                    <input required style="font-size:13px;" name="sampai" id="sampai" autocomplete="off" id="inputFloatingLabel2" type="date" class="form-control input-solid" size="20">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
		</div>
	</div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("laporan").value;
  console.log(x);
  if (x === "Pembelian" || x === "Penjualan" ) {
    document.getElementById("myDIV").style.display = "block";
    document.getElementById("dari").required=true;
    document.getElementById("sampai").required=true;
  } else {
    document.getElementById("myDIV").style.display = "none";
    document.getElementById("dari").required=false;
    document.getElementById("sampai").required=false;
  }
}
</script>
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>