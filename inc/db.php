<?
//------------------------------------------------------------------------------------------------------------------------------------------------------//
// Online Demo Server @ demo.vglawyers.gr

define('DB_HOST','localhost');
define('DB_USER','digivers_vgUser');
define('DB_PASSWORD','HX3Z@S[@;_~D');
define('DB_NAME','digivers_vglawyers');


//------------------------------------------------------------------------------------------------------------------------------------------------------//
// Online Demo Server @ demo.vglawyers.gr

//define('DB_HOST','localhost');
//define('DB_USER','philseke_vgsiteu');
//define('DB_PASSWORD','TBpL,47@;DmU');
//define('DB_NAME','philseke_vgsite');


/*
define('DB_HOST','localhost');
define('DB_USER','vglawyer_usr');
define('DB_PASSWORD','0OcwCPi@_1OX');
define('DB_NAME','vglawyer_gr');
*/
//------------------------------------------------------------------------------------------------------------------------------------------------------//
// Online Demo Server @ webfusion.dnsalias.net
/*
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','l3tm31nn0w1say');
define('DB_NAME','vglawyers_gr');
*/
//------------------------------------------------------------------------------------------------------------------------------------------------------//
function initDB(){
		$conn = mysqli_connect('localhost', 'digivers_vgUser', 'HX3Z@S[@;_~D', 'digivers_vglawyers');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_query($conn, "SET CHARACTER SET 'utf8'");
		return $conn;
	}

function getTextElement($page, $text){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT `$text` FROM `PAGES` WHERE `PAGE_ID` LIKE '$page'");
	//echo "SELECT `$text` FROM `PAGES` WHERE `PAGE_ID` LIKE '$page'";
	$row = $result->fetch_row();
	$string = trim(preg_replace('/\s+/', ' ', $row[0]));
	return $string;
}

function getLawyer($id){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT * FROM `LAWYERS` WHERE `LAWYER_ID` = $id ");
	$lawyer = mysqli_fetch_array($result,MYSQLI_ASSOC);
	return $lawyer;
}
function getLawyers(){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT * FROM `LAWYERS` ");
	return $result;
}
function getExpertises(){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT * FROM `EXPERTISE` ");
	return $result;
}
function getExpertise($id){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT * FROM `EXPERTISE` WHERE `ID` = $id ");
	$expertise = mysqli_fetch_array($result,MYSQLI_ASSOC);
	return $expertise;
}

function getImageLocByID($pagePos){	
	$pagePos = "lawyers_lawyer".$pagePos;
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT `LOCATION` FROM `IMAGES` WHERE `PAGE_POS` LIKE '$pagePos'");
	//echo "SELECT `LOCATION` FROM `IMAGES` WHERE `PAGE_POS` LIKE '$pagePos'";
	$row = $result->fetch_row();
	return $row[0];
}

function getExpertiseTitle($id){
	$conn = initDB();
	$result = mysqli_query($conn,"SELECT `TITLE_EL`, `EXPLAIN_EL` FROM `EXPERTISE` WHERE `ID` LIKE '$id'");
	$row = $result->fetch_row();
	return $row[0]."<br>".$row[1];
}
?>