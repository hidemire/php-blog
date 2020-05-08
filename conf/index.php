<?
$hostname = "db";
$username = "user"; 
$password = "test"; 
$dbName = "myDb"; 

$table = "users";

$conn = mysqli_connect($hostname, $username, $password, $dbName) or die ("Не можу підключитись");
 
$query = "SELECT id, name, surname, phone, message, date FROM $table";

$res = mysqli_query($conn, $query) or die(mysqli_error());

echo ("
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
 
<head>
 
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
 
<style type=\"text/css\">
<!--
body { font: 12px Georgia; color: #666666; }
h3 { font-size: 16px; text-align: center; }
table { width: 700px; border-collapse: collapse; margin: 0px auto; background: #E6E6E6; }
td { padding: 3px; text-align: center; vertical-align: middle; }
.buttons { width: auto; border: double 1px #666666; background: #D6D6D6; }
-->
</style>
 
</head>
 
<body>
 
<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
 <tr style=\"border: solid 1px #000\">
  <td><b>#</b></td>
  <td align=\"center\"><b>Дата введення</b></td>
  <td align=\"center\"><b>Ім'я</b></td>
  <td align=\"center\"><b>Фамілія</b></td>
  <td align=\"center\"><b>Номер телефону</b></td>
  <td align=\"center\"><b>Відомість про студента</b></td>
 </tr>
");
 

while ($row = mysqli_fetch_array($res)) {
    echo "<tr>\n";
    echo "<td>".$row['id']."</td>\n";
    echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['surname']."</td>\n";
    echo "<td>".$row['phone']."</td>\n";
    echo "<td>".$row['message']."</td>\n</tr>\n";
}
 
echo ("</table>\n");
 

mysqli_close($conn);
 

echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"pass/\">Змінити</a></div>");
 
?>