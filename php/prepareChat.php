<?php
  include "connection.php";
  
  $id = $_POST['k'];
  
  $stmt = $conn->prepare("SELECT cl2_id FROM id_pairs WHERE cl1_id=?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->bind_result($id2);
  $stmt->fetch();
  $stmt->close();
  
  $stmt = $conn->prepare("SELECT id FROM has_accessed WHERE id=?");
  $stmt->bind_param("s", $id2);
  $stmt->execute();
  $stmt->bind_result($dummy);
  $stmt->store_result();
  $rowCount = $stmt->num_rows();
  $stmt->close();
  
  if ($rowCount > 0) {
    echo json_encode(array("ready"=>1));
  }
  else {
    echo json_encode(array("notready"=>1));
  }
?>