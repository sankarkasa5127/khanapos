<?php
$dir = "KhanaCRM/KASSE_RECHNUNGEN/jpg";
$name = $_POST['name'];
$filename = $dir."/".$name.".jpg";
echo $filename;
//if (file_exists($filename)) {
	if(unlink($filename)) {
		echo "Updated image $name.jpg";
	 } else {
    echo "Image $name.jpg not updated";
}
?>