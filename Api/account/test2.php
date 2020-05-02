<?php
$serverName = "nlbavwixsdb1.infor.com";
$connectionInfo = array( "Database"=>"ToolsSupport", "UID"=>"ps", "PWD"=>"m5Password" );
$host = 'nlbavwixsdb1.infor.com';
$db_name = 'ToolsSupport';
$username = 'ps';
$password = 'm5Password';
$conn;
try {
    //code...
    $conn = new PDO("sqlsrv:Server=$host;Database=$db_name", $username, $password);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
} catch (Exception $e) {
    die( print_r( $e->getMessage() ) );
    //throw $th;
}

$sql = "select acc_UIC, acc_fullname from t_accounts";
$params = array();  
$getAccounts = $conn->query($sql);

while ($account = $getAccounts->fetch(PDO::FETCH_ASSOC)  ) {
    print_r($account);
}



// echo $num;


// print_r(array_filter($accounts, "getSpar"));
?>