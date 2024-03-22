<?php

include "connect.php";

$homeData = array();

$homeData['status'] = 'success';

//? get categories
$categories =  getAllData('categories' ,null , null, false);
$homeData['categories'] = $categories;

//? get items with discount
$items =  getAllData('items1view' ,"item_discount != 0" , null, false);
$homeData['items'] = $items;

//? get top selling items
$topSelling = getAllData("itemstopselling" ,"1=1 ORDER BY itemscount DESC",null,false);
$homeData['topselling'] = $topSelling;


echo json_encode($homeData);