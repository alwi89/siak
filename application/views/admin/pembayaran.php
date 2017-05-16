<script src="<?php echo base_url(); ?>templates/plugins/autoNumeric.js"></script>
<style>
td{
	padding:5px;
}
</style>
<script>
$(function(){
	document.title = 'Transaksi - Pembayaran';
	$('#ttotal').autoNumeric('init');
	$('#tdibayar').autoNumeric('init');
	$('#tkembali').autoNumeric('init');
	$("#loading").hide();
	$("#tgl_bayar").datepicker({
		autoclose: true,
		format: 'dd/mm/yyyy',
		todayHighlight: true
	});
	data_siswa();
	var ada = "<?php echo isset($_SESSION['trx'])?'ada':'kosong'; ?>";
	if(ada=='kosong'){
		$('#simpan').hide();
	}else{
		$('#simpan').show();
	}

	var table_cart = $('#data').DataTable({
					"bPaginate": false,
					"aProcessing": true,
					"aServerSide": true,
					"ajax": "<?php echo site_url(); ?>admin/pembayaran/cart",
					"columns": [
						{ "data": "nama_jenis" },
						{ "render": function(data, type, full){
								var harga = parseInt(full['biaya']);
								var total = parseInt(full['total']);
								$('#h_total').html(total.toLocaleString('en-US', {minimumFractionDigits: 2}));
								$('#ttotal').autoNumeric('set', total);
								$('#total').val(total);
								return harga.toLocaleString('en-US', {minimumFractionDigits: 2}) 
								}},		
						{ "render": function(data, type, full){
								return '<a href="javascript:hapus(\''+full['id_jenis']+'\')" title="hapus" onclick="return confirm(\'yakin menghapus?\')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" />' 
								}},
					]
				}); 
	$.fn.dataTable.ext.errMode = 'none';
	$("#tambahkan").click(function(e){
		if($('#nis').val()==""){
			alert('harap pilih siswa terlebih dahulu');
		}else{
			var dipilih = new Array();
			$("input[name='jenis[]']:checked").each( function () {
			   dipilih.push($(this).val());
			});
			if(dipilih.length==0){
				alert('harap pilih pembayaran yang diinginkan');
			}else{
				$.ajax({
					url: "<?php echo site_url(); ?>admin/pembayaran/add",
					data: {'jenis':dipilih},
					type: 'POST',
					dataType: 'json',
					beforeSend: function(){
						$("#loading").show();
					},
					success: function(datas){
							$("#loading").hide();
							//alert(datas[0]['status']);
							clear();
							$("#simpan").show();
							//table_cart.ajax.reload( null, false );				   
					},
					error: function (request, status, error) {
						alert(request.responseText);
					}
				});
			}
		}
	});
	$('#simpan').click(function(){
		if($('#tgl_bayar').val()==""){
			alert('tgl bayar harus diisi');
			$('#tgl_bayar').focus();
		}else if($('#nis').val()==""){
			alert('siswa harus diisi');
			$('#nis').focus();		
		}else{
			$('#dibayar').focus();
			$("#modal_bayar").modal('toggle');			
		}
	});
	$('#tdibayar').keyup(function(){
		var total = $('#ttotal').autoNumeric('get');
		var dibayar = $('#tdibayar').autoNumeric('get');
		$('#dibayar').val(dibayar);
		var kembali = dibayar-total;
		if(kembali<0){
			$('#tkembali').val('');
			$('#kembali').val('');
		}else{
			$('#tkembali').autoNumeric('set', kembali);
			$('#kembali').val(kembali);
		}
	});
	$('#fbayar').submit(function(){
		if($('#tkembali').val()==""){
			alert('jumlah dibayar masih kurang');
			$('#tdibayar').focus();
			return false;
		}else{
			return true;
		}
	});
	setInterval( function () {
		table_cart.ajax.reload( null, false ); // user paging is not reset on reload
	}, 1000 );
});
function clear(){
	data_jenis();
}

