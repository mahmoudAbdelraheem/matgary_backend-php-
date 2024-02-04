<?php

include "connect.php";

$homeData = array();

$homeData['status'] = 'success';

//? get categories
$categories =  getAllData('categories' ,null , null, false);
$homeData['categories'] = $categories;

//? get items with discount
$items =  getAllData('items' ,"discount != 0" , null, false);
$homeData['items'] = $items;

echo json_encode($homeData);