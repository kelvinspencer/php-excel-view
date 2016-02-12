<?php
//ini_set('memory_limit', '256M');
@require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('file.xls');
error_reporting(0);

echo "
<table id='tablebox' align='center' id='' cellpadding='0' cellspacing='0'>
	<tr><td width='50%'></td><td></td></tr>
	";

for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
	
	if(empty($data->sheets[0]['cells'][$i][13]) || empty($data->sheets[0]['cells'][$i][3])){
		continue;
	}
	
	//Aisle
	$product_name = $data->sheets[0]['cells'][$i][3];
	$sku = $data->sheets[0]['cells'][$i][4];
	$skutext = str_replace("-", "", $sku);
	$img = $data->sheets[0]['cells'][$i][4];
	$piece_per_unit = $data->sheets[0]['cells'][$i][5];
	$case_1 = "$".number_format($data->sheets[0]['cells'][$i][9],2);
	$case_5 = "$".number_format($data->sheets[0]['cells'][$i][11], 2);



	$oursku = $data->sheets[0]['cells'][$i][13];

	echo "
	<tr class='newpage'><td colspan='2'>$product_name</td></tr>
	<tr><td>$sku</td><td>$oursku</td></tr>
	<tr>
		<td><img src='http://vwtd.com/getpic.php?sku=$skutext' height='200'></td>
		<td><img src='http://vwtd.com/getpic.php?sku=$skutext' height='200'></td>
	</tr>
	<tr>
		<td>$case_1</td>
		<td>$case_1</td>
	</tr>
	<tr>
		<td>$case_5</td>
		<td>$case_5</td>
	</tr>

	<tr><td>$piece_per_unit</td><td>$piece_per_unit</td></tr>
	<tr>
		<td colspan='2'></td>
	</tr>
";
				

}

			



echo "</table>";

?>
<style>
	td{
		text-align:center;
		padding: 5px;
		border-left: 1px solid #000;
		border-bottom: 1px solid #000;	
	}
	#tablebox{
		border-right:1px solid #000;	
		border-top: 1px solid #000;	
	}
</style>