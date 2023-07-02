<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputbibit'){
mysqli_query($koneksi,"insert into bibit (kode_bibit,lokasi_bibit,luas_bibit,status_bibit,jenis_bibit,sempel_luas,jml_btg_normal,jml_btg_afkir) 
values ('$_POST[kode_bibit]','$_POST[lokasi_bibit]','$_POST[luas_bibit]','$_POST[status_bibit]','$_POST[jenis_bibit]','$_POST[sempel_luas]','$_POST[jml_btg_normal]','$_POST[jml_btg_afkir]')");  
echo "<script>window.location=('index.php?aksi=bibit')</script>";
}
elseif($_GET['aksi']=='inputgalud'){
	mysqli_query($koneksi,"insert into galud (id_bibit,
	n_1,
	n_2,
	n_3,
	n_4,
	n_5,
	a_bd,
	a_c2,
	a_c3,
	a_dr,
	a_dt,
	a_k,
	a_rf,
	a_rm,
	a_t2,
	a_t3,
	status_galud) 
	values ('$_POST[id_bibit]',
	'$_POST[n_1]',
	'$_POST[n_2]',
	'$_POST[n_3]',
	'$_POST[n_4]',
	'$_POST[n_5]',
	'$_POST[a_bd]',
	'$_POST[a_c2]',
	'$_POST[a_c3]',
	'$_POST[a_dr]',
	'$_POST[a_dt]',
	'$_POST[a_k]',
	'$_POST[a_rf]',
	'$_POST[a_rm]',
	'$_POST[a_t2]',
	'$_POST[a_t3]',
	'$_POST[status_galud]')");  
	echo "<script>window.location=('index.php?aksi=galud&galud=$_POST[status_galud]')</script>";
}
elseif($_GET['aksi']=='inputadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','')");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		echo "<script>alert('Gagal ');</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','$file_gambar')");
		echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}
}

?>