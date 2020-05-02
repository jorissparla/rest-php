<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
header('Content-Type: application/json');
include_once('../../config/Database.php');
include_once('../../models/Query.php');

$database = new Database();
$db = $database->connect();

$account = new Query($db, "select acc_UIC, acc_email from t_accounts");

$accounts = $account->fetchAll();
print_r($accounts);

// $result = $account->read();

// // var_dump($result);
// $num = 1; //$result->rowCount();
// // echo "Rows: $num";
// // echo json_encode(array('message'=> 'No posts found', 'rows'=> $num));
// if ($num > 0 ) {
//     $accounts_arr = array();
//     $accounts['data'] = array();
//     $accounts_arr['data'] = array();
//     while ($row = $account->next()) {
//         extract($row);
//         $account_item = array(
//             'id'=> $acc_UIC,
//             'name'=> utf8_encode($acc_email)
//         );
//         // print_r($account_item);
//         array_push($accounts['data'], $account_item);
//     }
//      $j =json_encode($accounts);
//     print_r(json_encode($accounts));
// } else {
//     echo json_encode(array('message'=> 'No posts found'));
// }

// $num = $res->rowCount();
