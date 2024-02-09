

<?php

include '../connect.php';

$userId = filterRequest('userid');
$itemId = filterRequest('itemid');

$data = array(
    "favorite_users_id" => $userId,
    "favorite_items_id" => $itemId,
);

insertData("favorite" , $data);