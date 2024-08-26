<?php 
// Accessing details in separate JSON file
$json_info = file_get_contents('data/info.json');
$info = json_decode($json_info, true);

// About Section

// Biography
$biography1 = $info['about']['biography1'];
$biography2 = $info['about']['biography2'];
$biography3 = $info['about']['biography3'];
$biography4 = $info['about']['biography4'];

// Bio 
$aboutZipCode = $info['about']['about-zip-code'];
$aboutCountry = $info['about']['about-country'];
$aboutCourse = $info['about']['about-course'];
$aboutAge = $info['about']['about-age'];
$aboutExp = $info['about']['about-exp'];
$aboutCurrentUniversity = $info['about']['about-current-university'];

// Accessing the skills object
$skills = $info['about']['skills'];
$education = $info['about']['education'];
$experience = $info['about']['experience'];

// Services Section
$services = $info['services'];

// Contact Section
$contact = $info['contact'];