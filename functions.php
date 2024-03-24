<?php

//! =======================================
//?  Matgary App complete Backend CRUD File
//! =======================================

define("MB", 1048576);

//? for secure input
function filterRequest($requestname)
{
  return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

//? display all data of table
function getAllData($table, $where = null, $values = null , $json = true)
{
    global $con;
    $data = array();
    if($where ==null){
        $stmt = $con->prepare("SELECT  * FROM $table");
    }else {
        $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json==true){
        if ($count > 0){
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    return $count;
    }else {
        if($count > 0){
            return (array("status" => "success" , "data" =>$data));
        }else {
            return (array("status" => "failure"));
        } 
    }
}

//? display data of table
function getData($table, $where = null, $values = null,$json = true)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json ==true){
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }else {
        return $count;
    }    
}

//? get and return data
function getReturnData($table, $where = null, $values = null,$json = true)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json ==true){
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }else {
        if($count > 0){
            return (array("status" => "success" , "data" =>$data));
        }else {
            return (array("status" => "failure"));
        } 
    }    
}


//? insert into table
function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
  }
    return $count;
}

//? update data in table
function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    }
    return $count;
}

//? delete form table
function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}


//? upload image
function imageUpload($imageRequest)
{
  global $msgError;
  $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
  $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
  $imagesize  = $_FILES[$imageRequest]['size'];
  $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
  $strToArray = explode(".", $imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if (!empty($imagename) && !in_array($ext, $allowExt)) {
    $msgError = "EXT";
  }
  if ($imagesize > 2 * MB) {
    $msgError = "size";
  }
  if (empty($msgError)) {
    move_uploaded_file($imagetmp,  "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}


//? delete file or image
function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

//? for auth securty
function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "mahmoud" ||  $_SERVER['PHP_AUTH_PW'] != "memo") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}
    //? print func
 function printFaliure($errorMsg = 'none'){
    echo json_encode(array("status" => "failure", "message" => $errorMsg));
 }
 function printSuccess($successMsg = 'done'){
    echo json_encode(array("status" => "success", "message" =>$successMsg));
 }

 function printResult($count ,$successMsg ='done'  , $errorMsg = 'none'){
    if ($count>0){
        printSuccess($successMsg);
    }else {
        printFaliure($errorMsg);
    }
 }



 //? send vreification code to user email
 function sendEmail($to,$title,$body){

    $header = 'From: support@memo.com' . '\n' . 'CC:mmoud2031@gmail.com';

    mail($to,$title,$body,$header);
 }


 //! ----------------------------------------------
 //? this function used to send a notification  
 //! ----------------------------------------------

 function sendGCM($title, $message, $topic, $pageid, $pagename)
{


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default"

        ),
        'data' => array(
            "pageid" => $pageid,
            "pagename" => $pagename
        )

    );


    $fields = json_encode($fields);
    $headers = array(
        'Authorization: key=' . "AAAAn-8dtOY:APA91bFHKuznph5smA28yxh7hGTkNYMI1X8q7QECx8mTv1CIvaijmV3pTP2z62AAJyJHmR__RP6scwGC5-eLOk8E3m8iX3fz6sKAMBeoGTBIPV6eUTXHl29KcfZs-L4FcG1gMkF1Qadf",
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    
}

function sendAndInsertNotify($userId,$title,$body,$topic,$pageId,$pageName){
    sendGCM($title, $body , $topic , $pageId,$pageName);
    global $con;
    $stmt = $con->prepare("INSERT INTO `notification` (`notification_user_id`, `notification_title`, `notification_body`) VALUES (? ,? ,?)");
    $stmt->execute(array($userId,$title,$body));
    
    $count = $stmt->rowCount();
    return $count;


}