<!DOCTYPE html>
<html lang="en">

<head>
    <title>FYB - Anasayfa</title>
    
	<link href="anasayfa.css" rel="stylesheet">
	<link href="popup.css" rel="stylesheet">
	<link href="navbar.css" rel="stylesheet">
	<link href="dropdown.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>

<body>

    
    <div class="topnav" id="myTopnav">
  <a href="anasayfa.html" class="active">Anasayfa</a> 
        <a onclick="myFunction()" class="dropbtn">Ürünler</a>
        <div id="myDropdown" class="dropdown-content">
    <a href="#buzdolabi">Buzdolabı</a>
    <a href="#camasirmakinesi">Çamaşır Makinesi</a>
  </div> 
  <a href="#servisler">Servisler</a>
  <a href="#hakkında">Hakkında</a>
  <a href="#iletisim">İletişim</a>
          <div class="topnav-right">
    <a onclick="myFunction2()" class="dropbtn"><b>ÜRÜN EKLE</b></a>
              <div id="myDropdown2" class="dropdown-content">
    <a href="buzdolabi_ekle.html">Buzdolabı</a>
    <a href="camasirmakinesi.html">Çamaşır Makinesi</a>
  </div> 
  </div>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

    <?php
    // DB ayarları yapılıyor
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

    // DB ayarları yapıldı


    $sorgu = $db->prepare("SELECT * FROM urunlertablosu");
    $sonuclar = $sorgu->execute();
    $sonuclar = $sorgu->fetchAll(PDO::FETCH_OBJ); 

    ?>
	<section class="section-prices">
		<h2 class="section-header">FYB ÜRÜN DENETLEME ŞİRKETİ</h2>
		<div class="list-boxs">
			<div style="margin: 0px 0px 0px 350px;" class="card starter">
				<div class="head">
					<p style="text-align: center;color: red">Satıcı</p>
					<?php echo $sonuclar[0]->satici;?>
				</div>
				<div class="ticket"><?php echo $sonuclar[0]->fiyati;?> TL</div>
				<div class="body">
					<p style="text-align: center"><b>Electrolux <?php echo $sonuclar[0]->urunAdi;?></b></p>
					<br>
					<img src="electrolux_buzdolabi.jpg" style="height: 300px;width: 150px">
					<button class="btn" onclick="satinal()">Satın Al</button>
                    <button class="btn" id="myBtn">Ürün Özellikleri</button>
                    
					
                    
					<button class="btn"><a href="duzenle.php?urun=<?php echo $sonuclar[0]->id;?>">Düzenle</a></button>
				</div>
			</div>
			<div style="margin: 0px 350px 0px 0px ;" class="card standard">
				<div class="head">
					<p style="text-align: center;color: red">Satıcı</p>
					<?php echo $sonuclar[1]->satici;?>
				</div>
				<div class="ticket"><?php echo $sonuclar[1]->fiyati;?> TL</div>
				<div class="body">
					<p style="text-align: center"><b>Electrolux <?php echo $sonuclar[1]->urunAdi;?></b></p>
					<br>
					<img src="electrolux_buzdolabi.jpg" style="height: 300px;width: 150px">
					<button class="btn" onclick="satinal()">Satın Al</button>
					<button class="btn" id="myBtn2">Ürün Özellikleri</button>
					<button class="btn"><a href="duzenle.php?urun=<?php echo $sonuclar[1]->id;?>">Düzenle</a></button>
				</div>
			</div>
		</div>
    

		<div class="list-boxs">
			<div  style="margin: 0px 0px 0px 350px ;" class="card starter">
				<div class="head">
					<p style="text-align: center;color: red">Satıcı</p>
					<?php echo $sonuclar[2]->satici;?>
				</div>
				<div class="ticket"><?php echo $sonuclar[2]->fiyati;?> TL</div>
				<div class="body">
					<p style="text-align: center"><b>Bosch <?php echo $sonuclar[2]->urunAdi;?></b></p>
					<br>
					<img src="bosch_camasir.jpg" style="height: 200px;width: 200px">
					<button class="btn" onclick="satinal()">Satın Al</button>
					<button class="btn" id="myBtn3">Ürün Özellikleri</button>
                    
					<button class="btn"><a href="duzenle.php?urun=<?php echo $sonuclar[2]->id;?>">Düzenle</a></button>
				</div>
			</div>
			<div  style="margin: 0px 350px 0px 0px ;"class="card standard">
				<div class="head">
					<p style="text-align: center;color: red">Satıcı</p>
					<?php echo $sonuclar[3]->satici;?>
				</div>
				<div class="ticket"><?php echo $sonuclar[3]->fiyati;?> TL</div>
				<div class="body">
					<p style="text-align: center"><b>Bosch Çamaşır <?php echo $sonuclar[3]->urunAdi;?></b></p>
					<br>
					<img src="bosch_camasir.jpg" style="height: 200px;width: 200px">
					<button class="btn" onclick="satinal()">Satın Al</button>
					<button class="btn">Ürün Özellikleri</button>
					<button class="btn"><a href="duzenle.php?urun=<?php echo $sonuclar[3]->id;?>">Düzenle</a></button>
				</div>
			</div>
		</div>
	</section>
    
	<link href="footer.css" rel="stylesheet">
	<footer class="footer">
		<div class="footer-left col-md-4 col-sm-6">
			<p class="about">
				<span> Şirket Hakkında</span> FYB şirketi 2022 yılında beyaz eşya fiyatlarının suistimal edilmemesi
				üzerine
				kurulmuş bir denetleme şirketidir. Bu site de satıcının ürünü satarken üst kurulun belirlediği
				fiyat ile tutarsız
				olup olmadığı test edilmektedir. Eğer satıcı üst kurulun belirlediği fiyattan farklı bir fiyatta satarsa
				cezai
				işlem uygulanır. Bu site bu yanlışı düzeltmek için kurulmuştur.
			</p>
			<div class="icons">
				<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
					rel="stylesheet" type="text/css">
				<a href="#facebook"><i class="fa fa-facebook"></i></a>
				<a href="#twitter"><i class="fa fa-twitter"></i></a>
				<a href="#linkedin"><i class="fa fa-linkedin"></i></a>
				<a href="#googleplus"><i class="fa fa-google-plus"></i></a>
				<a href="#instagram"><i class="fa fa-instagram"></i></a>

			</div>
		</div>
		<div class="footer-center col-md-4 col-sm-6">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span> Adres Bilgileri ve Telefon</span> İzmir, Karşıyaka</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p> (+90) 555 555 5555</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="#"> fyb@company.com</a></p>
			</div>
		</div>
		<div class="footer-right col-md-4 col-sm-6">
			<h2> Şirket<span> logosu</span></h2>
			<p class="menu">
				<a href="#anasayfa"> Ana Sayfa</a> |
				<a href="#servisler"> Servisler</a> |
				<a href="#hakkında"> Hakkında</a> |
				<a href="#iletisim"> İletişim</a>
			</p>
			<p class="name"> FYB &copy; 2022</p>
		</div>
	</footer>
    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <table class="urunOzellik" border="5" width="500" height="600">
         <tr>
        <td style="background-color: gainsboro">Marka</td>
        <td style="background-color: white">Electrolux</td>
        </tr>
    <tr>
    <tr>
        <td style="background-color: gainsboro">Hızlı Dondurma</td>
        <td style="background-color: white">Var</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Toplam Kapasite</td>
        <td style="background-color: white">520L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Buzluk Kapasite</td>
        <td style="background-color: white">97L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Soğutucu Net Hacmi</td>
        <td style="background-color: white">354L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Enerji Sınıfı</td>
        <td style="background-color: white">F(Yeni Enerji Sınıfı)</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Kapı Sayısı</td>
        <td style="background-color: white">2</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Genişlik</td>
        <td style="background-color: white">70 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Yükseklik</td>
        <td style="background-color: white">187 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Derinlik</td>
        <td style="background-color: white">72 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">No-Frost</td>
        <td style="background-color: white">Var</td>
        </tr>
    </table>
  </div>

