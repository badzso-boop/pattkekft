<?php


/*---------------Regisztráció----------*/
#region
// Ellenőrizzük az üres bemenetet
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Ellenőrizzük a helyes felhasználónevet
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Ellenőrizzük a helyes E-mail címet
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Ellenőrizzük a jelszavak eggyeznek-e
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Ellenőrizzük, hogy a felhasznalónév regisztrálva van-e?
function uidExists($conn, $username) {
  $sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Új felhasználó feltöltése az adatbázisba
function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO felhasznalok (teljes_nev, felhasznalonev, email, jelszo, pozicio) VALUES (?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	$pozicio = "user";

	mysqli_stmt_bind_param($stmt, "sssss", $name, $username, $email, $hashedPwd, $pozicio);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../signup.php?error=none");
	exit();
}
#endregion


/*----------------Belépés---------------*/
#region
// Ellenőrizzük az üres adatokat
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Felhasználó pozicio lekerese
function getPostition($conn, $username) {
	$sql = "SELECT pozicio FROM felhasznalok WHERE felhasznalonev = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Felhasználó beléptetése az oldalra
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);
	$pozicio = getPostition($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["jelszo"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["id"];
		$_SESSION["useruid"] = $uidExists["felhasznalonev"];
		$_SESSION["pozicio"] = $pozicio;		
		header("location: ../index.php?error=none");
		exit();
	}
}
#endregion

/*----------------ADMIN-----------------*/
#region



/*--------Felhasznalok------*/
#region
function getAllUser($conn) {
	$sql = "SELECT * FROM felhasznalok";
	$result = $conn->query($sql);

	return $result;
}

function emptyUsersInput($id, $name, $username, $email,$position) {
	$result;
	if (empty($id) || empty($name) || empty($username) || empty($email) || empty($position)) {
		$result = true;
	}
	else {
		$result = false;
	}

	return $result;
}

function updateSpecificUser($conn, $id, $name, $username, $email, $position) {
	$sql = "UPDATE felhasznalok SET teljes_nev= ?, felhasznalonev= ?, email= ?, pozicio= ? WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssss", $name, $username, $email, $position, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function deleteSpecificUser($conn, $id) {
	$sql = "DELETE FROM felhasznalok WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}
#endregion

/*--------Munkak------------*/
#region

function emptyInputWorkUpload($nev, $feladat, $fizu, $kontakt) {
	$result;
	if (empty($nev) || empty($feladat) || empty($fizu) || empty($kontakt))
	{
		$result = true;
	}
	else {
		$result = false;
	}

	return $result;
}

function uploadWork($conn, $nev, $feladat, $fizu, $kontakt) {
	$sql = "INSERT INTO munkak (megnevezes, feladat, fizetes, elerhetoseg) VALUES (?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssss", $nev, $feladat, $fizu, $kontakt);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function getAllWorks($conn) {
	$sql = "SELECT * FROM munkak";
	$result = $conn->query($sql);

	return $result;
}

function editSpecificWork($conn, $id, $nev, $feladat, $fizetes, $elerhetoseg) {
	$sql = "UPDATE munkak SET megnevezes= ?, feladat= ?, fizetes= ?, elerhetoseg= ? WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssss", $nev, $feladat, $fizetes, $elerhetoseg, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function deleteSpecificWork($conn, $id) {
	$sql = "DELETE FROM munkak WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

#endregion


/*--------Uzenetek----------*/
#region
function getAllMessages($conn) {
	$sql = "SELECT * FROM uzenetek";
	$result = $conn->query($sql);

	return $result;
}

function updateSpecificMessage($conn, $id, $felado, $elerhetoseg, $cimzett, $szoveg, $allapot) {
	$sql = "UPDATE uzenetek SET felado= ?, elerhetoseg=? ,cimzett= ?, szoveg= ?, allapot= ? WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssssss", $felado, $elerhetoseg, $cimzett, $szoveg, $allapot, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function deleteSpecificMessage($conn, $id) {
	$sql = "DELETE FROM uzenetek WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

#endregion

/*--------Referenciak-------*/
#region

function getAllReferencia($conn) {
	$sql = "SELECT * FROM referenciak";
	$result = $conn->query($sql);

	return $result;
}

function uploadReferencia($conn, $megnevezes, $leiras, $fajlnevuj) {
	$sql = "INSERT INTO referenciak (megnevezes, leiras, kepek) VALUES (?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sss", $megnevezes, $leiras, $fajlnevuj);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function emptyInpuReferenciakUpload($megnevezes, $leiras, $fajlnevuj) {
	$result;
	if (empty($megnevezes) || empty($leiras) || empty($fajlnevuj))
	{
		$result = true;
	}
	else {
		$result = false;
	}

	return $result;
}

function updateReferencia($conn, $id, $megnevezes, $leiras, $kepek) {
	$sql = "UPDATE referenciak SET megnevezes= ?, leiras= ?, kepek= ? WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssss", $megnevezes, $leiras, $kepek, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

function deleteSpecificReferencia($conn, $id) {
	$sql = "DELETE FROM referenciak WHERE id= ?;";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../admin.php?error=none");
	exit();
}

#endregion

#endregion