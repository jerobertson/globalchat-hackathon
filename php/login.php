<?php
  include "connection.php";
  
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
  $charactersLength = strlen($characters);
  $id1 = '';
  $id2 = '';
  for ($i = 0; $i < 16; $i++) {
    $id1 .= $characters[rand(0, $charactersLength - 1)];
    $id2 .= $characters[rand(0, $charactersLength - 1)];
  }
  
  $stmt = $conn->prepare("INSERT INTO ids(id) VALUES (?)");
  $stmt->bind_param("s", $id1);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO ids(id) VALUES (?)");
  $stmt->bind_param("s", $id2);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO has_accessed(id) VALUES (?)");
  $stmt->bind_param("s", $id1);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO id_pairs(cl1_id, cl2_id) VALUES (?,?)");
  $stmt->bind_param("ss", $id1, $id2);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("INSERT INTO id_pairs(cl2_id, cl1_id) VALUES (?,?)");
  $stmt->bind_param("ss", $id1, $id2);
  $stmt->execute();
  $stmt->close();
  
  echo json_encode(array("k"=>$id1));
?>