<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
echo"
 <div class='row'>
                   <div class='col-lg-12'>
			<div class='panel panel-default'>
                            <div class='panel-heading'>
                           Sambutan
                            </div>
                            <div class='panel-body'>                         
				<p>Selamat Datang Di halaman Admin, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan.</p>
                            </div>
			</div>
                   </div>
</div>";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}

elseif($_GET['aksi']=='profil'){
echo"			
	<div class='row'>
	 <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI PROFIL</h3>
                </div>
                <div class='box-header'>
				</div>
                             <div class='box-body'>
		<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
	 <thead> 
	 <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                        </tr>
                                    </thead>
				   <tbody> ";
				$no=0;   
				$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil ='1'");
while ($t=mysqli_fetch_array($tebaru)){
                $isi_berita = strip_tags($t['isi']); 
                $isi = substr($isi_berita,0,70); 
                $isi = substr($isi_berita,0,strrpos($isi," ")); 
$no++;    
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nama]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofil&id_p=$t[id_profil]'>edit</a></li>
						<li><a href='index.php?aksi=viewprofil&id_p=$t[id_profil]'>view</a></li>
                        </ul>
                    </div></td>
                                       </tr>                                      
                                    ";
}
                                echo"</tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>	
	";
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT PROFIL
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' enctype='multipart/form-data' action='master/profil.php?act=editpro&id_p=$_GET[id_p]'>
       <div class='form-grup'>
        <label>Nama Aplikasi</label>
        <input type='text' class='form-control' value='$t[nama_app]' name='nama_app'/><br>
        <label>Nama</label>
        <input type='text' class='form-control' value='$t[nama]' name='jd'/><br>
		<label>Alias</label>
        <input type='text' class='form-control' value='$t[alias]' name='alias'/><br>
		<label>Tahun</label>
        <input type='text' class='form-control' value='$t[tahun]' name='tahun'/><br>
		<label>Alamat</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
        <label>Gambar Begroud Aplikasi</label>
        <input type='file' class='smallInput'  name='gambar'/><br>
		<label>Isi</label>
        <textarea id='text-ckeditor' class='form-control' name='isi'>$t[isi]</textarea></br>
		<script>CKEDITOR.replace('text-ckeditor');</script>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div> </div>
";
}



elseif($_GET['aksi']=='viewprofil'){

$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");

$t=mysqli_fetch_array($tebaru);

echo"<div class='row'>

                <div class='col-lg-12'>

                    <div class='panel panel-default'>

                        <div class='panel-heading'>$t[nama]

                        </div>

                        <div class='panel-body'>

		

<a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a></div>

";

echo"$t[isi] </div></div></div></div></div>";

}



elseif($_GET['aksi']=='admin'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data Admin
                            </button>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>User</th>		  
                                        </tr>
                                    </thead>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM user ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[user_nama]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[user_username]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>
                                    </tbody>";
}
                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input</h4>
                                        </div>
                                                  <div class='box-body'>
            <form action='input.php?aksi=inputadmin' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
                <label>Nama</label>
                <input type='text' class='form-control' name='nama' required='required' placeholder='Masukkan Nama ..'>
              </div>
              <div class='form-group'>
                <label>Username</label>
                <input type='text' class='form-control' name='username' required='required' placeholder='Masukkan Username ..'>
              </div>
              <div class='form-group'>
                <label>Password</label>
                <input type='password' class='form-control' name='password' required='required' min='5' placeholder='Masukkan Password ..'>
              </div>
              <div class='form-group'>
                <label>Foto</label>
                <input type='file' name='foto'>
              </div>
              <div class='form-group'>
                <input type='submit' class='btn btn-sm btn-primary' value='Simpan'>
              </div>
            </form>
          </div>
									
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editadmin'){
$tebaru=mysqli_query($koneksi," SELECT * FROM user WHERE user_id=$_GET[user_id]");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[user_nama] $t[user_id]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditadmin&user_id=$t[user_id]'  enctype='multipart/form-data'>
    	<label>Nama Lengkap</label>
        <input type='text' class='form-control'  name='nama' value='$t[user_nama]'/>
	<label>User Name</label>
        <input type='text' class='form-control'  name='username' value='$t[user_username]'/>     
	<label>Password</label>
        <input type='text' class='form-control'  name='password'/> </br>
		 <label>Foto</label>
                  <input type='file' name='foto'></br>
	 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary'>Save </button>
    </form>  
</div> </div></div></div>
";
}


