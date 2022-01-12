<?php
ini_set('max_execution_time',0);
$host = 'localhost';
$dbname = 'urunler';
$username = 'root';
$password = '';
$charset = 'utf8';

//$collate = 'utf8_unicode_ci';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
];

try {
    $db = new PDO($dsn, $username, $password, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Bağlantı hatası: ' . $e->getMessage();
    exit;
}


if(isset($_GET['urun']) ){
	if(isset($_POST['urunAdi'])){

		$sorgu = $db->prepare("UPDATE urunlertablosu SET"
			." urunAdi='".$_POST["urunAdi"]
			."', satici='".$_POST["satici"]
			."', fiyati=".$_POST["fiyat"]
			. " WHERE id=".$_GET['urun']);
        $lastId = $sorgu->execute();

        header("Location: anasayfa.php");
        die();
	}

	$sorgu = $db->prepare("SELECT * FROM urunlertablosu WHERE id=".$_GET['urun']);
	$sonuclar = $sorgu->execute();
	$sonuclar = $sorgu->fetchAll(PDO::FETCH_OBJ); 

	?>
		<form action="duzenle.php?urun=<?php echo $_GET['urun']?>" method="post">

	<?php
	foreach ($sonuclar as $key) {

		?>
		Ürün : <input type="text" name="urunAdi" value="<?php echo $key->urunAdi;?>"><br>
		Satıcı : <input type="text" name="satici" value="<?php echo $key->satici;?>"><br>
		Fiyat : <input type="number" name="fiyat" value="<?php echo $key->fiyati;?>">
		<input type="submit" name="guncelle" value="Güncelle">
		
		<?php
	}
	?>
</form>
	<?php
}
?>
