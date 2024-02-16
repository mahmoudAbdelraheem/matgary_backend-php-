
<?php

include "../connect.php";

$userId= filterRequest('userId');

updateData("address",$data,"address_user_id =$userId");