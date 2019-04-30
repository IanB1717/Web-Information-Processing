<?php
$method = $_SERVER['REQUEST_METHOD'];
$conn = mysqli_connect('localhost', 'root', '', 'RestDB');
mysqli_set_charset($conn,'utf8');
switch ($method){
 case 'DELETE':
    parse_str(file_get_contents("php://input"),$post_vars);
    $id =$post_vars['id'];
    "DELETE FROM Assign_5 WHERE id='$id'";
  break;
  case 'GET':
    $sel = htmlspecialchars($_GET['selection']);
    $spec = htmlspecialchars($_GET['specific']);
    echo "<br>";
    $sql = "SELECT * FROM Assign_5";
  break;
case 'POST':
    $name = $post_vars['name'];
    $URL = $post_vars['URL'];
    $description = $post_vars['description'];
	$now = new DateTime();
	$date =  $now->format('Y-m-d H:i:s');
    $sql = "INSERT INTO Assign_5 (name, URL, date, description) VALUES ('$name', '$URL', '$date', '$description')";
  break;
  case 'PUT':
    parse_str(file_get_contents("php://input"),$post_vars);
    $name = $post_vars['name'];
    $URL = $post_vars['URL'];
    $description = $post_vars['description'];
    $id = $post_vars['id'];
    $sql = "UPDATE Assign_5 SET name='$name' ,URL='$URL' , description='$description'  WHERE  id='$id'";
  break;
}
$result = mysqli_query($conn,$sql);
if (!$result) {
  http_response_code(404);
  die(mysqli_error());
}
mysqli_close($conn);
?>
