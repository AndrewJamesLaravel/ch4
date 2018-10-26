<?php

$newImageSubmitted = isset( $_POST['new-image']);
if ( $newImageSubmitted ) {
    $output = upload();
} else {
    $output = include_once "views/upload-form.php";
}
return $output;

function upload() {
    include_once "classes/Uploader.class.php";
    $uploader = new Uploader( "image-data" );
    $uploader->saveIn( "img" );
    $fileUploaded = $uploader->save();
    if ( $fileUploaded ) {
        $out = "new file uploaded";
    } else {
        $out = "something went wrong";
    }
    /*$out = "<pre>";
    $out .= print_r($_FILES, true);
    $out .= "</pre>";*/
    return $out;
}