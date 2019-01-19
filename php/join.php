<?php
  include "connection.php";
  
  $id = $_POST['k'];
  
  $stmt = $conn->prepare("INSERT INTO has_accessed(id) VALUES (?)");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("SELECT cl2_id FROM id_pairs WHERE cl1_id=?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->bind_result($id2);
  $stmt->fetch();
  $stmt->close();
  
  echo json_encode(array("k1"=>$id,"k2"=>$id2));
?>