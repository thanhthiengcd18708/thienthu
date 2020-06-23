<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>INSERT DATA TO DATABASE</h1>
<h2>Enter data into table</h2>
<ul>
<form name="InsertData" action="InsertData.php" method="POST">
<li> toyID:</li><li><input type="text" name="toyid"/></li>
<li>Toy Name:</li><input type="text" name="toyname"/></li>
<li><input type="SUBMIT"/></li>
</form>
</ul>
<?php
if (empty(getenv("DATABASE_URL")))
{
echo '<p>The DB does not exist</p>';
$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb','postgres','123456');
}else{
$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
"host=ec2-34-197-188-147.compute-1.amazonaws.com
;port=5432;user=bvztajjyxcwfgb;
password=95afa25f8872b3a2bf6cd1f19c1e74a4148450363e9bcecdc61a254a208ed85e;dbname=
d4s6q2430j68ed",
 $db["host"],
 $db["port"],
 $db["user"],
 $db["pass"],
 lstrim($db["path"],"/")));
}
if($pdo ===false){
echo "ERROR:Could not connect Database";
}
$sql="INSERT INTO thienthu(toyid, toyname)"
 . " VALUES('$_POST[toyid]','$_POST[toyname]')";
$stmt = $pdo-> prepare($sql);
if (is_null($_POST[toyid])){
echo "toyid must be not null";
} else{
echo "Error inserting record: ";
} ?>
        <?php
        // put your code here
        ?>
    </body>
</html>
