<?php

function updateProfilePicture($userName, $db)
{
    // Twitter API v2 endpoint for user lookup
    $url = 'https://api.twitter.com/2/users/by/username/' . $userName;

    // Twitter API v2 uses Bearer Token for authentication
    $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAI3kGwAAAAAAZMI6F56%2F3BH1prmvINMbJZlapd4%3D78X7yrq9yclGBDrd31887WWiuFMTJ0YKUfRuDjBGwuqcscHKlQ';  // Set your Bearer Token here


    $headers = [
        "Authorization: Bearer $bearerToken",
    ];

    // Initialize cURL to make API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    // Perform the request and decode the JSON response
    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);

//var_dump($json);

    // Check if we got a valid response
    if (isset($json->data) && isset($json->data->profile_image_url)) {
        $imgLink = str_replace('_normal', '', $json->data->profile_image_url);  // Remove '_normal' from image URL
    } else {
        return '';  // Return empty if the profile image URL is not found
    }

	return $imgLink;
    // Update the user's profile image URL in the database
    $sql = "UPDATE twitter_users SET img_link = ? WHERE username = ?";
    $query = $db->prepare($sql);
    $query->execute([$imgLink, $userName]);

    return $imgLink;
}

function DownloadImageFromUrl($imagepath)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_URL, $imagepath);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function profilePicture($screenName)
{
    try {
        // Twitter API v2 endpoint for user lookup
        $url = 'https://api.twitter.com/2/users/by/username/' . $screenName;

        // Twitter API v2 uses Bearer Token for authentication
        $bearerToken = 'AAAAAAAAAAAAAAAAAAAAAI3kGwAAAAAAZMI6F56%2F3BH1prmvINMbJZlapd4%3D78X7yrq9yclGBDrd31887WWiuFMTJ0YKUfRuDjBGwuqcscHKlQ';  // Set your Bearer Token here
        $headers = [
            "Authorization: Bearer $bearerToken",
        ];

        // Initialize cURL to make API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        // Perform the request and decode the JSON response
        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response);

        // Check if we got a valid response
        if (isset($json->data) && isset($json->data->profile_image_url)) {
            // Profile image URL
            $profileImageUrl = str_replace('_normal', '', $json->data->profile_image_url); // Remove '_normal'

            // Download image
            $imageContent = DownloadImageFromUrl($profileImageUrl);
            $saveFile = fopen('download/' . $screenName . '.png', 'w');
            fwrite($saveFile, $imageContent);
            fclose($saveFile);

            return $profileImageUrl;
        } else {
            return '';  // Return empty if no profile image found
        }
    } catch (Exception $e) {
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

$imgLink = updateProfilePicture("FTfundraiser", null);

echo $imgLink;

