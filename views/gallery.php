<?php

return showImages();

function showImages(){
    $out = "<h1>Image Gallery</h1>";
    $out .= "<ul id='images'>";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder );
    while ( $filesInFolder->valid() ) {  // является ли текущий элемент DirectoryIterator допустимым файлом
        $file = $filesInFolder->current(); //Возвращает текущий элемент
        $filename = $file->getFilename();  //Возвращает имя файла текущего элемента
        $src = "$folder/$filename";
        $fileInfo = new Finfo( FILEINFO_MIME_TYPE );
        $mimeType = $fileInfo->file( $src );

        if ( $mimeType === 'image/jpeg' ) {
            $out .= "<li><img src='$src' /></li>";
        }
        $filesInFolder->next();  //Перемещает указатель на следующий элемент
    }
    $out .= "</ul>";
    return $out;
}