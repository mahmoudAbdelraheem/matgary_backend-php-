<?php

include "../connect.php";

$userId = filterRequest('userid');

getAllData('myfavorite' ,"favorite_users_id = $userId");