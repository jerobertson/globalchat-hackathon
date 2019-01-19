<?php
  include "connection.php";
  
  $id = $_POST['k'];
  
  $stmt = $conn->prepare("SELECT message FROM messages WHERE to_id=?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->bind_result($dummy);
  $stmt->store_result();
  $rowCount = $stmt->num_rows();
  $stmt->close();
  
  if ($rowCount > 0) {
    $stmt = $conn->prepare("SELECT message FROM messages WHERE to_id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($message);
    $stmt->fetch();
    $stmt->close();
    
    $stmt = $conn->prepare("DELETE FROM messages WHERE to_id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();
    
    echo json_encode(array("message"=>$message));
  }
?>