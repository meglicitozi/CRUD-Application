<?php
    include "header.php";
 
    $output = array('error' => false);
 
    try{
        $id = $_POST['id'];
        $thename = $_POST['updatename'];
        $theemail = $_POST['updateemail'];
        $thesalary = $_POST['updatesalary'];
        $the_start_date = $_POST['update_start_date'];
        $the_job_role = $_POST['update_job_role'];
        $thestatus = $_POST['update_status'];

        $sql = "UPDATE employee SET Name = '$thename', Email = '$theemail', Salary = '$thesalary', 
                Start_date = '$the_start_date', Job_role = '$the_job_role', Status = '$thestatus' WHERE id = '$id' ";
        //if-else statement executing query
        if($conn->exec($sql)){
            $output['message'] = 'Member updated successfully';
        } 
        else{
            $output['error'] = true;
            $output['message'] = 'Something went wrong. Cannot update the member!';
        }
 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    echo json_encode($output);

    include "footer.php"; 

?>