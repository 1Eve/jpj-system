<?php

/**
 * Template Name: Update Project
 */

?>
<?php
if ( !current_user_can( 'manage_options' )) {
    wp_redirect('/jpj-system/user-dashboard');
    exit;
}

global $wpdb;

global $successmessage;
$successmessage = false;

global $errormessage;
$errormessage = false;

$table = $wpdb->prefix . 'projects';
$id = $_GET['id'];
// var_dump($id);


$task = $wpdb->get_row("SELECT * FROM $table WHERE id = $id");

if (isset($_POST['updatebtn'])) {
    $project = [
        'employee_name' => $_POST['employee_name'],
        'project_title' => $_POST['project_title'],
        'project_desc' => $_POST['project_desc'],
        'due_date' => $_POST['due_date'],
    ];

    $id = $_GET['id'];
    $condition = ['id' => $id];

    $updatetask = $wpdb->update($table, $project, $condition);

    if ($updatetask == true) {
        $successmessage = true;

        $project['employee_name'] = '';
        $project['project_title'] = '';
        $project['emloyee_number'] = '';
        $project['project_desc'] = '';
    } else {
        $errormessage = true;
    }

    var_dump($updatetask);
    wp_redirect('/jpj-system/clicked-project?id=' . $task->id);
}

get_header();

?>

<style>
    .update-btn {
        background-color: #6E3EF3;
        width: 80%;
        border: hidden;
        border-radius: 10px;
        cursor: pointer;
        color: #FFFFFF;
        height: 45px;
    }
    .update-input input, textarea, select{
        /* background: red; */
        border: 1px solid #C5C6D0;
        border-radius: 10px;
        padding-left: 10px;
    }
    @media screen and (max-width: 330px){

    }
</style>

<div>
    <!-- success message -->
    <?php
    echo '<div class="alert alert-success" role="alert" id="success">
                Project Updated!
             </div>';

    echo '<script> document.getElementById("success").style.display = "none"; </script>';

    if ($successmessage == true) {
        echo '<script> document.getElementById("success").style.display = "flex"; </script>';

        echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("success").style.display ="none";
                        }, 3000);
                    </script>';
    }

    ?>

    <!-- error message -->
    <?php
    echo '<div class="alert alert-danger" role="alert" id="error">
               An error occurred while updating the project. Please try again!
             </div>';

    echo '<script> document.getElementById("error").style.display = "none"; </script>';

    if ($errormessage == true) {
        echo '<script> document.getElementById("error").style.display = "flex"; </script>';

        echo    '<script> 
                        setTimeout(function(){
                            document.getElementById("error").style.display ="none";
                        }, 3000);
                    </script>';
    }
    ?>
    <div class="d-flex flex-column m-auto gap-2">
        <form action="" method="post">
            <h2 class="text-center">Update Project</h2>
            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="employee_name">Employee Name</label>
                    <div class="update-input">
                    <?php
                            function get_employees() {
                                // fetch employees
                                $users = get_users();
                    
                                $employee = '<select name="employee_name" class="round rounded-1" style="width: 300px; height: 36px;">';
                                $employee .= '<option value="Select employee">Select employee</option>';
                            
                                // Loop through the users and add options to the dropdown
                                foreach ($users as $user) {
                                    $display_name = $user->display_name;
                            
                                    // Add an option for each employee
                                    $employee .= '<option value="' . $display_name . '">' . $display_name . '</option>';
                                }
                            
                                $employee .= '</select>';
                        
                                echo $employee;
                            }
                            get_employees();
                            
                        ?>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="project_title">Project Title</label>
                    <div class="update-input">
                        <input class="update-input" style="width: 400px; height: 36px;" type="text" name="project_title" value="<?php echo $task->project_title; ?>">
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="project_desc">Project Description</label>
                    <div class="update-input">
                        <textarea cols="52" rows="4" type="text" name="project_desc" value="<?php echo $task->project_desc; ?>"><?php echo $task->project_desc; ?></textarea>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="due_date">Due date</label>
                    <div class="update-input">
                        <input class="update-input" style="width: 400px; height: 36px;" type="date" name="due_date" value="<?php echo $task->due_date; ?>">
                    </div>
                </div>
                <div class="mt-2">
                    <button class="update-btn" style="width: 250px" type="submit" name="updatebtn">Update Project</button>
                </div>
            </div>
        </form>
    </div>
</div>