
<?php

include '../connect.php';

$userId = filterRequest('userid');
$itemId = filterRequest('itemid');


deleteData("favorite" , "favorite_users_id = $userId AND favorite_items_id = $itemId");