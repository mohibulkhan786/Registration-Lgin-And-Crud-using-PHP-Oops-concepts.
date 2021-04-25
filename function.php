<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'db_oopscrud');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}



// for username availblty
public function usernameavailblty($uname) {
$result =mysqli_query($this->dbh,"SELECT Username FROM tbluser WHERE Username='$uname'");
return $result;

}

// Function for registration
	public function registration($fname,$uname,$uemail,$pasword)
	{
	$ret=mysqli_query($this->dbh,"insert into tbluser(FullName,Username,UserEmail,Password) values('$fname','$uname','$uemail','$pasword')");
	return $ret;
	}

// Function for signin
public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->dbh,"select id,FullName from tbluser where Username='$uname' and Password='$pasword'");
	return $result;
	}





	//Data Insertion Function
	public function insert($fname,$lname,$emailid,$contactno,$address)
	{
	$ret=mysqli_query($this->dbh,"insert into tblusers(FirstName,LastName,EmailId,ContactNumber,Address) values('$fname','$lname','$emailid','$contactno','$address')");
	return $ret;
	}
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from tblusers");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from tblusers where id=$userid");
	return $oneresult;
	}
//Data updation Function
public function update($fname,$lname,$emailid,$contactno,$address,$userid)
	{
	$updaterecord=mysqli_query($this->dbh,"update  tblusers set FirstName='$fname',LastName='$lname',EmailId='$emailid',ContactNumber='$contactno',Address='$address' where id='$userid' ");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from tblusers where id=$rid");
	return $deleterecord;
	}


}
?>