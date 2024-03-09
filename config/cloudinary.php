<?php

require '../vendor/autoload.php';

use Cloudinary\Configuration\Configuration;

require_once '../config/credentials.php';

$config = Configuration::instance("cloudinary://146619838248574:lBzuGJ9iFwUXOFl-t_NL26AHDdI@the-proton-guy?secure=true");
// $config->cloud->cloudName = get_cloudinary_credentials()["cloud_name"];
// $config->cloud->apiKey = get_cloudinary_credentials()["api_key"];
// $config->cloud->apiSecret = get_cloudinary_credentials()["api_secret"];
// $config->url->secure = true;

use Cloudinary\Api\Upload\UploadApi;

function upload_file($file) {
    $new_upload = new UploadApi();
    $response = $new_upload->upload($file);

    $url = $response['secure_url'];

    return $url;
}