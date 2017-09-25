<?php
include 'functions.php';

$title_el = $_POST['addtitle_el'];;
$title_en = $_POST['addtitle_en'];
$media_el = $_POST['addmedia_el'];
$media_en = $_POST['addmedia_en'];
$lawyerid = $_POST['addlawyerid'];

addPublication($title_el, $title_en, $media_el, $media_en, $lawyerid);

echo "Publication Added";
?>