<?php

$filename = $_POST['filename'];
$filelocation = $_POST['filelocation'];
require "zipstream.php";

$zip = new ZipStream("source_code.zip");
$zip->add_file_from_path('js/impress.js', 'view/js/impress.js');
$zip->add_file_from_path('css/impress-demo.css', 'view/css/impress-demo.css');
$zip->add_file_from_path($filename, $filelocation);

$zip->finish();





