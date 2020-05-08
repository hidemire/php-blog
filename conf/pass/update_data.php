<?php
header("Content-Type: text/html; charset=utf-8");

$hostname = "db";
$username = "user"; 
$password = "test"; 
$dbName = "myDb"; 

$table = "users";

$connt = mysqli_connect($hostname, $username, $password, $dbName) or die ("Не можу підключитись");
 
if(@$_POST['submit_edit']) {
    $query = "UPDATE $table SET name='{$_POST['name']}', surname='{$_POST['surname']}', phone='{$_POST['phone']}', message='{$_POST['message']}' WHERE id='{$_POST['id']}'";
    mysqli_query($connt, $query) or die (mysqli_error());
}
 
$query = "SELECT * FROM $table";
$res = mysqli_query($connt, $query) or die(mysqli_error());
$row = mysqli_num_rows($res);
 
echo ("
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title>Редагування і оновлення данних</title>
    <style type=\"text/css\">
    <!--
    body { font: 12px Georgia; color: #666; }
    h3 { font-size: 16px; text-align: center; }
    table { width: 400px; border-collapse: collapse; margin: 5px auto; background: #E6E6E6; }
    td { padding: 3px; vertical-align: middle; }
    input { width: 250px; border: solid 1px #CCC; color: #FF6666; }
    textarea { width: 250px; height: 100px; border: solid 1px #CCC; color: #FF6666; }
    .buttons { width: auto; border: double 1px #666; background: #D6D6D6; color: #000; }
    #num { width: 20px; text-align: right; margin-right: 5px; float: right; }
    -->
    </style>
</head>
<body>
 
<h3>Редагування і оновлення данних в таблиці</h3>
");
 
while ($row = mysqli_fetch_array($res)) {
    echo "<form action=\"update_data.php\" method=\"post\" name=\"edit_form\">\n";
    echo "<input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\" />\n";
    echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\n";
    echo "<tr>\n";
    echo "<td colspan=\"2\" style=\"border-bottom:solid 1px #CCCCCC;\"><b><i><div id=\"num\">#".$row['id']."</div>".$row['date']."</b></i></td>\n";
    echo "</tr><tr>\n";
    echo "<td>І'мя:</td><td><input type=\"text\" value=\"".$row['name']."\" name=\"name\" /></td>\n";
    echo "</tr><tr>\n";
    echo "<td>Фамілія:</td><td><input type=\"text\" value=\"".$row['surname']."\" name=\"surname\" /></td>\n";
    echo "</tr><tr>\n";
    echo "<td>Номер телефону:</td><td><input type=\"text\" value=\"".$row['phone']."\" name=\"phone\" /></td>\n";
    echo "</tr><tr>\n";
    echo "<td>Відомість про студента:</td><td><textarea name=\"message\">".$row['message']."</textarea></td>\n";
    echo "</tr><tr>\n";
    echo "<td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"submit_edit\" class=\"buttons\" value=\"Зберегти зміни\" /></td>\n";
    echo "</tr></table></form>\n\n";
}

mysqli_close($connt);
echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"/pass\">Повернутись назад</a></div>");
?>