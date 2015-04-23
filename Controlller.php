<?php

include ("dbconnect.php");
include("Scraper.php");
$scraper = new Scraper;

$web1 = ($scraper -> curl_download('http://www.bwalk.com/en-CA/Rent/Details/Alberta/Edmonton/Fairmont-Village/', 'Fairmont Village'));

$web2 = ($scraper -> curl_download('http://www.bwalk.com/en-CA/Rent/Details/Alberta/Edmonton/Meadowview-Manor/', 'Meadowview-Manor'));

$web3 = ($scraper -> curl_download('http://www.rentmidwest.com/property/village-southgate', 'Southgate'));

$finalarray ['Bwalk1'] = $web1;
$finalarray ['Bwalk2'] = $web2;
$finalarray ['Southgate'] = $web3;

$string = json_encode($finalarray);

$dbconnect = new dbconnect;
$status = ($dbconnect -> store($string));

	//function dataByTimeStamp($ts)
	//{
		//$timeStamp = "2015-04-20 13:33:16";
		$timeStamp = "2015-04-22 12:25:01";
		$data1 = ($dbconnect -> get($timeStamp));
		$utf8_data = utf8_encode($data1);
		$emp_data = json_decode($utf8_data);
		var_dump($emp_data);
		//echo $emp_data->DATA;
		//$bwalk1Rent = $emp_data->Bwalk1->Fairmont->1BD->Rent;
		//print_r($bwalk1Rent);
		print_r($emp_data);
		//print_r($data1);
	//}

?>
