<?php
define('PI',3.1415926535898);
define('EARTH_RADIUS',6378.137);
//计算范围，可以做搜索用户
function GetRange($lat,$lon,$raidus){
  //计算纬度
  $degree = (24901 * 1609) / 360.0;
  $dpmLat = 1 / $degree;
  $radiusLat = $dpmLat * $raidus;
  $minLat = $lat - $radiusLat; //得到最小纬度
  $maxLat = $lat + $radiusLat; //得到最大纬度
  //计算经度
  $mpdLng = $degree * cos($lat * (PI / 180));
  $dpmLng = 1 / $mpdLng;
  $radiusLng = $dpmLng * $raidus;
  $minLng = $lon - $radiusLng; //得到最小经度
  $maxLng = $lon + $radiusLng; //得到最大经度
  //范围
  $range = array(
    'minLat' => $minLat,
    'maxLat' => $maxLat,
    'minLon' => $minLng,
    'maxLon' => $maxLng
  );
  return $range;
}
//获取2点之间的距离
function GetDistance($lng1,$lat1,$lng2,$lat2){
  $radLat1 = $lat1 * (PI / 180);
  $radLat2 = $lat2 * (PI / 180);
  $a = $radLat1 - $radLat2;
  $b = ($lng1 * (PI / 180)) - ($lng2 * (PI / 180));
  $s = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)));
  $s = $s * EARTH_RADIUS;
  $s = round($s * 10000) / 10000;
  return $s;
}
function distanceBetween( $fP1Lon,$fP1Lat, $fP2Lon, $fP2Lat){
    $fEARTH_RADIUS = 6378137;
    //角度换算成弧度
    $fRadLon1 = deg2rad($fP1Lon);
    $fRadLon2 = deg2rad($fP2Lon);
    $fRadLat1 = deg2rad($fP1Lat);
    $fRadLat2 = deg2rad($fP2Lat);
    //计算经纬度的差值
    $fD1 = abs($fRadLat1 - $fRadLat2);
    $fD2 = abs($fRadLon1 - $fRadLon2);
    //距离计算
    $fP = pow(sin($fD1/2), 2) +
          cos($fRadLat1) * cos($fRadLat2) * pow(sin($fD2/2), 2);
    return intval($fEARTH_RADIUS * 2 * asin(sqrt($fP)) + 0.5);
}