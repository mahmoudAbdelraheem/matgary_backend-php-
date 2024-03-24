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
$topSelling = getAllData("itemstopselling" ,"1=1 ORDER BY sellingtime DESC",null,false);
$homeData['topselling'] = $topSelling;

//? get home card offers
$cardOffer = getAllData("home_card" ,"1=1",null,false);
$homeData['cardoffer'] = $cardOffer;


echo json_encode($homeData);