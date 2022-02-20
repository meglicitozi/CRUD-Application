<?php
    include "header.php";
 
    $output = array('error' => false);
 
    try{
        $sql = "DELETE FROM employee_list WHERE id = '".$_POST['id']."'";
        //if-else statement executing query
        if($conn->exec($sql)){
            $output['message'] = 'Member deleted successfully!';
        }
        else{
            $output['error'] = true;
            $output['message'] = 'Something went wrong. Cannot delete the member.';
        } 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();;
    }

    echo json_encode($output);

    include "footer.php";

?>