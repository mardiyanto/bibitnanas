<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='proseseditbibit'){
mysqli_query($koneksi,"UPDATE bibit SET kode_bibit='$_POST[kode_bibit]',lokasi_bibit='$_POST[lokasi_bibit]',
luas_bibit='$_POST[luas_bibit]',status_bibit='$_POST[status_bibit]',jenis_bibit='$_POST[jenis_bibit]',sempel_luas='$_POST[sempel_luas]',
jml_btg_normal='$_POST[jml_btg_normal]',jml_btg_afkir='$_POST[jml_btg_afkir]' WHERE id_bibit='$_GET[id_bibit]'");
echo "<script>window.location=('index.php?aksi=bibit')</script>";
}

elseif($_GET['aksi']=='proseseditadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_foto='$x' where user_id='$_GET[user_id]'");		
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_password='$password' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}
}
elseif($_GET['aksi']=='proseseditgalud'){
	mysqli_query($koneksi,"UPDATE galud SET 
	id_bibit='$_POST[id_bibit]',
	n_1='$_POST[n_1]',
	n_2='$_POST[n_2]',
	n_3='$_POST[n_3]',
	n_4='$_POST[n_4]',
	n_5='$_POST[n_5]',
	a_bd='$_POST[a_bd]',
	a_c2='$_POST[a_c2]',
	a_c3='$_POST[a_c3]',
	a_dr='$_POST[a_dr]',
	a_dt='$_POST[a_dt]',
	a_k='$_POST[a_k]',
	a_rf='$_POST[a_rf]',
	a_rm='$_POST[a_rm]',
	a_t2='$_POST[a_t2]',
	a_t3='$_POST[a_t3]',
	status_galud='$_POST[status_galud]'
	WHERE id_galud='$_GET[id_galud]'");
echo "<script>window.location=('index.php?aksi=galud&galud=$_POST[status_galud]')</script>";
}

?>