</div>
    
    <div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <table class="urunOzellik2" border="5" width="500" height="600">
         <tr>
        <td style="background-color: gainsboro">Marka</td>
        <td style="background-color: white">Electrolux</td>
        </tr>
    <tr>
    <tr>
        <td style="background-color: gainsboro">Hızlı Dondurma</td>
        <td style="background-color: white">Var</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Toplam Kapasite</td>
        <td style="background-color: white">520L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Buzluk Kapasite</td>
        <td style="background-color: white">97L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Soğutucu Net Hacmi</td>
        <td style="background-color: white">354L</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Enerji Sınıfı</td>
        <td style="background-color: white">F(Yeni Enerji Sınıfı)</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Kapı Sayısı</td>
        <td style="background-color: white">2</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">SA</td>
        <td style="background-color: white">70 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">SADASD</td>
        <td style="background-color: white">187 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">Derinlik</td>
        <td style="background-color: white">72 CM</td>
        </tr>
        <tr>
        <td style="background-color: gainsboro">No-Frost</td>
        <td style="background-color: white">Var</td>
        </tr>
    </table>
  </div>

</div>
    

        <script>
        function satinal(){
            alert("SATIN ALMA BAŞARILI");
            
        }
            
            // Get the modal
var modal = document.getElementById("myModal");


// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        </script>
    
    <script>

            
            // Get the modal
var modal = document.getElementById("myModal");


// Get the button that opens the modal
var btn = document.getElementById("myBtn2");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        </script>
    
    <script>
    //------------Dropdown list------------//
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    
    </script>
    
    


</body>

</html>