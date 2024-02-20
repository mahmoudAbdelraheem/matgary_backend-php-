
<?php

include "../connect.php";

$userId= filterRequest('userid');

getAllData("address","address_user_id =$userId");