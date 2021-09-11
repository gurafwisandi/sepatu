<h4 class="page-title">Dashboard</h4>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-primary card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-user-cog"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Data Pegawai</p>
							<h4 class="card-title"><?php echo $pegawai;?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-info card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-truck"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Data Supplier</p>
							<h4 class="card-title"><?php echo $supplier;?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-danger card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="fas fa-capsules"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Data Item</p>
							<h4 class="card-title"><?php echo $item;?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card card-stats card-warning card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-analytics"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Data Transaksi Pembelian</p>
							<h4 class="card-title"><?php echo $pembelian[0]->jml.' ( Rp. '.number_format($pembelian[0]->grand_total).' )';?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card card-stats card-success card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-analytics"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Data Transaksi Penjualan</p>
							<h4 class="card-title"><?php echo $penjualan[0]->jml.' ( Rp. '.number_format($penjualan[0]->grand_total).' )';?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>