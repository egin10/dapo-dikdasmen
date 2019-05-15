#!/usr/bin/php
<?php
/**
 * https://github.com/egin10/dapo-dikdasmen
 * Get Data List of School in Province
 * url : http://dapo.dikdasmen.kemdikbud.go.id/sp
 */

require_once __DIR__."/src/func.php";
date_default_timezone_set("Asia/Jakarta");

//init class
$getData = new GetData;

$prov_name = $kd_prov = '';

//get list province
$urlProvince = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=0&kode_wilayah=000000&semester_id=20182";
$listProvince = $getData->getProvince($urlProvince);
foreach ($listProvince as $key => $prov) {
	if($key == $argv[1]-1) {
		echo ($key+1).". ".$prov['name']."\n";
		
		$prov_name = $prov['name'];
		$kd_prov = $prov['kd_region_prov'];
	}
}

//get list districts
$kd_region_prov = $kd_prov;
$urlDistricts = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=1&kode_wilayah=".$kd_region_prov."&semester_id=20182";
$listDistricts = $getData->getDistricts($urlDistricts);
foreach ($listDistricts as $key => $dist) {
	// echo ($key+1).". ".$dist['name']." ".$dist['kd_region_dist']."\n";

	//get list sub-districts
	$kd_region_dist = $dist['kd_region_dist'];
	$urlSubDistricts = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=2&kode_wilayah=".$kd_region_dist."&semester_id=20182";
	$listSubDistricts = $getData->getSubDistricts($urlSubDistricts);
	foreach ($listSubDistricts as $key => $subDist) {
		echo "\t".($key+1).". ".$subDist['name']." ".$subDist['kd_region_subDist']."\n";

		//get list school
		$kd_region_subDist = $subDist['kd_region_subDist'];
		$urlSchool = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/progresSP?id_level_wilayah=3&kode_wilayah=".$kd_region_subDist."&semester_id=20182&bentuk_pendidikan_id=";
		$listSchool = $getData->getSchool($urlSchool);
		foreach ($listSchool as $key => $sch) {
			echo "\t\t".($key+1).". ".$sch['npsn']." ".$sch['name']." ".$sch['sub_district']."\n";
		}
	}
}