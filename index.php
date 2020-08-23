<?php
$UWAMPFOLDER="";
if (isset($_REQUEST['getimg']))
{
	$IMAGE_FOLDER="iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGrSURBVDjLxZO7ihRBFIa/6u0ZW7GHBUV0UQQTZzd3QdhMQxOfwMRXEANBMNQX0MzAzFAwEzHwARbNFDdwEd31Mj3X7a6uOr9BtzNjYjKBJ6nicP7v3KqcJFaxhBVtZUAK8OHlld2st7Xl3DJPVONP+zEUV4HqL5UDYHr5xvuQAjgl/Qs7TzvOOVAjxjlC+ePSwe6DfbVegLVuT4r14eTr6zvA8xSAoBLzx6pvj4l+DZIezuVkG9fY2H7YRQIMZIBwycmzH1/s3F8AapfIPNF3kQk7+kw9PWBy+IZOdg5Ug3mkAATy/t0usovzGeCUWTjCz0B+Sj0ekfdvkZ3abBv+U4GaCtJ1iEm6ANQJ6fEzrG/engcKw/wXQvEKxSEKQxRGKE7Izt+DSiwBJMUSm71rguMYhQKrBygOIRStf4TiFFRBvbRGKiQLWP29yRSHKBTtfdBmHs0BUpgvtgF4yRFR+NUKi0XZcYjCeCG2smkzLAHkbRBmP0/Uk26O5YnUActBp1GsAI+S5nRJJJal5K1aAMrq0d6Tm9uI6zjyf75dAe6tx/SsWeD//o2/Ab6IH3/h25pOAAAAAElFTkSuQmCC";
		
	switch ($_GET['getimg'])
    {
		case 'folder' :        
			header("Content-type: image/png");
			echo base64_decode($IMAGE_FOLDER);
        break;
		case 'title' :        
			header("Content-type: image/png");
			echo base64_decode($IMAGE_TITLE);
        break;
		case 'favicon' :        
			header("Content-type: image/x-icon");
			echo base64_decode($IMAGE_FAVICON);
        break;
	}	
	exit();
}

?>

<html>
<head>
<title>Folders</title>
<link rel="shortcut icon" type="image/x-icon" href="./?getimg=favicon" /> 
<style type="text/css"> 

a
{
	color: #014579; 
	text-decoration: none;	
}
 
.afolder
{
	color: #014579;
	font-weight:bold; 
	background: url(./?getimg=folder) no-repeat left;
	padding-left:30px;
}

 

</style> 

</head>
<body>
 
<?php
$handle=opendir($UWAMPFOLDER."./");
$count=0;
while ($file = readdir($handle)) 
{
	if ($file=="." || $file=="..") continue;
	if (is_dir($file))
	{		
		$count++;
		echo "<ol><a class=\"afolder\" href=\"/$file\">$file</a></ol>";
	}
}
closedir($handle);
if ($count==0)
{
	echo "No project found";
}
?>




</body>
</html>