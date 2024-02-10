<?php

include '../connect.php';

$favoriteId = filterRequest('favoriteid');



deleteData("favorite" , "favorite_id = $favoriteId");