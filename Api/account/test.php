<?php
$serverName = "nlbavwixsdb1.infor.com";
$connectionInfo = array( "Database"=>"ToolsSupport", "UID"=>"ps", "PWD"=>"m5Password" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT acc_UIC, acc_fullname FROM t_accounts";
$params = array(1, "some data");

$stmt = sqlsrv_query( $conn, $sql, array(), array("Scrollable"=>"buffered"));  
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$row_count = sqlsrv_num_rows( $stmt );
if ($row_count === false)
   echo "Error in retrieveing row count.";
else
   echo $row_count;
$rs = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$data = array();
$accounts = array();

function getSpar($var) {
    return $var['name'] = 'Joris Sparla';
} 


while ($rs = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data['id'] = $rs['acc_UIC'];
    $data['name'] = $rs['acc_fullname'];
    array_push($accounts, $data );


}

// print_r(array_filter($accounts, "getSpar"));
?>