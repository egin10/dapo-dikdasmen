#!/usr/bin/php
<?php
/**
 * https://github.com/egin10/dapo-dikdasmen
 * Get Data List of Districts from url
 * url : http://dapo.dikdasmen.kemdikbud.go.id/sp
 */

require_once __DIR__."/src/func.php";
date_default_timezone_set("Asia/Jakarta");

//init class
$getData = new GetData;

//get list districts
$kd_region_prov = 160000;
$urlDistricts = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=1&kode_wilayah=".$kd_region_prov."&semester_id=20182";
$listDistricts = $getData->getDistricts($urlDistricts);
foreach ($listDistricts as $key => $dist) {
	echo ($key+1).". ".$dist['name']."\n";
}