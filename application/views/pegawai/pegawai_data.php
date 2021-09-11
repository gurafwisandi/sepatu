<div class="page-header">
	<h4 class="page-title">Data Pegawai</h4>
	<ul class="breadcrumbs">
		<li class="nav-home">
			<a href="#">
				<i class="flaticon-database"></i>
			</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Master</a>
		</li>
		<li class="separator">
			<i class="flaticon-right-arrow"></i>
		</li>
		<li class="nav-item">
			<a href="#">Pegawai</a>
		</li>
	</ul>
</div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="card-head-row">
				<div class="card-title"></div>
				<div class="card-tools">
					<button class="btn btn-info btn-round btn-sm mr-2" data-toggle="modal" data-target="#addRowModal">
					<i class="fa fa-plus"></i> Pegawai
					</button>
				</div>
			</div>
		</div>
		<div class="card-body">

			<!---Modal INPUT-->
			<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header no-bd">
							<h5 class="modal-title">
								<span class="fw-mediumbold">
								Input Pegawai</span> 
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php echo site_url('/pegawai') ?>" method="POST">
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<input name="nama_pegawai" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" size="20" onkeyup="this.value = this.value.toUpperCase()" required>
												<label for="inputFloatingLabel2" class="placeholder">Nama Pegawai</label>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<input name="email" autocomplete="off" id="inputFloatingLabel2" type="email" class="form-control input-solid" size="20" required>
												<label for="inputFloatingLabel2" class="placeholder">Email</label>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<input name="jabatan" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" onkeyup="this.value = this.value.toUpperCase()" required>
												<label for="inputFloatingLabel2" class="placeholder">Jabatan</label>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<input name="no_telp" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
												<label for="inputFloatingLabel2" class="placeholder">Telp</label>
											</div>
									</div>
									<div class="col-sm-12">
											<div class="form-group form-floating-label">
												<textarea name="alamat" autocomplete="off" class="form-control input-solid" id="inputFloatingLabel2" rows="5"></textarea>
												<label for="inputFloatingLabel2" class="placeholder">Alamat</label>
											</div>
									</div>
									<div class="col-sm-6">
											<div class="form-group form-floating-label">
												<input name="username" autocomplete="off" id="inputFloatingLabel2" type="text" class="form-control input-solid" required>
												<label for="inputFloatingLabel2" class="placeholder">Username</label>
											</div>
									</div>
									<div class="col-sm-6">
											<div class="form-group form-floating-label">
												<input name="password" autocomplete="off" id="inputFloatingLabel2" type="password" class="form-control input-solid" required>
												<label for="inputFloatingLabel2" class="placeholder">Password</label>
											</div>
									</div>
								</div>
						</div>
						<div class="modal-footer no-bd">
							<button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Modal -->

			<div class="table-responsive">
				<table id="multi-filter-select" class="display table table-striped table-hover" >
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pegawai</th>
							<th>Nama Pegawai</th>
							<th>Jabatan</th>
							<th>Alamat</th>
							<th>No Telp</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
            <?php foreach($data as $u){ ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $u->id_pegawai ?></td>
              <td><?php echo $u->nama_pegawai ?></td>
              <td><?php echo $u->jabatan ?></td>
              <td><?php echo $u->alamat ?></td>
              <td><?php echo $u->no_telp ?></td>
              <td><?php echo $u->email ?></td>
							<td>
							<div class="form-button-action">
								<label class="selectgroup-item">
								<a href="javascript:void(0)" onclick="$('#view-modal').modal('show');" data-id="<?php echo $u->id_pegawai; ?>" id="get_data" data-toggle="tooltip" title="Approval">
									<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-edit btn btn-warning btn-xs"></i></span>
								</a>
								
								</label>
								<label class="selectgroup-item">
									<a href="<?php echo base_url('pegawai/delete/'.$u->id_pegawai)?>">
										<span class="selectgroup-button selectgroup-button-icon "><i class="fas fa-trash-alt btn btn-danger btn-xs"></i></span>
									</a>
								</label>
							</div>
              </td>
            </tr>
            <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- /.modal EDIT-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Pegawai</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">              
				<div id="dynamic-content">
				</div>
			</div> 
			<!-- 
			<div class="modal-footer"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
			</div> 
			-->
		</div>
	</div>
</div>
<!-- /.modal EDIT-->
<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
<script>
	$(document).ready(function(){
			$(document).on('click', '#get_data', function(e){
					e.preventDefault();
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
							url  : "<?php echo site_url(); ?>pegawai/get_conten/"+uid,
							type: 'POST',
							dataType: 'html'
					})
					.done(function(url){ 
							console.log(url);
							$('#dynamic-content').html(url); // load response 
					})
					.fail(function(){
							$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
							$('#modal-loader').hide();
					});
			});
	});

	$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
</script>