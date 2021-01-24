<?php
	
class Connection {
	
	function connect() {
        // we don't need to connect twice
        if ( $connection ) {
            return;
        }
        // data for making connection            
        $mssql_server = 'server';
        $mssql_data = array( "Database"=>"database", "UID"=>"user", "PWD"=>"pass");
        // try to connect                    
        $connection = sqlsrv_connect($mssql_server, $mssql_data);
        if(!$connection){
            return 'Failed to connect to host';
        }else{
            return $connection;
        }
        
    }
	
	function getData($conn,$query) {

        $result = sqlsrv_query($conn, $query);
        while ($row =  sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    
                    $this->data_array[] = $row;                                                    
        }
        $m = $this->data_array;                     
        return $m;	
	
	}
    
	function query($conn, $query) {           
    	$result = sqlsrv_query($conn, $query) or die("Query didn't work.".$query);
	}
	
}
	
?>
