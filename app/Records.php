<?php

// simple text based versioning system 
// with ability to index by specific keys

class Records {
	
	public $baseDir = '/home/taqquika/mottaquikarim.com/services/records/app/records/guids/';
	public $guids;
		
	function __construct() {
		$this->refreshState();
	}

	public function refreshState() {
		// METHOD: get all guids from dir

		$this->guids = scandir( $this->baseDir, 1 );	

		array_pop( $this->guids );
		array_pop( $this->guids );

	}

	public function addRecord( $data, $guid ) {
		// METHOD: add a single record to db
		// if no guid is passed in, create one

		if ( !isset( $guid ) ) $filename = Records::guid();
		else $filename = $guid;

		$encoded = $data; //json_encode( $data );
		file_put_contents( $this->baseDir.$filename.'.json', $encoded );

		$this->refreshState();
	}

	public function addRecords( $data ) {
		// METHOD: add multiple records
		// REQUIRES $data to be an array

		if ( !is_array( $data ) ) $this->addRecord( $data );
		else {
			foreach( $data as &$item ) $this->addRecord( $item );
		}
	}

	public function removeRecord( $guid ) {
		// METHOD: remove the record

		$record = $this->baseDir.$guid.'.json';
		if ( file_exists( $record ) ) {
			unlink( $record );
			return 1;
		}
		else return 0;
	}

	public function updateRecord( $guid, $data ) {
		// METHOD: update the contents of a record

		$is_record = $this->getOneRecord( $guid );

		if ( !$is_record ) $this->addRecord( $data );
		else $this->addRecord( $data, $guid );
	}
/*********************
**********************
**	SETTER METHODS
**********************
*********************/
	public function setBaseDir( $baseDir ) {
		// METHOD: set the basedir
		$this->baseDir = $baseDir;
	}

/*********************
**********************
**	GETTER METHODS
**********************
*********************/
	public function getAllRecords() {
		// METHOD: get all the records from baseDir

		$object = array();
		foreach( $this->guids as &$item ) {
			var_dump( $item );
			$tmp = explode( '.', $item );
			$contents = file_get_contents( $this->baseDir.$item );
			$object[$tmp[0]] = json_decode( $contents, true );
		}

		return $object;
	}

	public function getBaseDir() {
		// METHOD: get the basedir
		return $this->baseDir;
	}

	public function getOneRecord( $guid ) {
		// METHOD: get one record by guid

		$record = $this->baseDir.$guid.'.json';
		if ( !file_exists( $record ) ) return 0;

		$object = array();
		$content = file_get_contents( $record );

		$object[ $guid ] = $content;

		return $object;
	}
/*********************
**********************
**	STATIC METHODS
**********************
*********************/
	public static function guid() {
		// STATIC METHOD: generate a guid

		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
			.chr(125);// "}"
		return substr($uuid, 1, -1);
	}

} 
