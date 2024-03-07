<?php

//? get user notifications
include "connect.php";

$userId = filterRequest('id');

getAllData("notification","notification_user_id =$userId");