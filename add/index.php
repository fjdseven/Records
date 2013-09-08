<?php

include "../app/Records.php";

header( 'content-type: application/json; charset=utf-8' );

$rec = new Records();

$data = $_GET['data'];

if ( isset( $data ) ) {
	$rec->addRecord( $data, null );
	echo $_GET['callback'].'('.json_encode( "1" ).')';
}


