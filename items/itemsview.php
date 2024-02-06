<?php
include '../connect.php';

//? get category id from user to get items that belong to this category
$categoryId = filterRequest('id');
getAllData('itemsview' , "cate_id = $categoryId");
