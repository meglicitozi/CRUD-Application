<?php 

include "header.php";

$sql = "INSERT INTO `employee_list` (Name, Email, Salary, Start_date, Job_role, Status) 
                    VALUES(:name, :email, :salary, :start_date, :job_role, :status)";
                    
$stmt = $conn->prepare($sql);

$stmt ->bindParam(':name', $_POST['name']);
$stmt ->bindParam(':email', $_POST['email']);
$stmt ->bindParam(':salary', $_POST['salary']);
$stmt ->bindParam(':start_date', $_POST['start_date']);
$stmt ->bindParam(':job_role', $_POST['job_role']);
$stmt ->bindParam(':status', $_POST['status']);

$result = $stmt->execute(); 

if($result){
    header("Location: http://localhost/CRUD_Application/employeelist.php");
    exit();
}else{
    echo $result;
}

include "footer.php";
?>


