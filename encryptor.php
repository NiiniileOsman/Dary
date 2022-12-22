<?php
	$ereyFure = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="img/icon.png" type="img/icon">
		<title>Encryption Application</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Main CSS-->
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

		<form method="POST">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 bg-success text-light">
						<h2 class="text-center">Encrypt & Decrypt Words</h2>
					</div>
				</div>
				<div class="row pt-5">
					<div class="col-md-2">
						<label>Word To Encrypt</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="txtEncrypt" id="txtEncrypt" autocomplete="off" required/>
					</div>
					<div class="col-md-2">
						<button type="submit" name="btnEncrypt" class="btn btn-primary col-md-12">Encrypt</button>
					</div>
				</div>
			</div>
		</form>
		
		<?php
			if (isset($_POST['btnEncrypt'])) {
				$word_to_encrypt = $_POST['txtEncrypt'];
				$encryption_key = base64_decode($ereyFure);
				$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
				$encrypted = openssl_encrypt($word_to_encrypt, 'aes-256-cbc', $encryption_key, 0, $iv);
				?>
					<div class="container-fluid">
						<div class="row pt-2">
							<div class="col-md-2">
								&nbsp;
							</div>
							<div class="col-md-8">
								<b><?php echo base64_encode($encrypted . '::' . $iv); ?></b>
							</div>
							<div class="col-md-2">
								&nbsp;
							</div>
						</div>
					</div>
					
				<?php	
			}
		?>

		<br />
		
		<form method="POST">
			<div class="container-fluid">
				<div class="row pt-5">
					<div class="col-md-2">
						<label>Word To Decrypt</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="txtDecrypt" id="txtDecrypt" autocomplete="off" required/>
					</div>
					<div class="col-md-2">
						<button type="submit" name="btnDecrypt" class="btn btn-danger col-md-12">Decrypt</button>
					</div>
				</div>
			</div>
		</form>

		<?php
			if (isset($_POST['btnDecrypt'])) {
				$word_to_decrypt = $_POST['txtDecrypt'];
				$encryption_key = base64_decode($ereyFure);
				list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($word_to_decrypt), 2),2,null);
				?>
					<div class="container-fluid">
						<div class="row pt-2">
							<div class="col-md-2">
								&nbsp;
							</div>
							<div class="col-md-8">
								<b><?php echo openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv); ?></b>
							</div>
							<div class="col-md-2">
								&nbsp;
							</div>
						</div>
					</div>
				<?php	
			}
		?>

	</body>
</html>