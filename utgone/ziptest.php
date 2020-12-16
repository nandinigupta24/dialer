<?php
echo "zip testing";
$files = array(
    'https://www.hecmo.com/media/wysiwyg/HIMALAYA_2.jpg',
    'https://www.hecmo.com/media/wysiwyg/loreal_3.jpg',
);

# create new zip object
$zip = new ZipArchive();

# create a temp file & open it
$tmp_file = tempnam('.', '');
$zip->open($tmp_file, ZipArchive::CREATE);

# loop through each file
foreach ($files as $file) {
    # download file
    $download_file = file_get_contents($file);

    #add it to the zip
    $zip->addFromString(basename($file), $download_file);
}

# close zip
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename="my file.zip"');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);
 ?>
