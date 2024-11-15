<?php

function updateProfilePicture($userName,$db){
	$url = 'https://api.twitter.com/1.1/users/show.json';
	$getField = '?screen_name=' . $userName;
	$twitter = new TwitterAPIExchange(include 'config.php');
	$json = json_decode($twitter->setGetField($getField)->buildOAuth($url, 'GET')->performRequest());
	$imgLink = str_replace('_normal', '', $json->profile_image_url);

	$sql = "UPDATE twitter_users
        SET img_link = ?
        WHERE username =?";


	$query = $db->prepare($sql);
	$query->execute([$imgLink,$userName]);

	return $imgLink;
}


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


function profilePicture($screenName)
{

	try
	{
		$url = 'https://api.twitter.com/1.1/users/show.json';
		$getField = '?screen_name=' . $screenName;
		$twitter = new TwitterAPIExchange(include 'config.php');
		$json = json_decode($twitter->setGetField($getField)->buildOAuth($url, 'GET')->performRequest());

		var_dump($json);


$imagecontent =DownloadImageFromUrl(str_replace('_normal', '', $json->profile_image_url));
$savefile = fopen('download/'.$screenName.'.png', 'w');
fwrite($savefile, $imagecontent);
fclose($savefile);


		return str_replace('_normal', '', $json->profile_image_url);



	}
	catch(Exception $e)
	{
		var_dump($e);
		return '';
	}

}

function get(array $array, $index, $otherwise = null)
{
	return array_key_exists($index, $array) ? $array[$index] : $otherwise;
}


function checkExternalFile($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return $retCode;
}