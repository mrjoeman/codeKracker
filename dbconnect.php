<?php

	$DB = "Kelson_test";
        $USER = "root";
        $PASS = "";

class dbconnect
{	


	function store($string)
	{
		$accounts = mysql_connect("localhost", "root", "")
			or die(mysql_error());
		mysql_set_charset('utf8',$accounts);
		mysql_select_db("Kelson_test", $accounts);
		
		$sql = "Insert into Kelson_test.scraped_data(id,Data,time) values (NULL,'$string',now())";
		
		if(!mysql_query($sql, $accounts))
		{
			die('Error: ' .mysql_error());
		}
	}

	function get($timeStamp)
	{
	
		$accounts = mysql_connect("localhost", "root", "")
                        or die(mysql_error());
	//	mysql_set_charset('utf8',$accounts);
                mysql_select_db("Kelson_test", $accounts);


		$q1 = mysql_query("SELECT * FROM scraped_data WHERE TIME>='$timeStamp'")or die (mysql_error());
		
		
		if($q1 == false)
		{
			user_error("Query failed: " . mysql_error() . "<br />\n$query");
		}
		
		elseif(mysql_num_rows($q1) == 0)
		{
   			echo "<p>Sorry, no rows were returned by your query.</p>\n";
		}
		else
		{
   			while($query_row = mysql_fetch_assoc($q1))
   			{
      			foreach($query_row as $key => $value)
      			{
         			echo "$key: $value<br />\n";
					if($key == "DATA")
					{
						return $value;
					}
      				}
     	 	echo "<br />\n";
			}
		}  


		

	}
}
?>
