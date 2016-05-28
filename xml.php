<?php
ini_set( 'display_errors', 1 );
define('DB_DATABASE', 'googlemap_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'REkdEiww4');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);
try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $db->query("SELECT name, lat, lng FROM places");
  while($room = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $locate_ary[]=$room;
  }
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
//地点データ
//範囲データ取得
$ne_lat = $_GET["ne_lat"];
$sw_lat = $_GET["sw_lat"];
$ne_lng = $_GET["ne_lng"];
$sw_lng = $_GET["sw_lng"];
//出力
header('Content-type: text/xml; charset=utf-8');
echo '<?xml version="1.0" standalone="yes"?>';
echo "<Locations>";
foreach($locate_ary as $val){
    if(
        $val["lat"] < $ne_lat && 
        $val["lat"] > $sw_lat && 
        $val["lng"] < $ne_lng && 
        $val["lng"] > $sw_lng){
    echo "<Locate>";
    echo "<lat>".$val["lat"]."</lat>";
    echo "<lng>".$val["lng"]."</lng>";
    echo "<name>".$val["name"]."</name>";
    echo "</Locate>";
}
}
echo "</Locations>\n";
?>