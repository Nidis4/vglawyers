<?php
include 'functions.php';

$law_id = $_POST['id'];;
$name_el = $_POST['name_el'];
$name_en = $_POST['name_en'];
$surname_el = $_POST['surname_el'];
$surname_en = $_POST['surname_en'];
$email = $_POST['email'];
$cv_el = $_POST['cv_el'];
$cv_en = $_POST['cv_en'];
$expert1_el = $_POST['expert1_el'];
$expert1_en = $_POST['expert1_en'];
$expert2_el = $_POST['expert2_el'];
$expert2_en = $_POST['expert2_en'];
$expert3_el = $_POST['expert3_el'];
$expert3_en = $_POST['expert3_en'];
$expert4_el = $_POST['expert4_el'];
$expert4_en = $_POST['expert4_en'];
$metatitle_el = $_POST['metatitle_el'];
$metatitle_en = $_POST['metatitle_en'];
$metadesc_el = $_POST['metadesc_el'];
$metadesc_en = $_POST['metadesc_en'];
$metakey_el = $_POST['metakey_el'];
$metakey_en = $_POST['metakey_en'];
$title_el = $_POST['title_el'];
$title_en = $_POST['title_en'];


updateLawyer($law_id, $name_el, $name_en, $surname_el, $surname_en, $email, $cv_el, $cv_en, $expert1_el, $expert1_en, $expert2_el, $expert2_en, $expert3_el, $expert3_en, $expert4_el, $expert4_en, $metatitle_el, $metatitle_en, $metadesc_el, $metadesc_en, $metakey_el, $metakey_en, $title_el, $title_en);

echo "Data Updated";
?>