elseif($_GET['aksi']=='bibit'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> </br></br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr> <th>No</th>
                                            <th>kode bibit</th>
                                            <th>lokasi</th>
                                            <th>info luas</th>	 
                                            <th>status</th>	 
                                            <th>jenis bibit</th>	
                                             
                                        </tr>
                                    </thead><tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi," SELECT * FROM bibit ORDER BY id_bibit ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"
                                        <tr><td>$no</td>
                                            <td>$t[kode_bibit]</td>
                                            <td>$t[lokasi_bibit]</td> 
                                            <td>$t[luas_bibit]</td> 
                                            <td>$t[status_bibit]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[jenis_bibit]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editbibit&id_bibit=$t[id_bibit]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusbibit&id_bibit=$t[id_bibit]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[jenis_bibit] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>";
}
                                echo"
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputbibit'>
                                            <div class='form-group'>
                                           
                                            <label>PG</label>
						                    <input type='text' class='form-control' name='kode_bibit'/><br>
					                        <label>LOKASI</label>
						                    <input type='text' class='form-control' name='lokasi_bibit'/><br>
                                            <label>INFO LUAS</label>
						                    <input type='text' class='form-control' name='luas_bibit'/><br>
                                            <label>STATUS</label>
						                    <input type='text' class='form-control' name='status_bibit'/><br>
                                            <label>JENIS BIBIT</label>
						                    <input type='text' class='form-control' name='jenis_bibit'/><br>
                                            <label>LUAS SEMPEL</label>
						                    <input type='text' class='form-control' name='sempel_luas'/><br>
                                            <label>JUMALH NORMAL BIBIT</label>
						                    <input type='text' class='form-control' name='jml_btg_normal'/><br>
                                            <label>JUMLAH AFKIR BIBIT</label>
						                    <input type='text' class='form-control' name='jml_btg_afkir'/><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editbibit'){
