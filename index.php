<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD İŞLEMLERİ</title>
</head>
<body>


	<h1>Veritabanı PDO kayıt işlemleri</h1>
	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		echo "İşlem başarılı";

	} elseif ($_GET['durum']=="no") {

		echo "İşlem başarısız";


	}

	?>

	<form action="islem.php" method="POST">
		
		<input type="text" required="" name="bilgilerim_ad" placeholder="Adınızı Giriniz...">
		<input type="text" required="" name="bilgilerim_soyad" placeholder="Soyadınızı Giriniz...">
		<input type="email" required="" name="bilgilerim_mail" placeholder="Mail Giriniz...">
		<input type="text" required="" name="bilgilerim_yas" placeholder="Yaş Giriniz...">
		<button type="submit" name="insertislemi">Formu Gönder</button>

	</form>

	<br>

	<h4>Kayıtların Listelenmesi</h4>
	<hr>

	<?php 

	/*$bilgilerimsor=$db->prepare("SELECT * from bilgilerim");
	$bilgilerimsor->execute();

	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);

	echo "<pre>";
	print_r($bilgilerimcek);
	echo "</pre>";

	echo "<br>";

	echo $bilgilerimcek['bilgilerim_ad'];*/


	//Select İşlemi

	/*$bilgilerimsor=$db->prepare("SELECT * from bilgilerim");
	$bilgilerimsor->execute();

	while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {



		echo $bilgilerimcek['bilgilerim_ad']; echo "<br>";



	}*/


	//Where Select İşlemi

	/*$bilgilerimsor=$db->prepare("SELECT * from bilgilerim where bilgilerim_yas=:id");
	$bilgilerimsor->execute(array(
		'id' => 32
	));

	while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {



		echo $bilgilerimcek['bilgilerim_ad']; echo "<br>";



	}*/

	?>


	<table style="width: 60%" border="1">
		
		<tr>
			<th>S.NO</th>
			<th>ID</th>
			<th>Ad</th>
			<th>Soyad</th>
			<th>Mail</th>
			<th>Yaş</th>
			<th width="50">İşlemler</th>
			<th width="50">İşlemler</th>
		</tr>

		<?php

		$bilgilerimsor=$db->prepare("SELECT * from bilgilerim");
		$bilgilerimsor->execute();

		$say=0;

		while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>



		<tr>
			<td><?php echo $say; ?></td>
			<td><?php echo $bilgilerimcek['bilgilerim_id'] ?></td>
			<td><?php echo $bilgilerimcek['bilgilerim_ad'] ?></td>
			<td><?php echo $bilgilerimcek['bilgilerim_soyad'] ?></td>
			<td><?php echo $bilgilerimcek['bilgilerim_mail'] ?></td>
			<td><?php echo $bilgilerimcek['bilgilerim_yas'] ?></td>
			<td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>"><button>Düzenle</button></td></a>
			<td align="center"><a href="islem.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>&bilgilerimsil=ok"><button>Sil</button></td></a>
		</tr>

		<?php } ?>

	</table>




</body>
</html>