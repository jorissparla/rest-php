<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
header('Content-Type: application/json');
include_once('../../config/Database.php');
include_once('../../models/Account.php');

$database = new Database();
$db = $database->connect();

$account = new Account($db);

$result = $account->read();

// var_dump($result);
$num = sqlsrv_num_rows($result);
// echo "Rows: $num";
// echo json_encode(array('message'=> 'No posts found', 'rows'=> $num));
if ($num > 0 ) {
    $accounts_arr = array();
    $accounts['data'] = array();
    $accounts_arr['data'] = array();
    while ($row = $account->next()) {
        extract($row);
        $account_item = array(
            'id'=> $acc_UIC,
            'name'=> utf8_encode($acc_fullname)
        );
        // print_r($account_item);
        array_push($accounts['data'], $account_item);
    }
     $j =json_encode($accounts);
    print_r(json_encode($accounts));
} else {
    echo json_encode(array('message'=> 'No posts found'));
}

// $num = $res->rowCount();
