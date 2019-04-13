<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/pembelian.inc.php';
	$eks = new Pembelian($db);

	$eks->id_mekanik = $_POST['id_mekanik'];
	$eks->id_sparepart = $_POST['id_sparepart'];
	$eks->qty = $_POST['qty'];
	$eks->harga_jasa = $_POST['harga_jasa'];
	$eks->tgl_beli = $_POST['tgl_beli'];
	
	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	}
	
	else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}
?>
	
	

		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  <?php
			include_once 'sidebar.php';
			?>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-10">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li><a href="nilai.php"><span class="fa fa-wrench"></span> Data Service</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Tambah Data Service</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				   <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <select class="form-control" id="id_mekanik" name="id_mekanik">
					<?php
					$conn = mysql_connect("localhost","root","");
					mysql_select_db("project213",$conn); 
					$result = mysql_query("SELECT * FROM 213_mekanik");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row["id_mekanik"];?>"><?=$row["nama_mekanik"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				
				  <div class="form-group">
				    <label for="id_sparepart">Sparepart</label>
				    <select class="form-control" id="id_sparepart" name="id_sparepart">
					<?php
					$conn = mysql_connect("localhost","root","");
					mysql_select_db("project213",$conn); 
					$result = mysql_query("SELECT * FROM 213_sparepart where stock > 0 ");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					
					<option value="<?=$row["id_sparepart"];?>"><?=$row["sparepart"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="qty">Banyaknya (qty)</label>
				    <input type="text" class="form-control" id="qty" name="qty"  required >
				  </div>
				  <div class="form-group">
				    <label for="tgl_beli">Tanggal Service</label>
				    <input type="text" class="form-control" id="dtgl_beli" name="tgl_beli" value="<?php echo $date = date('Y-m-d'); ?>" required >
				  </div>
				 
				   <div class="form-group">
				    <label for="harga_jasa">Harga Jasa</label>
				    <input type="text" class="form-control" id="harga_jasa" name="harga_jasa" required>
				  </div>
				  
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='pembelian.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
				</div>
				</div>
			  
		  </div>
		</div>

		
		
		<?php
include_once 'footer.php';
?>