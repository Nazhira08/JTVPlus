<?php

// Include the upload handler class
require_once "handler.php";
$uploader = new UploadHandler();
$No_berita="";
if (isset($_GET["so_id"])) $so_id= $_GET["so_id"];

// Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
$uploader->allowedExtensions = array(); // all files types allowed by default

// Specify max file size in bytes.
$uploader->sizeLimit = null;

// Specify the input name set in the javascript.
$uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default

// If you want to use the chunking/resume feature, specify the folder to temporarily save parts.
$uploader->chunksFolder = "/home/triman/andhika/Joomla_3.8.1-Stable-Full_Package/JMMC/assets/so/chunks";

$method = get_request_method();

$path_reporter="/home/triman/andhika/Joomla_3.8.1-Stable-Full_Package/JMMC/assets/so";
$folder = $path_reporter."/".date("Y")."/".date("m")."/".date("d")."/";
$cek1=$path_reporter;
If(!file_exists($cek1)) 
    {
        mkdir($cek1); 
    }
    $cek1 = $path_reporter."/".date("Y");
    If(!file_exists($cek1)) 
    {
        mkdir($cek1); 
    }
    $cek1 = $path_reporter."/".date("Y")."/".date("m");
    If(!file_exists($cek1)) 
    {
        mkdir($cek1);
    }
    $cek1 = $path_reporter."/".date("Y")."/".date("m")."/".date("d");
    If(!file_exists($cek1)) 
    {
        mkdir($cek1); 
    }

// This will retrieve the "intended" request method.  Normally, this is the
// actual method of the request.  Sometimes, though, the intended request method
// must be hidden in the parameters of the request.  For example, when attempting to
// delete a file using a POST request. In that case, "DELETE" will be sent along with
// the request in a "_method" parameter.
function get_request_method() {
    global $HTTP_RAW_POST_DATA;

    if(isset($HTTP_RAW_POST_DATA)) {
    	parse_str($HTTP_RAW_POST_DATA, $_POST);
    }

    if (isset($_POST["_method"]) && $_POST["_method"] != null) {
        return $_POST["_method"];
    }

    return $_SERVER["REQUEST_METHOD"];
}

if ($method == "POST") {
    header("Content-Type: text/plain");

    // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
    // For example: /myserver/handlers/endpoint.php?done
    if (isset($_GET["done"])) {
        $result = $uploader->combineChunks($folder);
    }
    // Handles upload requests
    else {
        // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
        $result = $uploader->handleUpload($folder,$so_id);

        // To return a name used for uploaded file you can use the following line.
        $result["uploadName"] = $uploader->getUploadName();
    }

    echo json_encode($result);
}
// for delete file requests
else if ($method == "DELETE") {
    //$result = $uploader->handleDelete($folder,$No_berita);
    $result = $uploader->handleDelete($folder);
    echo json_encode($result);
}
else {
    header("HTTP/1.0 405 Method Not Allowed");
}
?>