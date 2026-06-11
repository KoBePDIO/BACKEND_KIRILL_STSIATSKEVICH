<html>
	<head>
	<title>FileSystemObject</title>
	</head>
	<body>
	<?php
	  
	// Открыть папку
	$folder = opendir("C:/OSPanel/home/KirillSyte/5/tutorials/php/");
	// Цикл по всем файлам папки
	while (($entry = readdir($folder)) != "") {
	   echo $entry . "<br />";
	}
	// Закрыть папку
	$folder = closedir($folder);
	?>
	</body>
	</html>
