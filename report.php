

<?php 

class report
{
	
	function generate($string)
	
	{
		//print_r("------------- inside REPORT CLASS --------");
		$accounts = mysql_connect("localhost", "root", "root")
			or die(mysql_error());
		mysql_select_db("Kelson_test", $accounts);
		
		//$sql = mysql_query("select data from Kelson_test.scraped_data where Report_ID = $id") or die('Error: ' .mysql_error());
		
		$sql = mysql_query("SELECT DATA FROM scraped_data WHERE TIME ='$string'")or die (mysql_error());

		

		while($query_row = mysql_fetch_assoc($sql))
		{
			
			foreach($query_row as $key => $value)
			{
				$data = $value;
			}
		}			
		
		$data = json_decode($data,true);	
		//print_r($data);
		
		return($data);
		
		
	}
}
?>
