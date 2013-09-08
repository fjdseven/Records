Public Functions:

refreshState: 
	METHOD: get all guids from dir
addRecord: $data, $guid
	METHOD: add a single record to db
		if no guid is passed in, create one
addRecords: $data 
	METHOD: add multiple records
		REQUIRES $data to be an array
removeRecord: $guid
	METHOD: remove the record
updateRecord: $guid, $data 
	METHOD: update the contents of a record
setBaseDir:
	METHOD: set the basedir
getAllRecords:
	METHOD: get all records from baseDir
getBaseDir:
	METHOD: get the basedir
getOneRecord: $guid
	METHOD: get one record by guid
