//<?php
//function getTwitterProfileImage($username) {
//      $size = '_bigger';
//      $api_call = 'http://twitter.com/users/show/'.$username.'.json';
//      $results = json_decode(file_get_contents($api_call));
//      return str_replace('_normal', $size, $results->profile_image_url);
//}
//$img =  getTwitterProfileImage('xpedialanka');
//echo '<img src="'.$img.'"/>';
//
// ?>
 
 
 <?php
 
 
 $username01 = "xpedialanka";
 
 ?>
 
<img src="https://api.twitter.com/1/users/profile_image?screen_name=<?php echo $username01; ?>$size=bigger" alt="xpedialanka"/>