$tebaru=mysqli_query($koneksi," SELECT * FROM bibit WHERE id_bibit=$_GET[id_bibit] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT $t[id_aset]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditbibit&id_bibit=$t[id_bibit]'>
<div class='form-group'>
<label>PG</label>
<input type='text' class='form-control' value='$t[kode_bibit]' name='kode_bibit'/><br>
<label>LOKASI</label>
<input type='text' class='form-control' value='$t[lokasi_bibit]' name='lokasi_bibit'/><br>
<label>INFO LUAS</label>
<input type='text' class='form-control' value='$t[luas_bibit]' name='luas_bibit'/><br>
<label>STATUS</label>
<input type='text' class='form-control' value='$t[status_bibit]' name='status_bibit'/><br>
<label>JENIS BIBIT</label>
<input type='text' class='form-control' value='$t[jenis_bibit]' name='jenis_bibit'/><br>
<label>LUAS SEMPEL</label>
<input type='text' class='form-control' value='$t[sempel_luas]' name='sempel_luas'/><br>
<label>JUMALH NORMAL BIBIT</label>
<input type='text' class='form-control' value='$t[jml_btg_normal]' name='jml_btg_normal'/><br>
<label>JUMLAH AFKIR BIBIT</label>
<input type='text' class='form-control' value='$t[jml_btg_afkir]' name='jml_btg_afkir'/><br>
                              
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='galud'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI Gulud $_GET[galud]
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal1'>
                                Tambah Data
                            </button> </br></br>
                           	<div class='table-responsive'>	
                               <table id='example1' class='table table-bordered table-striped'>
                               <thead>
                               <tr >
                                 <td colspan='17' align='center'><div align='center'>Jumlah Bibit ( Btg ) Gulud $_GET[galud]</div></td>
                               </tr>
                              
                               <tr >
                                 <td  colspan='6' align='center'><div align='center'>Normal</div></td>
                                 <td colspan='11' align='center'><div align='center'>Afkir</div></td>
                               </tr>
                               <tr >
                               <td ><div align='center'>BIBIT</div></td>
                                 <td ><div align='center'>0-12 cm</div></td>
                                 <td ><div align='center'>13-15 cm</div></td>
                                 <td ><div align='center'>16-18 cm</div></td>
                                 <td ><div align='center'>18-25 cm</div></td>
                                 <td ><div align='center'>&gt; 25 cm</div></td>
                                 <td ><div align='center'>Total</div></td>
                                 <td ><div align='center'>BD</div></td>
                                 <td ><div align='center'>C2</div></td>
                                 <td ><div align='center'>C3</div></td>
                                 <td ><div align='center'>DR</div></td>
                                 <td ><div align='center'>DT</div></td>
                                 <td ><div align='center'>K</div></td>
                                 <td ><div align='center'>RF</div></td>
                                 <td ><div align='center'>RM</div></td>
                                 <td ><div align='center'>T2</div></td>
                                 <td ><div align='center'>T3</div></td>
                                 <td ><div align='center'>Total</div></td>
                                 <td ><div align='center'>AKSI</div></td>
                               </tr>
                               <thead>
                               <tbody>
                               ";
			
                               $no=0;
                               $sql=mysqli_query($koneksi," SELECT * FROM galud,bibit WHERE galud.id_bibit=bibit.id_bibit and galud.status_galud='$_GET[galud]' ORDER BY galud.id_galud ASC");
                               while ($t=mysqli_fetch_array($sql)){	
                               $no++;
                               $tt=$t[n_1]+$t[n_2]+$t[n_3]+$t[n_4]+$t[n_5];
                               $ttd=$t[a_bd]+$t[a_c2]+$t[a_c3]+$t[a_dr]+$t[a_dt]+$t[a_k]+$t[a_rf]+$t[a_rm]+$t[a_t2]+$t[a_t3];
                                                                   echo"
                               <tr >
                               <td><div align='center'>$t[lokasi_bibit]-$t[kode_bibit]-$t[jenis_bibit]</div></td>
                                 <td><div align='center'>$t[n_1]</div></td>
                                 <td><div align='center'>$t[n_2]</div></td>
                                 <td><div align='center'>$t[n_3]</div></td>
                                 <td><div align='center'>$t[n_4]</div></td>
                                 <td><div align='center'>$t[n_5]</div></td>
                                 <td><div align='center'>$tt</div></td>
                                 <td><div align='center'>$t[a_bd]</div></td>
                                 <td><div align='center'>$t[a_c2]</div></td>
                                 <td><div align='center'>$t[a_c3]</div></td>
                                 <td><div align='center'>$t[a_dr]</div></td>
                                 <td><div align='center'>$t[a_dt]</div></td>
                                 <td><div align='center'>$t[a_k]</div></td>
                                 <td><div align='center'>$t[a_rf]</div></td>
                                 <td><div align='center'>$t[a_rm]</div></td>
                                 <td><div align='center'>$t[a_t2]</div></td>
                                 <td><div align='center'>$t[a_t3]</div></td>
                                 <td><div align='center'>$ttd</div></td>
                                 <td><div align='center'><a class='btn btn-primary btn-sm' href='index.php?aksi=editgalud&id_galud=$t[id_galud]' title='Edit'><i class='fa fa-pencil'></i></a> | 
                                 <a class='btn btn-primary btn-sm' href='hapus.php?aksi=hapusgalud&id_galud=$t[id_galud]&galud=$t[status_galud]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[id_galud] ?')\" title='Hapus'><i class='fa fa-remove'></i></a>
                                 </div></td>
                               </tr>
                               ";
}
                                echo" </tbody>
                             </table>                         
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data</h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputgalud'>
                                            <div class='form-group'>
                                            <label>Pilih bibit</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_bibit>
                                            <option value='' selected>Pilih Kategori</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM bibit ORDER BY id_bibit");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_bibit]>$c[lokasi_bibit]-$c[kode_bibit]-$c[jenis_bibit]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>Pilih Galud</label>
                                            <select class='form-control select2' style='width: 100%;' name=status_galud>
                                            <option value='' selected>Pilih Kategori</option>
                                            <option value='luar'>Galud Luar</option>
                                            <option value='dalam'>Galud Dalam</option>
                                            </select><br><br>
                                            <label>Normal 0-12 cm</label>
						                    <input type='text' class='form-control' name='n_1'/><br>
					                        <label>Normal 13-15 cm</label>
						                    <input type='text' class='form-control' name='n_2'/><br>
                                            <label>Normal 16-18 cm</label>
						                    <input type='text' class='form-control' name='n_3'/><br>
                                            <label>Normal 18-25 cm</label>
						                    <input type='text' class='form-control' name='n_4'/><br>
                                            <label>Normal > 25 cm </label>
						                    <input type='text' class='form-control' name='n_5'/><br>
                                            <label>Afkir BD</label>
						                    <input type='text' class='form-control' name='a_bd'/><br>
                                            <label>Afkir C2</label>
						                    <input type='text' class='form-control' name='a_c2'/><br>
                                            <label>Afkir C3</label>
						                    <input type='text' class='form-control' name='a_c3'/><br>
                                            <label>Afkir DR</label>
						                    <input type='text' class='form-control' name='a_dr'/><br>
                                            <label>Afkir DT</label>
						                    <input type='text' class='form-control' name='a_dt'/><br>
                                            <label>Afkir K</label>
						                    <input type='text' class='form-control' name='a_k'/><br>
                                            <label>Afkir RF</label>
						                    <input type='text' class='form-control' name='a_rf'/><br>
                                            <label>Afkir RM</label>
						                    <input type='text' class='form-control' name='a_rm'/><br>
                                            <label>Afkir T2</label>
						                    <input type='text' class='form-control' name='a_t2'/><br>
                                            <label>Afkir T3</label>
						                    <input type='text' class='form-control' name='a_t3'/><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editgalud'){
