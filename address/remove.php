<?php

include "../connect.php";

$addressId= filterRequest('addressid');


deleteData("address","address_id =$addressId");