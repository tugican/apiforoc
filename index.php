<?php
include("functions.php");
header ("content-type: text/xml");
echo('<'.'?xml version="1.0" encoding="utf-8"'.'?'.'>');
?>
<<?= $_GET["d"]; ?>>
<?php
$sorgu = mysql_query("select * from ".$_GET["d"]." ");
while($oku = mysql_fetch_assoc($sorgu))
{
  $array = array_filter($oku);
	$test = arrayToXml($array);
	$xmlString = str_replace("<?xml version=\"1.0\"?>\n", '', $test);
	$xmlString2 = str_replace(" ", '', $xmlString);
	echo $xmlString;
}
?>

</<?= $_GET["d"]; ?>>