$tebaru=mysqli_query($koneksi," SELECT * FROM galud,bibit WHERE galud.id_bibit=bibit.id_bibit and galud.id_galud=$_GET[id_galud] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT $t[id_aset]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditgalud&id_galud=$t[id_galud]'>
                                    <div class='form-group'>
                                            <label>Pilih bibit</label>
                                            <select class='form-control select2' style='width: 100%;' name=id_bibit>
                                            <option value='$t[id_bibit]' selected>$t[lokasi_bibit]-$t[kode_bibit]-$t[jenis_bibit]</option>"; 
                                             $sql=mysqli_query($koneksi,"SELECT * FROM bibit ORDER BY id_bibit");
                                             while ($c=mysqli_fetch_array($sql))
                                             {
                                                echo "<option value=$c[id_bibit]>$c[lokasi_bibit]-$c[kode_bibit]-$c[jenis_bibit]</option>";
                                             }
                                                echo "
                                            </select><br><br>
                                            <label>Pilih Galud</label>
                                            <select class='form-control select2' style='width: 100%;' name=status_galud>
                                            <option value='$t[status_galud]' selected>$t[status_galud]</option>
                                            <option value='luar'>Galud Luar</option>
                                            <option value='dalam'>Galud Dalam</option>
                                            </select><br><br>
                                            <label>Normal 0-12 cm</label>
						                    <input type='text' class='form-control' value='$t[n_1]'  name='n_1'/><br>
					                        <label>Normal 13-15 cm</label>
						                    <input type='text' class='form-control' value='$t[n_2]' name='n_2'/><br>
                                            <label>Normal 16-18 cm</label>
						                    <input type='text' class='form-control' value='$t[n_3]' name='n_3'/><br>
                                            <label>Normal 18-25 cm</label>
						                    <input type='text' class='form-control' value='$t[n_4]' name='n_4'/><br>
                                            <label>Normal > 25 cm </label>
						                    <input type='text' class='form-control' value='$t[n_5]' name='n_5'/><br>
                                            <label>Afkir BD</label>
						                    <input type='text' class='form-control' value='$t[a_bd]' name='a_bd'/><br>
                                            <label>Afkir C2</label>
						                    <input type='text' class='form-control' value='$t[a_c2]' name='a_c2'/><br>
                                            <label>Afkir C3</label>
						                    <input type='text' class='form-control' value='$t[a_c3]' name='a_c3'/><br>
                                            <label>Afkir DR</label>
						                    <input type='text' class='form-control' value='$t[a_dr]' name='a_dr'/><br>
                                            <label>Afkir DT</label>
						                    <input type='text' class='form-control' value='$t[a_dt]' name='a_dt'/><br>
                                            <label>Afkir K</label>
						                    <input type='text' class='form-control' value='$t[a_k]' name='a_k'/><br>
                                            <label>Afkir RF</label>
						                    <input type='text' class='form-control' value='$t[a_rf]' name='a_rf'/><br>
                                            <label>Afkir RM</label>
						                    <input type='text' class='form-control' value='$t[a_rm]' name='a_rm'/><br>
                                            <label>Afkir T2</label>
						                    <input type='text' class='form-control' value='$t[a_t2]' name='a_t2'/><br>
                                            <label>Afkir T3</label>
                                            <input type='text' class='form-control' value='$t[a_t3]' name='a_t3'/><br>
                                        </div> 
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div>
";
}
elseif($_GET['aksi']=='totalgalud'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI Total Gulud Luar dan Gulud Dalam
                            </div>
                            <div class='panel-body'>	
               
                                   <div class='table-responsive'>	
                                   <table id='example1' class='table table-bordered table-striped'>
                                   <thead>
                                   <tr >
                                     <td colspan='17' align='center'><div align='center'>Total Jumlah Bibit ( Btg ) Gulud Luar dan Gulud Dalam </div></td>
                                   </tr>
                                  
                                   <tr >
                                     <td  colspan='6' align='center'><div align='center'>Normal</div></td>
                                     <td colspan='11' align='center'><div align='center'>Afkir</div></td>
                                   </tr>
                                   <tr >
                                   <td ><div align='center'>BIBIT</div></td>
                                     <td ><div align='center'>0-12 cm</div></td>
                                     <td ><div align='center'>13-15 cm</div></td>
                                     <td ><div align='center'>16-18 cm</div></td>
                                     <td ><div align='center'>18-25 cm</div></td>
                                     <td ><div align='center'>&gt; 25 cm</div></td>
                                     <td ><div align='center'>Total</div></td>
                                     <td ><div align='center'>BD</div></td>
                                     <td ><div align='center'>C2</div></td>
                                     <td ><div align='center'>C3</div></td>
                                     <td ><div align='center'>DR</div></td>
                                     <td ><div align='center'>DT</div></td>
                                     <td ><div align='center'>K</div></td>
                                     <td ><div align='center'>RF</div></td>
                                     <td ><div align='center'>RM</div></td>
                                     <td ><div align='center'>T2</div></td>
                                     <td ><div align='center'>T3</div></td>
                                     <td ><div align='center'>Total</div></td>
                                   </tr>
                                   <thead>
                                   <tbody>
                                   ";
                
                                   $no=0;
                                   $sql=mysqli_query($koneksi,"SELECT b.*, 
                                   sum(g.n_1) AS jm_n_1,
                                   sum(g.n_2) AS jm_n_2,
                                   sum(g.n_3) AS jm_n_3,
                                   sum(g.n_4) AS jm_n_4,
                                   sum(g.n_5) AS jm_n_5,
                                   sum(g.a_bd) AS jm_a_bd,
                                   sum(g.a_c2) AS jm_a_c2,
                                   sum(g.a_c3) AS jm_a_c3,
                                   sum(g.a_dr) AS jm_a_dr,
                                   sum(g.a_dt) AS jm_a_dt,
                                   sum(g.a_k) AS jm_a_k,
                                   sum(g.a_rf) AS jm_a_rf,
                                   sum(g.a_rm) AS jm_a_rm,
                                   sum(g.a_t2) AS jm_a_t2,
                                   sum(g.a_t3) AS jm_a_t3
                            FROM bibit b
                            LEFT JOIN galud g ON b.id_bibit = g.id_bibit
                            GROUP BY b.id_bibit");
                                   while ($t=mysqli_fetch_array($sql)){	
                                   $no++;
                                   $tt=$t[jm_n_1]+$t[jm_n_2]+$t[jm_n_3]+$t[jm_n_4]+$t[jm_n_5];
                                   $ttd=$t[jm_a_bd]+$t[jm_a_c2]+$t[jm_a_c3]+$t[jm_a_dr]+$t[jm_a_dt]+$t[jm_a_k]+$t[jm_a_rf]+$t[jm_a_rm]+$t[jm_a_t2]+$t[jm_a_t3];
                                                                       echo"
                                   <tr >
                                   <td><div align='center'>$t[lokasi_bibit]-$t[kode_bibit]-$t[jenis_bibit]</div></td>
                                     <td><div align='center'>$t[jm_n_1]</div></td>
                                     <td><div align='center'>$t[jm_n_2]</div></td>
                                     <td><div align='center'>$t[jm_n_3]</div></td>
                                     <td><div align='center'>$t[jm_n_4]</div></td>
                                     <td><div align='center'>$t[jm_n_5]</div></td>
                                     <td><div align='center'>$tt</div></td>
                                     <td><div align='center'>$t[jm_a_bd]</div></td>
                                     <td><div align='center'>$t[jm_a_c2]</div></td>
                                     <td><div align='center'>$t[jm_a_c3]</div></td>
                                     <td><div align='center'>$t[jm_a_dr]</div></td>
                                     <td><div align='center'>$t[jm_a_dt]</div></td>
                                     <td><div align='center'>$t[jm_a_k]</div></td>
                                     <td><div align='center'>$t[jm_a_rf]</div></td>
                                     <td><div align='center'>$t[jm_a_rm]</div></td>
                                     <td><div align='center'>$t[jm_a_t2]</div></td>
                                     <td><div align='center'>$t[jm_a_t3]</div></td>
                                     <td><div align='center'>$ttd</div></td>
                                     
                                   </tr>
                                   ";
    }
                                    echo" </tbody>
                                 </table>                         
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";			
    
    ////////////////input admin			
    
 }
?>