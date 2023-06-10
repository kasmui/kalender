<?php 	
    session_start();
	//include "lokasi.php";
	date_default_timezone_set("Asia/Jakarta");
	$waktu=date("d/M/Y H:i:s");
	$bulan=date("m"); 
    $pesan= "Seseorang mengakses Kalender pada ".$waktu;	
    include "sendMessage.php";        
?>

<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="kalender.png">
		<title>Kalender & Peristiwa</title>    
		<style>
			@charset "utf-8";
			/* CSS Document */
			html,body,form{ width: 100%; margin:0px; padding:0px; font-size:12px; color:#666; empty-cells:hide;}
			table.calendar{ width: 100%; border-style: solid; border-width: 1px; border-width:1px; border-color:#666; -moz-box-shadow:0px 0px 4px #CCCCCC; -webkit-box-shadow:0px 0px 4px #CCCCCC; box-shadow:0px 0px 4px #CCCCCC; }
			input {
			font-size: 17px;
			border: none;
			border-collapse: collapse;
			text-align: center;
			}
			tr.calendar-row  {  }

			td.calendar-day-head:nth-child(1) {
				color: red;
				font-weight: bold;
			}
			td.calendar-day-head:nth-child(6) {
				color: green;
				font-weight: bold;
			}                      

			td.calendar-day:nth-child(1) {
			  color: red;
			  font-weight: bold;
			  background-color:#ffefbf;
			}

			td.calendar-day:nth-child(6) {   
			  color: green;
			  font-weight: bold;
			  background-color:#ffefbf;
			}

			td.calendar-day  { min-height:80px; position:relative; } * html div.calendar-day { height:80px; }
			td.calendar-day:hover  { background:#FFF; -moz-box-shadow:0px 0px 20px #eeeeee inset; -webkit-box-shadow:0px 0px 20px #eeeeee inset; box-shadow:0px 0px 20px #eeeeee inset; cursor:pointer;}
			td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
			td.calendar-day-head {
				font-weight:bold; font-size: 25px; text-shadow:0px 1px 0px #FFF;color:#002db3; text-align:center; width:64px; padding:12px 6px; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;  background-color:#ffefbf;

			}
			
			div.day-number{
				padding:6px; text-align:center; 
			}
			/* shared */
			td.calendar-day, td.calendar-day-np {padding:5px; border-bottom:1px solid #DBDBDB; border-right:1px solid #DBDBDB; font-size:14px;background: #ffffff;
			background: -moz-linear-gradient(top,  #ffffff 0%, #f2f2f2 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#f2f2f2));
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
			background: -o-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
			background: -ms-linear-gradient(top,  #ffffff 0%,#f2f2f2 100%);
			background: linear-gradient(to bottom,  #ffffff 0%,#f2f2f2 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f2f2f2',GradientType=0 );
			}


			.overday{ color:#164b87; text-shadow:0px 1px 0px #FFF;}
			.currentday{background: #6cb7f3 !important;
			background: -moz-linear-gradient(top,  #6cb7f3 0%, #388be8 100%) !important;
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6cb7f3), color-stop(100%,#388be8)) !important;
			background: -webkit-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
			background: -o-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
			background: -ms-linear-gradient(top,  #6cb7f3 0%,#388be8 100%) !important;
			background: linear-gradient(to bottom,  #6cb7f3 0%,#388be8 100%) !important;
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6cb7f3', endColorstr='#388be8',GradientType=0 ) !important; color:#FFF  !important; font-weight:bold; -moz-box-shadow:0px 0px 18px #1F68BA inset; -webkit-box-shadow:0px 0px 18px #1F68BA inset; box-shadow:0px 0px 18px #1F68BA inset;
			}
			.currentday:hover{-moz-box-shadow:0px 0px 24px #074080 inset !important; -webkit-box-shadow:0px 0px 24px #074080 inset !important; box-shadow:0px 0px 24px #074080 inset !important;}

			/* menghilangkan default focus outline pada tombol */
			button:focus {
			  outline: none;
			}
			/* panah kiri */
			.arrow-kiri {
			  color: blue;
			  transition: color 0.3s ease;
			}

			/* panah kanan */
			.arrow-kanan {
			  color: blue;
			  transition: color 0.3s ease;
			}
			/* saat dihover */
			.arrow-kiri:hover {
			  color: red;
			  transition: color 0.3s ease;
			  transform: scale(1.2);
			}
			/* saat dihover */
			.arrow-kanan:hover {
			  color: red;
			  transition: color 0.3s ease;
			  transform: scale(1.2);
			}	
			.calendar-day:hover {
			  color: blue;
			  font-size: 150%;
			}
		</style>
		<style>
			body {
				background-image: url("");
				background-size: cover;
				background-repeat: no-repeat;
				background-position: center center;
				opacity: 0.9; /* nilai opacity */
			}
		</style>   
		<style>
			table, td {
				padding: 5px;
				border: 0px solid #ffffff;
				vertical-align: top;
			}
			div.data {
				padding: 3px;
			}
			/* Set the font for the page */
			body, input, select, textarea, h1, h2, td, iframe {
			  font-family: times, sans-serif;
			}	
			
			button.lebar {
				height: 30px;
				width: 50px;
			}
			button {
				height: 30px;
				color: blue;
			}			
			/* saat dihover */
			button:hover {
			  color: red;
			  transition: color 0.3s ease;
			  transform: scale(1.2);
			}				
		</style>
		<style>
			/* Styling untuk dialog box */
			.dialog-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
			}
			.dialog-box h3 {
				margin-top: 0;
			}
		</style>
		<style>
			/* Styling untuk dialog box */
			.konversi-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
			}
			.konversi-box h3 {
				margin-top: 0;
			}
		</style>
		
		<style>
			/* Styling untuk dialog box */
			.hari-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
			}
			.hari-box h3 {
				margin-top: 0;
			}
		</style>
		<style>
			/* Styling untuk dialog box */
			.info-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
			}
			.info-box h3 {
				margin-top: 0;
			}
		</style>		
		<style>
			/* Styling untuk ketanggal box */
			.ketanggal-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
			}
			.ketanggal-box h3 {
				margin-top: 0;
			}
		</style>
		
		<style>
			/* Styling untuk moonsun box */
			.moonsun-box {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				background-color: #efffbf;
				box-shadow: 0 0 10px rgba(0,0,0,0.3);
				z-index: 9999;
				display: none;
				width: 100%; /* Menambahkan properti width dengan nilai 100% */
			}
			.moonsun-box h3 {
				margin-top: 0;
			}
		</style>
		
		<style>
			table.shalat { 
				border-collapse: collapse;
				margin: 10px auto;
				background-color:#fff;
				border: 1px solid #ddd;
			}
			fieldset {
				width: 100%; 
				border-radius: 1%;
				text-align: center;
			}
			hr {
				height:0px;
				border-width:1; 
				color: #3ef1ff; 
				background-color:#3ef1ff;   
			}
		</style>
		<style>
			.alert {
			   position: fixed;   
			   top: 0;
			   left: 0;
			   width: 1%;
			   background-color: red;
			   color: white;
			   text-align: center;
			   padding: 10px;
			   font-size: 15px;
			}
		</style>	
		<style>
			p {
				font-size: 15px;
				width: 100%;  
			}
		</style>

		<script type="text/javascript" src="https://blogchem.com/jam/PrayTimes.js"></script>	
		<script type="text/javascript" src="https://blogchem.com/kalender/lunar_phase.js"></script>
		<script type="text/javascript" src="https://blogchem.com/kalender/astronomy.browser.js"></script>
	</head>
<body>
	<script>
		var iTanggalM = 0;
		var iTanggalH = 0;
		var iBulanM = 0;
		var iBulanH = 0;
		var iTahunM = 0;
		var iTahunH = 0;
		var iTahunJ = 0;              

		function intPart(floatNum) {
		return(floatNum<-0.0000001? Math.ceil(floatNum-0.0000001) : Math.floor(floatNum+0.0000001));
		}

		function hitung_Hijriah(d,m,y) {
		mPart = (m-13)/12;
		jd = intPart((1461*(y+4800+intPart(mPart)))/4)+
		intPart((367*(m-1-12*(intPart(mPart))))/12)-
		intPart((3*(intPart((y+4900+intPart(mPart))/100)))/4)+d-32075;
		l = jd-1948440+10632;
		n = intPart((l-1)/10631);
		l = l-10631*n+354;
		j = (intPart((10985-l)/5316))*(intPart((50*l)/17719))+(intPart(l/5670))*(intPart((43*l)/15238));
		l = l-(intPart((30-j)/15))*(intPart((17719*j)/50))-(intPart(j/16))*(intPart((15238*j)/43))+29;
		iBulanH = intPart((24*l)/709);
		iTanggalH = l-intPart((709*iBulanH)/24);

		tambahan = 0;  // tambahan adalah penyesuaian tanggal hijiriyah, -2,-1,0,+1,+2

		iTanggalH = iTanggalH + tambahan;			
		iTahunH = 30*n+j-30;
		iBulanH -= 1;
		if (iTanggalH > 30){
		iTanggalH = 1
		iBulanH = iBulanH + 1;
		}
		}



		function hitung_Tanggal(format) {
		var namaBulanE = new Array( "January","February","March","April","May","June","July","August","September","October","November","December");
		var namaBulanH = new Array( "Muharram","Safar","Rabi Al-Awwal","Rabi Al-Thani","Jumada Al-Ula","Jumada Al-Thani","Rajab","Shaban","Ramadan","Shawwal","Dhul Qada","Dhul Hijja");
		var namaBulanI = new Array( "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		var namaBulanHI = new Array( "Muharram","Safar","Rabi'ul Awal","Rabi'ul Akhir","Jumadil Awal","Jumadil Akhir","Rajab","Sya'ban","Ramadhan","Syawal","Dzul Qa'dah","Dzul Hijjah");
		var namaBulanJ = new Array( "Suro","Sapar","Mulud","Ba'da Mulud","Jumadil Awal","Jumadil Akhir","Rejeb","Ruwah","Poso","Syawal","Dulkaidah","Besar");
		var namaHariE = new Array("Thursday","Friday","Saturday","Sunday","Monday","Tuesday","Wednesday");
		var namaHariH = new Array("Al-Hamis","Al-Jum'a","As-Sabt","Al-Ahad","Al-Itsnayna","Ats-Tsalatsa'","Al-Arba'a'");
		var namaHariI = new Array("Kamis","Jumat","Sabtu","Ahad","Senin","Selasa","Rabu");
		var namaHariJ = new Array("Wage","Kliwon","Legi","Pahing","Pon","Wage","Kliwon");

		now = new Date(); 
		iTanggalM = now.getDate();
		iBulanM = now.getMonth();
		iTahunM = now.getYear();
		if(iTahunM<1900) { iTahunM += 1900 }; // Y2K
		hitung_Hijriah(iTanggalM,iBulanM,iTahunM);
		hr = Date.UTC(iTahunM,iBulanM,iTanggalM,0,0,0)/1000/60/60/24;
		iTahunJ = iTahunH+512;
		sHariE = namaHariE[hr%7];         //string nama hari : Inggris
		sHariH = "Yaum "+namaHariH[hr%7]; //string nama hari : Arab
		sHariI = namaHariI[hr%7];         //string nama hari : Indonesia
		sHariJ = namaHariJ[hr%5];         //string nama hari : Jawa (hari pasar)
		sBulanE = namaBulanE[iBulanM];    //string nama bulan : Masehi - Inggris
		sBulanH = namaBulanH[iBulanH];    //string nama bulan : Hijriah - Arab
		sBulanI = namaBulanI[iBulanM];    //string nama bulan : Masehi - Indonesia
		sBulanHI = namaBulanHI[iBulanH];  //string nama bulan : Hijriah - Indonesia
		sBulanJ = namaBulanJ[iBulanH];    //string nama bulan : Hijriah - Jawa

		//iTanggalM : int tanggal Masehi (Inggris/Indonesia)
		//iTanggalH : int tanggal Hijriah (Arab/Indonesia/Jawa)
		zTanggalM = iTanggalM<10? "0"+iTanggalM : iTanggalM; //int tanggal Masehi (Inggris/Indonesia), + leading zero
		zTanggalH = iTanggalH<10? "0"+iTanggalH : iTanggalH; //int tanggal Hijriah (Arab/Indonesia/Jawa), + leading zero
		iBulanM += 1; //int bulan Masehi (Inggris/Indonesia)
		iBulanH += 1; //int bulan Hijriah (Arab/Indonesia/Jawa)
		zBulanM = iBulanM<10? "0"+iBulanM : iBulanM; //int bulan Masehi (Inggris/Indonesia), + leading zero
		zBulanH = iBulanH<10? "0"+iBulanH : iBulanH; //int bulan Hijriah (Arab/Indonesia/Jawa), + leading zero

		switch(format) {
		case 1 : { sDate = sHariI+" "+sHariJ;  break; }
		case 2 : { sDate = sHariI+" "+sHariJ+", "+iTanggalM+" "+sBulanI+" "+iTahunM+" / "+iTanggalH+" "+sBulanHI+" "+iTahunH+" H / "+iTanggalH+" "+sBulanJ+" "+iTahunJ+" J";break; }
		default : { sDate = sHariJ;break; }
		}
		return(sDate);
		}

		function tulis_Tanggal(format) {
		sDate = hitung_Tanggal(format);
		document.write(sDate);
		} 	
	</script>
	<center>
		<a style="text-decoration: none;" href="https://blogchem.com/kalender/"><h2 style="font-family: times;">KALENDER & PERISTIWA</h2></a>		
	</center>

<?php
	include "view_calendar.php";
	
	// mendapatkan bulan dan tahun saat ini
	if(isset($_GET['month']) && isset($_GET['year'])) {
		$month = $_GET['month'];
		$year = $_GET['year'];
	} else {
		$month = date('m');  
		$year = date('Y');
	}

    // jika tombol "previous" diklik, kurangi satu bulan
    if(isset($_GET['action']) && $_GET['action'] == 'previous') {
        $month = $month - 1;
        if($month == 0) {
            $month = 12;
            $year = $year - 1;
        }
    }
    // jika tombol "now" diklik, kembali ke bulan sekarang
    if(isset($_GET['action']) && $_GET['action'] == 'now') {
        $month = $month;
    }    
    // jika tombol "next" diklik, tambahkan satu bulan
    if(isset($_GET['action']) && $_GET['action'] == 'next') {
        $month = $month + 1;
        if($month == 13) {
            $month = 1;
            $year = $year + 1;
        }
    }
	
	
	
    // jika tombol "previous" diklik, kurangi satu bulan
    if(isset($_GET['action']) && $_GET['action'] == 'previousTahun') {
        $month = $month;
		$year = $year - 1;
    }
    
    // jika tombol "next" diklik, tambahkan satu bulan
    if(isset($_GET['action']) && $_GET['action'] == 'nextTahun') {
        $month = $month;
		$year = $year + 1;
    }	
	
	
			  

	// menampilkan tombol "next" untuk melihat bulan berikutnya
	$nextMonth = $month;
	$nextYear = $year;
	$nextTahun = $year + 1;
	if($nextMonth == 13) {
		$nextMonth = 1;
		$nextYear = $year + 1;
	}
	// menampilkan tombol "previous" untuk melihat bulan berikutnya
	$previousMonth = $month;
	$previousYear = $year;
	$previousTahun = $year - 1;
	if($previousMonth == 0) {
		$previousMonth = 12;              
		$previousYear = $year - 1;
	}	

    // menampilkan judul kalender dengan bulan dan tahun saat ini
	echo "<center>";        
	 
    if(isset($_GET['action']) && $_GET['action'] == 'now') {
		//include "moon-sun.php";  
		echo '<table width="100%" style="text-align: center; border: 0px;">
			<tr>
				<td width="100%" style="text-align: left; border: 0px;">  
					<div  style="background-color: #664d00; height: 50px; display: flex; align-items: center; justify-content: center; width:100%;">   
						<span style="font-size:20px; text-shadow:0px 1px 1px #444; font-family: Times; font-style: italic; color:#ffffff; text-align: center;">
							<script type=text/javascript>tulis_Tanggal(2);</script>
						</span>      
					</div>
				</td>
			</tr>	
		</table>';		
        include "menu.php";   
    } else 
    if((isset($_GET['action']) && $_GET['action'] == 'previous') || (isset($_GET['action']) && $_GET['action'] == 'previousTahun')) {
        setlocale(LC_TIME, 'id_ID');
		echo '<table width="100%" style="text-align: center; border: 0px;">
			<tr>
				<td width="100%" style="text-align: left; border: 0px;">  
					<div  style="background-color: #664d00; height: 50px; display: flex; align-items: center; justify-content: center; width:100%;">   
						<span style="font-size:30px; text-shadow:0px 1px 1px #444; font-family: Times; font-style: italic; color:#ffffff; text-align: center;">
							'.strftime('%B %Y', mktime(0, 0, 0, $month, 1, $year)).'
						</span>      
					</div>
				</td>
			</tr>	
		</table>';		

        include "menu.php";     
    } else
    if((isset($_GET['action']) && $_GET['action'] == 'next') || (isset($_GET['action']) && $_GET['action'] == 'nextTahun')) {
        setlocale(LC_TIME, 'id_ID');
		echo '<table width="100%" style="text-align: center; border: 0px;">
			<tr>
				<td width="100%" style="text-align: left; border: 0px;">  
					<div  style="background-color: #664d00; height: 50px; display: flex; align-items: center; justify-content: center; width:100%;">   
						<span style="font-size:30px; text-shadow:0px 1px 1px #444; font-family: Times; font-style: italic; color:#ffffff; text-align: center;">
							'.strftime('%B %Y', mktime(0, 0, 0, $month, 1, $year)).'
						</span>      
					</div>
				</td>
			</tr>	
		</table>';			

        include "menu.php";     
    } else {
		echo '<table width="100%" style="text-align: center; border: 0px;">
			<tr>
				<td width="100%" style="text-align: left; border: 0px;">  
					<div  style="background-color: #664d00; height: 50px; display: flex; align-items: center; justify-content: center; width:100%;">   
						<span style="font-size:20px; text-shadow:0px 1px 1px #444; font-family: Times; font-style: italic; color:#ffffff; text-align: center;">
							<script type=text/javascript>tulis_Tanggal(2);</script>
						</span>      
					</div>
				</td>               
			</tr>	
		</table>';	
		include "menu.php";
	}
		// memanggil fungsi draw_calendar untuk menampilkan kalender
		echo draw_calendar_islamic($month,$year); 
		echo "</center>";
?>
	
	<script>		
		// menangkap perintah keyboard
		document.addEventListener("keydown", function(event) {
		  // jika tombol kanan ditekan
		  if (event.code === "ArrowRight") {
			// kirim perintah untuk mengklik tombol <next>
			document.querySelector('.arrow-kanan').parentElement.click();
		  }
		  
		  // jika tombol kiri ditekan
		  if (event.code === "ArrowLeft") {
			// kirim perintah untuk mengklik tombol <previous>
			document.querySelector('.arrow-kiri').parentElement.click();
		  }
		});
	</script>
	
	<div class="dialog-box" id="dialog-box">
		<?php
		  include "inputkalender.php";
		?>
		<button onclick="hideDialog()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showDialog() {
			document.getElementById("dialog-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideDialog() {
			document.getElementById("dialog-box").style.display = "none";
		}
	</script>   
	
	<div class="konversi-box" id="konversi-box">
		<?php
		  include "h2m.php";
		?>
		<button onclick="hideKonversi()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showKonversi() {
			document.getElementById("konversi-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideKonversi() {
			document.getElementById("konversi-box").style.display = "none";
		}
	</script>  	

	<div class="hari-box" id="hari-box">
		<?php
		  include "hitunghari.php";
		?>
		<button onclick="hideHari()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showHari() {
			document.getElementById("hari-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideHari() {
			document.getElementById("hari-box").style.display = "none";
		}
	</script> 

	<div class="ketanggal-box" id="ketanggal-box">
		<?php
		  include "ketanggal.php";
		?>
		<button onclick="hideKetanggal()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showKetanggal() {
			document.getElementById("ketanggal-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideKetanggal() {
			document.getElementById("ketanggal-box").style.display = "none";
		}
	</script> 

	<div class="info-box" id="info-box">
		<?php
		  include "info.php";
		?>
		<button onclick="hideInfo()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showInfo() {
			document.getElementById("info-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideInfo() {
			document.getElementById("info-box").style.display = "none";
		}
	</script>


	<div class="moonsun-box" id="moonsun-box">
		<?php
		  include "moon-sun.php";
		?>
		<button onclick="hideMoonsun()">Tutup</button>
	</div>
	<script>
		// Fungsi untuk menampilkan dialog box
		function showMoonsun() {
			document.getElementById("moonsun-box").style.display = "block";
		}

		// Fungsi untuk menyembunyikan dialog box
		function hideMoonsun() {
			document.getElementById("moonsun-box").style.display = "none";
		}
	</script> 

	<center>                  
		<p style="text-align: center;">       
			<span style="text-align: center; font-size: 15px;">Copyleft (ɔ) Kasmui, ChatGPT, Chatbot Bing & Bard Google, 2023. All Wrongs Reserved.</span>
		</p>
		<span style="color: white;"><small>Hit counts : <?php include("counter.php");?> </small></span>
	</center>
<br/><br/> 
</body>
<div style="all: initial;"></div>
</html>