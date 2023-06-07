<?php

/**
 * Template Name: Create Project
 */

?>
<?php
if (!current_user_can('manage_options')) {
    wp_redirect('/jpj-system/user-dashboard');
    exit;
}

global $wpdb;

global $successmessage;
$successmessage = false;

global $errormessage;
$errormessage = false;

$table = $wpdb->prefix . 'projects';

$project_info = "CREATE TABLE IF NOT EXISTS " . $table . "(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    employee_name text NOT NULL,
    project_title text NOT NULL,
    project_desc text NOT NULL,
    due_date text NOT NULL,
    user_description text NOT NULL,
    status text DEFAULT 'Unlaunched',
    is_deleted int DEFAULT 0
);";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($project_info);


// $project_count = count_users();
// $projects_total = $user_count['total_users'];

// "Staff" . ($users_total + 1),
if (isset($_POST['createbtn'])) {
    $project = [
        'employee_name' => $_POST['employee_name'],
        'project_title' => $_POST['project_title'],
        'project_desc' => $_POST['project_desc'],
        'due_date' => $_POST['due_date'],
    ];

    //check if user has been assigned a task
    $is_assigned = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '" . $_POST['employee_name'] . "'");
    if ($is_assigned && $is_assigned->status != 'Completed') {
        echo "<script>alert('Employee has been assigned another task')</script>";
    } else {
        $newtask = $wpdb->insert($table, $project);

        if ($newtask == true) {
            $successmessage = true;

            $project['employee_name'] = '';
            $project['project_title'] = '';
            $project['emloyee_number'] = '';
            $project['project_desc'] = '';
        } else {
            $errormessage = true;
        }
    }

    // var_dump($newtask);
    wp_redirect('/jpj-system/admin');

}

// if (isset($_POST['createbtn'])) {
//     $project = [
//         'employee_name' => $_POST['employee_name'],

//     ];

//     //check if user has been assigned a task
//     $is_assigned = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '{$_POST['employee_name']}' AND status = 'Unlaunched' AND status = 'Launched'");
//     if ($is_assigned) {
//         echo "<script>alert('Employee description has been added')</script>";
//     } else {
//     $newtask = $wpdb->update($table, $project);

//     if ($newtask == true) {
//         $successmessage = true;

//         $project['employee_name'] = '';
//         $project['employee_description'] = '';

//     } else {
//         $errormessage = true;
//     }

// }

// }

get_header();

?>

<style>
    .create-btn {
        background-color: #6E3EF3;
        width: 80%;
        border: hidden;
        border-radius: 10px;
        cursor: pointer;
        color: #FFFFFF;
        height: 45px;
    }

    .update-input input,
    textarea,
    select {
        /* background: red; */
        border: 1px solid #C5C6D0;
        border-radius: 10px;
        padding-left: 10px;
    }
</style>

<div>
    <!-- success message -->
    <?php
    echo '<div class="alert alert-success" role="alert" id="success">
                New project created successfully
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
               An error occurred while creating a new project. Please try again!
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

    <div class="w-75 d-flex flex-column m-auto gap-2">
        <form action="" method="post">
            <h2 class="text-center">Create a New Project</h2>
            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="employee_name">Employee Name</label>
                    <div class="update-input">
                        <?php
                        function get_employees()
                        {
                            global $wpdb;

                            $table_project = $wpdb->prefix . 'projects';
                            $table_user = $wpdb->prefix . 'users';

                            // fetch employees
                            $users = $wpdb->get_results("SELECT *
                            FROM $table_user
                            WHERE user_login COLLATE utf8mb4_unicode_ci NOT IN (SELECT employee_name COLLATE utf8mb4_unicode_ci FROM $table_project WHERE status = 'Completed')
                            ");

                            $employee = '<select name="employee_name" class="update-input" style="width: 300px; height: 36px;">';
                            $employee .= '<option value="Select employee">Select employee</option>';

                            //loop over users
                            foreach ($users as $user) {

                                // Add an option for each employee
                                $employee .= '<option value="' . $user->user_login . '">' . $user->user_login . '</option>';
                            }

                            $employee .= '</select>';

                            echo $employee;
                        }
                        get_employees();

                        ?>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="project_title">Project Title</label>
                    <div class="update-input">
                        <input class="round rounded-1" style="width: 300px; height: 36px;" type="text" name="project_title" placeholder="Enter project title">
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="project_desc">Project Description</label>
                    <div class="update-input">
                        <textarea cols="38" rows="4" class="round rounded-1" type="text" name="project_desc" value="Enter project description"></textarea>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start gap-2">
                    <label for="due_date">Due date</label>
                    <div class="update-input">
                        <input class="round rounded-1" style="width: 300px; height: 36px;" type="date" min="" name="due_date">
                    </div>
                </div>
                <div class="mt-2">
                    <button class="create-btn" style="width: 250px" type="submit" name="createbtn">Create Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
