<!doctype html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<title>GÜVENLİK DOĞRULAMASI</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



	<style>
		body {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}

		.frm {
			display: none;
		}
	</style>


</head>

<body class="p-3 mb-2 bg-dark text-white">

	<br>

	<strong>
		GÜVEVLİK DOĞRULAMASI
	</strong>
	<div><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
			<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
		</svg><button class="btn btn-info" onclick="gizleGoster()">GÜVENLİK DOĞRULMASI</button>
	</div>
	<div id="gls" class="frm">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div style='margin:15px' class="p-3 mb-2 bg-dark text-white">

				<img src="captcha.php" id="capt">
				<input class="btn btn-info" type=button onClick=reload(); value='Tekrar Gönder'>

			</div>


			<input type="text" name="deger" />
			<input class="btn btn-info" type="submit" value="Giriş" name="submit" />
		</form>

		<div style='margin-top:5px'></div>
		<?php


		session_start();
		// Kullanıcı bir captcha verdiyse!
		if (isset($_POST['deger']))

			// Captcha geçerliyse
			if ($_POST['deger'] == $_SESSION['captcha'])
				echo "<script LANGUAGE='JavaScript'>
             window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/otomasyon.php'; 
            </script>";
			else if ($_POST['deger'] == "")
				echo "<script LANGUAGE='JavaScript'>
			window.alert('GÜVENLIK BOS GİRDİNİZ');
             
            </script>";
			else
				echo "<script LANGUAGE='JavaScript'>
			window.alert('GÜVENLIK KODU YANLIS');
             
            </script>"

		?>
	</div>


	<script type="text/javascript">
		function reload() {
			img = document.getElementById("capt");
			img.src = "captcha.php"
		}
	</script>
	<script>
		function gizleGoster() {
			let x = document.getElementById("gls");
			if (1) {
				x.style.display = "block";
			}
		}
	</script>


</body>

</html>