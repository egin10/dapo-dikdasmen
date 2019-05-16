<?php

/**
 * https://github.com/egin10
 * Class GetData
 */

class GetData
{
    public function getProvince(String $url)
    {
        $ch = curl_init($url);
		curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
		$get = curl_exec($ch);
		$listProvince = json_decode($get);
		curl_close($ch);
		
		$result = [];
		foreach ($listProvince as $prov) {
			$result[] = [
				'name' => trim($prov->nama),
				'kd_region_prov' => trim($prov->kode_wilayah),
				'semester_id' => 20182
			];
		}
		unset($getData);

		return $result;
    }

    public function getDistricts(String $url)
    {
        $ch = curl_init($url);
		curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
		$get = curl_exec($ch);
		$listDistricts = json_decode($get);
		curl_close($ch);
		
		$result = [];
		foreach ($listDistricts as $dist) {
			$result[] = [
				'name' => trim($dist->nama),
				'kd_region_dist' => trim($dist->kode_wilayah),
				'semester_id' => 20182
			];
		}
		unset($getData);

		return $result;
    }

    public function getSubDistricts(String $url)
    {
        $ch = curl_init($url);
		curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
		$get = curl_exec($ch);
		$listSubDistricts = json_decode($get);
		curl_close($ch);
		
		$result = [];
		foreach ($listSubDistricts as $subDist) {
			$result[] = [
				'name' => trim($subDist->nama),
				'kd_region_subDist' => trim($subDist->kode_wilayah),
				'semester_id' => 20182
			];
		}
		unset($getData);

		return $result;
    }

    public function getSchool(String $url)
    {
        $ch = curl_init($url);
		curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
		$get = curl_exec($ch);
		$listSchool = json_decode($get);
		curl_close($ch);
		
		$result = [];
		foreach ($listSchool as $sch) {
			$result[] = [
				'npsn' => trim($sch->npsn),
				'name' => trim($sch->nama),
				'district' => trim($sch->induk_kabupaten),
				'sub_district' => trim($sch->induk_kecamatan),
				'semester_id' => 20182
			];
		}
		unset($getData);

		return $result;
    }
}