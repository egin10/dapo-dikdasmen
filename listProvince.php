#!/usr/bin/php
<?php
/**
 * https://github.com/egin10/dapo-dikdasmen
 * Get Data List of Province from url
 * url : http://dapo.dikdasmen.kemdikbud.go.id/sp
 */

require_once __DIR__."/src/func.php";
date_default_timezone_set("Asia/Jakarta");

//init class
$getData = new GetData;

//get list province
$urlProvince = "http://dapo.dikdasmen.kemdikbud.go.id/rekap/dataSekolah?id_level_wilayah=0&kode_wilayah=000000&semester_id=20182";
$listProvince = $getData->getProvince($urlProvince);
foreach ($listProvince as $key => $prov) {
	echo ($key+1).". ".$prov['name']."\n";
}