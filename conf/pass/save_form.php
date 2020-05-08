<!DOCTYPE>
<html>
<head>
	<title></title>
	<meta http-equiv="Refresh" content="1;url=/pass">
	<meta charset=utf-8>
</hear>
<body>	
<?
$hostname = "db";
$username = "user"; 
$password = "test"; 
$dbName = "myDb"; 

$table = "users";
 
$conn = mysqli_connect($hostname, $username, $password, $dbName) or die ("Не можу підключитись");
 
$cdate = date("Y-m-d");

$query = "INSERT INTO $table SET name='{$_POST['name']}', surname='{$_POST['surname']}', phone='{$_POST['phone']}', message='{$_POST['message']}', date='$cdate'";

mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">Данні збереженно успішно!</font>
 
");
 
?>
</body>
</html>