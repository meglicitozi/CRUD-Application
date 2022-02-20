
function getDetails(id){
    $.ajax({
        method: 'POST',
        url: 'fetch_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
            if(response.error){
                $('#edit').modal('hide');
                $('#delete').modal('hide');
                $('#alert').show();
                $('#alert_message').html(response.message);
            }
            else{
                $('.id').val(response.data.id);
                $('.updatename').val(response.data.Name);
                $('.updateemail').val(response.data.Email);
                $('.updatesalary').val(response.data.Salary);
                $('.update_start_date').val(response.data.Start_date);
                $('.update_job_role').val(response.data.Job_role);
                $('.update_status').val(response.data.Status);
            }
        }
    });
}

/* ==== Document ready jquery ==== */
$( document ).ready(function() {
    $("#butsave").on('click', function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var salary = $("#salary").val();
        var start_date = $("#start_date").val();
        var job_role = $("#job_role").val();
        var status = $("#status").val();
        if(name!="" && email!="" && salary!="" && start_date!="" && job_role!="" && status!=""){
            $.ajax({
                url: "addemployee.php",
                type: "POST",
                data:{
                     name:name,
                     email: email,
                     salary: salary,
                     start_date: start_date,
                     job_role: job_role,
                     status: status
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200){
                        $('#exampleModal').hide();
                        alert("Data was successfully added!")
                    }else if(dataResult.statusCode == 201){
                        alert("There is an increasing problem!");
                    }
                }
            });
        }else{
            alert("Please fill in all the fields!!");
        }
    });


    //edit
    $(document).on('click', '.edit', function(){
        var id = $(this).data('id');
        getDetails(id);
        $('#edit-cars-modal').modal('show');
    });
    $('#editForm').submit(function(e){
        e.preventDefault();
        var editform = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'edit.php',
            data: editform,
            dataType:'json',
            success: function(response){
                if(response.error){
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                }
                else{
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                    fetch();
                }
 
                $('#edit').modal('hide');
            }
        });
    });


     //delete
     $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        getDetails(id);
        $('#delete').modal('show');
    });
 
    $('.id').click(function(){
        var id = $(this).val();
        $.ajax({
            method: 'POST', 
            url: 'delete.php',
            data: {id:id},
            dataType:'json',
            success: function(response){
                if(response.error){
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                }
                else{
                    $('#alert').show();
                    $('#alert_message').html(response.message);
                    fetch();
                }
                 
                $('#delete').modal('hide');
            }
        });
    });
    
   
});