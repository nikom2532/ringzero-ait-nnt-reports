<?php
class Test extends CI_Controller{

	function index(){
		
		// $serverName = "111.223.32.9";
		$serverName = "localhost";
		// $connectionInfo = array( "Database"=>"NNT_DataCenter", "UID"=>"dbuser_km", "PWD"=>"123456");
		$connectionInfo = array( "Database"=>"NNT_DataCenter_2", "UID"=>"sa", "PWD"=>"1234");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
			echo "Connection established.<br />";
			
			// $query = "SELECT TOP 1000 [field1]
			      // ,[field2]
			  // FROM [ringzero_ait_prd_sharing].[dbo].[test]";
			// $stmt = sqlsrv_query($conn, $query);
			// // print_r($stmt);
			// while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
			      // echo $row['field1'].", ".$row['field2']."<br />";
			// }
		}else{
			echo "Connection could not be established.<br />";
			echo "<pre>";
			print_r(sqlsrv_errors());
			echo "</pre>";
		}
	}
}