function hapus(kode){
	$.ajax({
		url: "<?php echo site_url(); ?>admin/pembayaran/del",
		data: {'jenis':kode},
		type: 'POST',
		dataType: 'json',
		beforeSend: function(){
			$("#loading").show();
		},
		success: function(datas){
			if(datas[0]['status']=='0'){
				$('#h_total').html('0');
				$('#simpan').hide();
			}
			$("#loading").hide();
			clear();
		}
	});
}
function data_jenis(){
	if($('#nis').val()==""){
		$('#jenis').html('harap pilih siswa terlebih dahulu');
	}else{
		$.ajax({
				url: "<?php echo site_url(); ?>admin/pembayaran/jenis",
				data: {'nis':$('#nis').val()},
				type: 'POST',
				dataType: 'json',
				beforSend: function(){
					$("#jenis").html('<img src="<?php echo base_url(); ?>templates/images/loading.gif" width="20" height="20" />');
				},
				success: function(datas){
						if(datas[0]!=null){
							var hasil = '<input type="button" class="btn btn-danger" value="tampilkan data jenis pembayaran" id="btn_jenis" style="width:100%"; title="klik untuk menampilkan atau menyembunyikan jenis pembayaran" /><br /><br />';
							hasil += '<div id="pilihan">';
							hasil += '<table id="data_jenis" class="table table-striped table-bordered table-hover">';
							hasil += '<thead><tr>';
							hasil += '<th>Jenis Pembayaran</th>';
							hasil += '<th>Biaya</th>';
							hasil += '</tr></thead>';
							hasil += '<tbody>';						
							$.each(datas, function(i, data){
								hasil += '<tr>';
								hasil += '<td><input type="checkbox" name="jenis[]" value="'+data['id_jenis']+'" />'+data['nama_jenis']+'</td>';
								biaya = parseInt(data['biaya']);
								hasil += '<td>'+biaya.toLocaleString('en-US', {minimumFractionDigits: 2})+'</td>';
								hasil += '</tr>';
							});
							hasil += '</tbody>';
							hasil += '</table>';
							hasil += '</div>';
							$("#jenis").html(hasil);
							$('#data_jenis').DataTable({
								"paging":   false,
								"ordering": false,
							});
							$('#pilihan').hide();
							var tampil = false;
							$('#btn_jenis').click(function(){
								if(tampil){
									$('#pilihan').hide();
									$('#btn_jenis').val('tampilkan data jenis pembayaran');
									tampil = false;
								}else{
									$('#pilihan').show();
									$('#btn_jenis').val('sembunyikan data jenis pembayaran');
									tampil = true;
								}
							});
					   }else{
							alert('belum ada data jenis pembayaran, menunggu bendahara mengisikan data jenis pembayaran');
					   }				   
				}
			});
	}
}
function data_siswa(){
	$.ajax({
			url: "<?php echo site_url(); ?>admin/pembayaran/siswa",
			data: {},
			type: 'POST',
			dataType: 'json',
			beforSend: function(){
				$("#siswa").html('<img src="<?php echo base_url(); ?>templates/images/loading.gif" width="20" height="20" />');
			},
			success: function(datas){
					if(datas[0]!=null){
						var hasil = '<select name="siswa" id="nis" class="form-control" data-provide="typeahead">';
						hasil += '<option value="">ketikkan NIS / nama siswa</option>'
						$.each(datas, function(i, data){
							hasil += '<option value="'+data['nis']+'">'+data['nis']+' - '+data['nama']+'</option>';
					   	});
						$("#siswa").html(hasil);
						data_jenis();
						$('#nis').change(function(){
							data_jenis();
						});
				   }else{
				   		alert('belum ada data siswa, menunggu admin mengisikan data siswa');
				   }				   
			}
		});
}
</script>
	<form method="post" action="<?php echo site_url(); ?>admin/pembayaran/simpan" id="fbayar">

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              	<!--konten barang-->
                <div style="text-align:right;font-size:24px;color:#000000;border-bottom:3px double #000000;" id="label_total">
                Total : <div id="h_total">0</div>
                </div>
                <table width="70%">
                    <tr>
                        <td width="30%">Tgl Pembayaran</td>
                        <td><input type="text" name="tgl_bayar" id="tgl_bayar" value="<?php echo date("d/m/Y"); ?>" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td valign="top">Siswa</td>
                        <td id="siswa"></td>
                    </tr>
                    <tr>
                        <td valign="top">Pilih Pembayaran</td>
                        <td id="jenis"></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td>
                        	<input id="tambahkan" value="Tambahkan" type="button" class="btn btn-primary" />
                            <input id="simpan" value="Simpan Pembayaran" type="button" class="btn btn-danger" />
                        </td>
                    </tr>
                </table>
                <div id="loading"><img src="<?php echo base_url(); ?>templates/images/loading.gif" width="30" height="30" /></div>
                <table class="table table-striped table-bordered table-hover" id="data">
                    <thead>
                        <tr>
                            <th>Jenis Pembayaran</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   </table>
 
 <!-- Modal bayar-->
<div class="modal fade" id="modal_bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pembayaran</h4>
      </div>
      <div class="modal-body" id="ds">
        <div id="history">
        	<table>
            	<tr>
                	<td>Total Rp</td>
                    <td><input type="text" name="ttotal" id="ttotal" readonly required class="form-control" /></td>
                    <input type="hidden" name="total" id="total" />
                </tr>
                <tr>
                	<td>Dibayar Rp</td>
                    <td><input type="text" name="tdibayar" id="tdibayar" required class="form-control" /></td>
                    <input type="hidden" name="dibayar" id="dibayar" />
                </tr>
                <tr>
                	<td>Kembali Rp</td>
                    <td><input type="text" name="tkembali" id="tkembali" required readonly class="form-control" /></td>
                    <input type="hidden" name="kembali" id="kembali" />
                </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
      	<input type="submit" value="Simpan Pembayaran" class="btn btn-primary" onclick="return confirm('yakin menyimpan pembayaran?');" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--end modal bayar-->               
 
              </div>
        </section><!-- /.content -->
</form>