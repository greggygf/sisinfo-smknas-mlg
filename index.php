<!doctype html>
<html>

<head>
	<title>Login Sisinfo</title>
	<link href='logo/smk.png' rel='SHORTCUT ICON' />
</head>

<index>
	<link rel="stylesheet" type="text/css" href="css/style2.css" />

	<body background="wallpaper/wallpaper.png">
		<center>
			<font size="19px" face="Bebas Neue" color="white">LOG IN<br></font>
			<br>

			<form action="cekLogin.php" method="post" class="expose">
				<fieldset>
					<br>
					<img src="logo/smknasional.png" width="150" height="150">
					<br><br>
					<input type="text" size="25px" name="username" maxlength="10" placeholder="Inputkan Username" required><br /><br>
					<input type="password" size="25px" name="password" id="password" maxlength="10" placeholder="Inputkan Password" required><br /><br />
					<input type="submit" class="tombol" name="login" value="" style="background-image:url(logo/tick.png); background-position:center; background-size:8%; background-repeat:no-repeat;">
					<br><br>
				</fieldset>
			</form>
		</center>
	</body>
</index>

</html>