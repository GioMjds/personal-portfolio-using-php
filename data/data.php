<?php 
// Accessing details in separate JSON file
$json_info = file_get_contents('data/info.json');
$info = json_decode($json_info, true);

$aboutName = $info['about']['about-name'];
$aboutEmail = $info['about']['about-email'];
$aboutAddress = $info['about']['about-address'];
$aboutPhone = $info['about']['about-phone'];
$aboutAge = $info['about']['about-age'];
$aboutExp = $info['about']['about-exp'];

$biography1 = $info['about']['biography1'];
$biography2 = $info['about']['biography2'];
$biography3 = $info['about']['biography3'];
$biography4 = $info['about']['biography4'];

$skills = $info['about']['skills'];
$education = $info['about']['education'];
$experience = $info['about']['experience'];

$services = $info['services'];
$contact = $info['contact'];