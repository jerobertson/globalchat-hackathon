<?php
  include "connection.php";
  
  $id = $_POST['k'];
  $message = $_POST['message'];
  
  $stmt = $conn->prepare("SELECT cl2_id FROM id_pairs WHERE cl1_id=?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->bind_result($id2);
  $stmt->fetch();
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO messages(to_id,message) VALUES (?,?)");
  $stmt->bind_param("ss", $id2, $message);
  $stmt->execute();
  $stmt->close();
  
  echo json_encode(array("message"=>$message));
?>