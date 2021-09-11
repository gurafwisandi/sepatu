<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Toko Arun Jaya Sport</title>
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/icon.jpeg">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/img/icon.ico" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=base_url()?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/atlantis.min.css">
</head>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<body>
<div class="content">
  <div class="row">
    <div class="col-md-3" style="text-align:right">
    </div>
    <div class="col-md-6">
      <H1 style="text-align:center">ARUN JAYA SPORT</H1>
      <H2 style="text-align:center">Jl. Ciruas - Petir, Pipitan, Kec. Walantaka, Kota Serang, Banten 42183</H2>
      <H2 style="text-align:center">Phone 0811-1522-296</H2>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <div class="dropdown-divider"></div>
  <div class="dropdown-divider"></div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12">
          <label for="inputFloatingLabel2" class="placeholder" >Kode Transaksi</label>
          <input disabled value="<?php echo $header[0]->id_penjualan;?>" name="id_pembelian" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid">
        </div>
        <div class="col-md-12">
          <label for="inputFloatingLabel2" class="placeholder">Tanggal Pembelian</label>
          <input disabled value="<?php echo $header[0]->tanggal_penjualan.' '.$header[0]->jam_penjualan;?>" name="tanggal_pembelian" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20">
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="table table-bordered-bd-*states" boder='1'>
            <thead>
              <tr>
                <th>No</th>
                <th>Item</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php $grand_harga=0; ?>
              <?php $grand_total=0; ?>
              <?php $grand_qty=0; ?>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $no++; ?></td>
								<td><?php echo $u->nama_item.' - '.$u->warna.' ('.$u->ukuran.')'; ?></td>
								<td><?php echo number_format($u->harga) ?></td>
								<td><?php echo number_format($u->qty) ?></td>
								<td><?php echo number_format($u->total) ?></td>
              </tr>
              <?php $grand_harga +=$u->harga; ?>
              <?php $grand_qty +=$u->qty; ?>
              <?php $grand_total +=$u->total; ?>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>&nbsp;</th>
                <th>Grand Total</th>
                <th><?php echo number_format($grand_harga);?></th>
                <th><?php echo number_format($grand_qty);?></th>
                <th><?php echo number_format($grand_total);?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center">Serang, <?php echo date('d F Y');?></div>
        </div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center">Penanggung Jawab</div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4" style="text-align:center"><?php echo $this->session->userdata("nama_pegawai"); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
</body>
</html>