<?php
    include  "header.php";

    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM employee_list WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $output = $stmt->fetch();
 
    return json_encode($output);

    include "footer.php";

?>