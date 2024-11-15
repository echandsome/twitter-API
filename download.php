<?php



function DownloadImageFromUrl($imagepath)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch,CURLOPT_URL, $imagepath);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result=curl_exec($ch);
curl_close($ch);
return $result;
}



$imagecontent =DownloadImageFromUrl("http://zetwet.com/blog/wp-content/uploads/2015/05/Flowers-Wallpapers.jpg");
$savefile = fopen('download/myimage.png', 'w');
fwrite($savefile, $imagecontent);
fclose($savefile);


?>