<?php
include 'functions.php';

$exp_id = $_POST['id'];;
$explain_el = $_POST['explain_el'];
$explain_en = $_POST['explain_en'];
$keimeno_el = $_POST['keimeno_el'];
$keimeno_en = $_POST['keimeno_en'];
$metatitle_el = $_POST['metatitle_el'];
$metatitle_en = $_POST['metatitle_en'];
$metadesc_el = $_POST['metadesc_el'];
$metadesc_en = $_POST['metadesc_en'];
$metakey_el = $_POST['metakey_el'];
$metakey_en = $_POST['metakey_en'];
$title_el = $_POST['title_el'];
$title_en = $_POST['title_en'];


updateExpertise($exp_id, $explain_el, $explain_en, $keimeno_el, $keimeno_en, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en);

echo "Data Updated";
?>