<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.tg {
  border-collapse: collapse;
  border-spacing: 0;
}
.button-style {
  margin: auto;
  display: block;
  color: #33ccff;
  background-color: black;
  font-family: "Comic Sans MS", cursive, sans-serif;
  font-size: 24px;
  padding: 10px 10px;
  border: 2px #33ccff;
  float: center;
  border-radius: 75%;
}
</style>
<script>
myTab = document.getElementById('myTab');

function upgrader(){
  console.log("upgrader function");
  myTable = document.getElementById('Up1');
  document.getElementById('uid').value = Up1.rows[1].cells[0].innerHTML;
  document.getElementById('ucreator').value = Up1.rows[1].cells[1].innerHTML;
  document.getElementById('utitle').value = Up1.rows[1].cells[2].innerHTML;
  document.getElementById('utype').value = Up1.rows[1].cells[3].innerHTML;
  document.getElementById('uidentifier').value = Up1.rows[1].cells[4].innerHTML;
  document.getElementById('udate').value = Up1.rows[1].cells[5].innerHTML;
  document.getElementById('ulanguage').value = Up1.rows[1].cells[6].innerHTML;
  document.getElementById('udescription').value = Up1.rows[1].cells[7].innerHTML;
}
</script>
</head>
<body>
  <h1>eBook_MetaData_SPA_Assignment3</h1>
  <h2>Add A New Book</h2> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID:no need to add an ID, it is automatically generated to ensure no duplicates<br>
Creator: <input type="text" name="creator" id="creator"placeholder="Enter A Persons Name"><br>
Title: <input type="text" name="title" id="title"placeholder="Enter The Books Title"><br>
Type: <input type="text" name="type" id="type"placeholder="Enter The Genre of Book"><br>
Identifier: <input type="text" name="identifier" id="identifier"placeholder="Enter A unique identifier e.g ISBN"><br>
Date: <input type="date" name="date" id="date"placeholder="Enter dates such as day of publication"><br>
Language: <input type="text" name="language" id="language"placeholder="Enter Languages of The Book"><br>
Description: <input type="text" name="description" id="description"placeholder="Enter A  Brief Synopisises"><br>
<input type="submit" class="button-style" name="addBook" id="addBook" value="Add New Book Information"><br>
</form><br>
<div>


<h2>Book Database Dispalyer</h2>
</div>
<?php
  $creator = $title = $type = $identifier = $language = $description = "";
  $id = 0;
  $date = date('m/d/Y');
echo "<table class='tg' id='myTab'>";
echo "<tr><th>Id</th><th>Creator</th><th>Title</th><th>Type</th><th>Identifier</th><th>Date</th><th>Language</th><th>Description</th></tr>";
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }
    function beginChildren() {
        echo "<tr>";
    }
    function endChildren() {
        echo "</tr>" . "\n";
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Assignment3";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM eBook_MetaData");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
if(isset($_POST['addBook'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = test_input($_POST["id"]); 
    $creator = test_input($_POST["creator"]); 
    $title = test_input($_POST["title"]); 
    $type = test_input($_POST["type"]); 
    $identifier = test_input($_POST["identifier"]); 
    $date = test_input($_POST["date"]); 
    $language = test_input($_POST["language"]);  
    $description = test_input($_POST["description"]);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Assignment3";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,     $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO eBook_MetaData (creator, title, type, identifier, date, language, description)
      VALUES ($creator, $title, $type, $identifier, $date, $language, $description)";
      $conn->exec($sql);
    }
    catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  
	
  }
  
  echo '<script type="text/javascript">
          window.location = window.location.href
        </script>';
}
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return ("'$data'");
    }
?>

<h2>Updater</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Book ID: <input type="text" name="updateid" id="updateid" placeholder="Enter Book ID you wish to edit"><br>
<input type="submit" class="button-style" name="updateBook" id="updateBook" value="Update your selected Book"><br>
<!--<p id="updateid"></p>-->
</form><br>
<div><br>
<?php 
  if(isset($_POST['updateBook'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $updateid = ($_POST["updateid"]);
      echo "<table class='tg' id='Up1'>";
      echo "<tr><th>Id</th><th>Creator</th><th>Title</th><th>Type</th><th>Identifier</th><th>Date</th><th>Language</th><th>Description</th></tr>";
      class updateTableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
        function current() {
          return "<td contenteditable='true' style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }
        function beginChildren() {
          echo "<tr>";
        }
        function endChildren() {
        echo "</tr>" . "\n";
        }
      }
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Assignment3";
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM eBook_MetaData WHERE id = $updateid");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new updateTableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          echo $v;
        }
      }
      catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      $conn = null;
      echo "</table>";
      echo '<form method="post" action="/Assignment3.php">';
      echo '<input type="hidden" id="uid" name ="uid" value="test">';
      echo '<input type="hidden" id="ucreator" name ="ucreator" value="testvalue">';
      echo '<input type="hidden" id="utitle" name ="utitle" value="testvalue">';
      echo '<input type="hidden" id="utype" name ="utype" value="testvalue">';
      echo '<input type="hidden" id="uidentifier" name ="uidentifier" value="testvalue">';
      echo '<input type="hidden" id="udate" name ="udate" value="testvalue">';
      echo '<input type="hidden" id="ulanguage" name ="ulanguage" value="testvalue">';
      echo '<input type="hidden" id="udescription" name ="udescription" value="testvalue">';
      echo '<input type="submit" class="button-style" name="Readd" id="Readd" onclick="upgrader()" value="Save"><br>';
      echo '</form><br>';
    }
  }
if(isset($_POST['Readd'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uid = ($_POST["uid"]); 
    $ucreator = ($_POST["ucreator"]); 
    $utitle = ($_POST["utitle"]); 
    $utype = ($_POST["utype"]); 
    $uidentifier = ($_POST["uidentifier"]); 
    $udate = ($_POST["udate"]); 
    $ulanguage = ($_POST["ulanguage"]);  
    $udescription = ($_POST["udescription"]);
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE eBook_MetaData SET creator = '$ucreator', title = '$utitle', type = '$utype', identifier = '$uidentifier', date = '$udate', language = '$ulanguage', description = '$udescription'
      WHERE id = $uid";
      $conn->exec($sql);
    }
    catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    echo '<script type="text/javascript">
    window.location = window.location.href
  </script>';
  }
	
  }
?></div>


<h2>Deleter</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Delete ID: <input type="text" name="deleteid" id="deleteid"placeholder="Enter ID of Book To Be Deleted"><br>
<input type="submit" class="button-style" name="deleteBook" id="deleteBook" value="Delete A Book"><br>
</form><br>
<?php
  if(isset($_POST['deleteBook'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $deleteid = ($_POST["deleteid"]);
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Assignment3";
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM eBook_MetaData WHERE id = $deleteid";
        $conn->exec($sql);
      }
      catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
      echo '<script type="text/javascript">
              window.location = window.location.href
            </script>';
    }
  }
?>


</body>
</html>
