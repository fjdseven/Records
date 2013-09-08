Public Functions:

refreshState: <br/>
	METHOD: get all guids from dir<br/><br/>
addRecord: $data, $guid<br/>
	METHOD: add a single record to db<br/>
		if no guid is passed in, create one<br/><br/>
addRecords: $data <br/>
	METHOD: add multiple records<br/>
		REQUIRES $data to be an array<br/><br/>
removeRecord: $guid<br/>
	METHOD: remove the record<br/><br/>
updateRecord: $guid, $data <br/>
	METHOD: update the contents of a record<br/><br/>
setBaseDir:<br/>
	METHOD: set the basedir<br/><br/>
getAllRecords:<br/>
	METHOD: get all records from baseDir<br/><br/>
getBaseDir:<br/>
	METHOD: get the basedir<br/><br/>
getOneRecord: $guid<br/>
	METHOD: get one record by guid<br/><br/>
