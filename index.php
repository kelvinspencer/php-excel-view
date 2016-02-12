<?php
//ini_set('memory_limit', '256M');
@require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('file.xls');
error_reporting(0);

echo "
<table width='' align='center' id='' cellpadding='0' cellspacing='0'>

	";

for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	
	if(empty($data->sheets[0]['cells'][$i][1])){
		continue;
	}
	
	//Aisle
	$product_name = $data->sheets[0]['cells'][$i][3];
	$sku = $data->sheets[0]['cells'][$i][4];
	$piece_per_unit = $data->sheets[0]['cells'][$i][5];



	$oursku = $data->sheets[0]['cells'][$i][13];

	echo "
	<tr class='newpage'><td colspan='2'>$product_name</td></tr>
	<tr><td>$sku</td><td>$oursku</td></tr>
	<tr><td>$piece_per_unit</td><td>$piece_per_unit</td></tr>
";
				

}

			



echo "</table>";

?>
<style>
	td{
		text-align:center;	
	}
</style>