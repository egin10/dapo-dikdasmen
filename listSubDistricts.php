#!/usr/bin/php
<?php
/**
 * https://github.com/egin10/dapo-dikdasmen
 * Get Data List of Sub-Districts from url
 * url : http://dapo.dikdasmen.kemdikbud.go.id/sp
 */

require_once __DIR__."/src/func.php";
date_default_timezone_set("Asia/Jakarta");

//init class
$getData = new GetData;

//get list sub-districts
$kd_region_dist = 166000;
$urlSubDistricts = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=2&kode_wilayah=".$kd_region_dist."&semester_id=20182";
$listSubDistricts = $getData->getSubDistricts($urlSubDistricts);
foreach ($listSubDistricts as $key => $subDist) {
	echo ($key+1).". ".$subDist['name']."\n";
}