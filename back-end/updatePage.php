<?php
include 'functions.php';

$page = $_POST['page'];;

$metatitle_el = $_POST['metatitle_el'];
$metatitle_en = $_POST['metatitle_en'];
$metadesc_el = $_POST['metadesc_el'];
$metadesc_en = $_POST['metadesc_en'];
$metakey_el = $_POST['metakey_el'];
$metakey_en = $_POST['metakey_en'];
$title_el = $_POST['title_el'];
$title_en = $_POST['title_en'];
$keimeno_el = $_POST['keimeno_el'];
$keimeno_en = $_POST['keimeno_en'];
$tab1_el = $_POST['tab1_el'];
$tab1_en = $_POST['tab1_en'];
$tab2_el = $_POST['tab2_el'];
$tab2_en = $_POST['tab2_en'];
$tab3_el = $_POST['tab3_el'];
$tab3_en = $_POST['tab3_en'];
$tab4_el = $_POST['tab4_el'];
$tab4_en = $_POST['tab4_en'];

updatePage($page, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en, $keimeno_el, $keimeno_en, $tab1_el, $tab1_en, $tab2_el, $tab2_en, $tab3_el, $tab3_en, $tab4_el, $tab4_en);

echo "Data Updated";
?>