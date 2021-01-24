<?php
	
class Connection {
	
	function connect() {
        // we don't need to connect twice
        if ( $connection ) {
            return;
        }
        // data for making connection            
        $mssql_server = 'servercontoso2.database.windows.net';
        $mssql_data = array( "Database"=>"contosodb", "UID"=>"servercontoso2", "PWD"=>"99658941hrc+-");
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