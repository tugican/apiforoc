<?php
// connecting to opencart db for reading or writing data
// for that we use opencart config file
// you have to change if your config.php folder is different
if (is_file('../config.php')) {
  require_once('../config.php');
} else {
   echo "Config.php file doesn't exist";
   die();
}

$host = DB_HOSTNAME;
$user = DB_USERNAME;
$pwd = DB_PASSWORD;
$db = DB_DATABASE;
$conn = mysql_connect($host,$user,$pwd) or die("Sql auth error!!!".mysql_error());
mysql_select_db($db) or die("Db doesn't exist!!!".mysql_error());
mysql_query("SET NAMES utf8"); // set char

// converting html to xml function
function arrayToXml($array, $rootElement = null, $xml = null) {
  $_xml = $xml;

  if ($_xml === null) {
    $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<order/>');
  }

  foreach ($array as $k => $v) {
    if (is_array($v)) { //nested array
      arrayToXml($v, $k, $_xml->addChild($k));
    } else {
      $_xml->addChild($k, $v);
    }
  }

  return $_xml->asXML();

}
?>
