<?php  include "header.php"; ?>

 <div class="container table-container">

    <div class="row">
        <div class="col-md-5 titulli_majtas">
            <br>
            <h2>Table of Employee</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?php 
                if(isset($_SESSION["username"])){
                echo '<a href = "logout.php">Logout</a>';
                }else{
                    header("location: login.php");
                }
            ?>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-1 butoni_djathtas">
            <button type="button" class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
        </div>
    </div>
    <br>
</div>
        

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="forma_shtimit">
      <div class="modal-body">
        <input class="form-control" type="text" name="name" id="name" value="Name" /><br>
        <input class="form-control" type="text" name="email" id="email" value="Email" /><br>
        <input class="form-control" type="text" name="salary" id="salary" value="Salary" /><br>
        <input class="form-control" type="date" name="start_date" id="start_date" value="Start_date" /><br>
        <input class="form-control" type="text" name="job_role" id="job_role" value="Job_role" /><br>
        <input class="form-control" type="text" name="status" id="status" value="Status" /><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="butsave" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- update modal -->
<div class="modal" id="edit-cars-modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Edit Data</h4>
			        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
		      	</div>
		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="update.php" id="editForm">
		        		<input class="form-control" type="hidden" class="id" name="id">
				    	<div class="form-group">
						    <label for="email">Name</label>
						    <input class="form-control updatename" type="text" name="updatename">
					  	</div><br>
					  	<div class="form-group">
						    <label for="first_name">Email</label>
						    <input class="form-control updateemail" type="text" name="updateemail">
					  	</div><br>
					  	<div class="form-group">
						    <label for="last_name">Salary</label>
						    <input class="form-control updatesalary" type="text" name="updatesalary">
					  	</div><br>
					  	<div class="form-group">
						    <label for="date">Start Date</label>
						    <input class="form-control update_start_date" type="date" name="update_start_date" >
					  	</div><br>
              <div class="form-group">
						    <label for="address">Job Role</label>
						    <input class="form-control update_job_role" type="text" name="update_job_role">
					  	</div><br>
              <div class="form-group">
						    <label for="address">Status</label>
						    <input class="form-control update_status" type="text" name="update_status" >
					  	</div><br>
					  	<button type="button" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
					  	<button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Close</button>
					</form>
		      	</div>
		    </div>
	  	</div>
</div>


<!-- end update modal -->
<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">  
                <p class="text-center">Are you sure you want to Delete this Employee?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="container table-container">
   <div class="row">
       <div class="col-md-12">
            <?php 
                $stmt = $conn->query("SELECT * FROM employee_list");
                $result = $stmt->fetchAll();
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Start Date</th>
                        <th>Job Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($result as $row){ ?>
                    <tr>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td><?php echo $row['Salary'];?></td>
                        <td><?php echo $row['Start_date'];?></td>
                        <td><?php echo $row['Job_role'];?></td>
                        <td><?php echo $row['Status'];?></td>
                        <td>
                            <button class="btn btn-sm btn-success edit" data-id="<?php echo $row['ID'];?>">Edit</button> 
                            <button class="btn btn-sm btn-danger delete" data-id="<?php echo $row['ID'];?>">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
           
       </div>
   </div>

</div>



<?php include "footer.php"; ?>