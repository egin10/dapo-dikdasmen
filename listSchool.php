#!/usr/bin/php
<?php
/**
 * https://github.com/egin10/dapo-dikdasmen
 * Get Data List of School from url
 * url : http://dapo.dikdasmen.kemdikbud.go.id/sp
 */

require_once __DIR__."/src/func.php";
date_default_timezone_set("Asia/Jakarta");

//init class
$getData = new GetData;

//get list school
$kd_region_subDist = 166005;
$urlSchool = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/progresSP?id_level_wilayah=3&kode_wilayah=".$kd_region_subDist."&semester_id=20182&bentuk_pendidikan_id=";
$listSchool = $getData->getSchool($urlSchool);
foreach ($listSchool as $key => $sch) {
	echo ($key+1).". ".$sch['npsn']." ".$sch['name']." ".$sch['sub_district']."\n";
}