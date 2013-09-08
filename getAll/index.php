<?php

include "../app/Records.php";

header( 'content-type: application/json; charset=utf-8' );

$rec = new Records();

$obj = $rec->getAllRecords();

echo $_GET['callback'].'('.json_encode( $obj ).')';


