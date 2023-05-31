<?php

/**
 * Template Name: Employees Page
 */

?>
<?php
// if ( ! current_user_can( 'administrator' ) || ! is_admin() ) {
//     wp_redirect('/jpj-system/user-dashboard');
//     exit;
// }

$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;
$table = $wpdb->prefix . 'users';

$employees = $wpdb->get_results("SELECT * FROM $table");
?>
<?php get_header(); ?>


<section class="Dashboard">
    <div class="sidebar">
        <div>
            <i class="bi bi-microsoft"></i>
            <a href="/jpj-system/">Dashboard</a>
        </div>
        <div>
            <i class="bi bi-plus-square-fill"></i>
            <a href="/jpj-system/create-project">Add New Task</a>
        </div>
        <div>
            <i class="bi bi-binoculars-fill"></i>
            <a href="/jpj-system/view-all-tasks">View All Tasks</a>
        </div>
        <div>
            <i class="bi bi-check2-circle"></i>
            <a href="/jpj-system/completed-tasks">Completed Tasks</a>
        </div>
        <div>
            <i class="bi bi-trash3-fill"></i>
            <a href="/jpj-system/trash">Trash</a>
        </div>
        <div>
            <i class="bi bi-people-fill"></i>
            <a href="/jpj-system/employees">All Employees</a>
        </div>
    </div>




    <div class="Contents-Container">
        <div class="Contents-header">
            <div>
                <input type="search" name="serch" placeholder="Who are you looking for?">
                <p>All Employees</p>
            </div>
            <div style="display: none;">
                <i class="bi bi-laptop"></i>
                <p>Status Tracker</p>
            </div>
        </div>
        <hr>
        <?php if(empty($employees)){ ?>
            <div class="bg-light h-75 d-flex justify-content-center align-items-center">
                <h2 class="text-center">No employees</h2>
            </div>
        <?php
        } else {
        foreach ($employees as $employee) {
        ?>
            <a href="http://localhost/jpj-system/clicked-project?id=<?php echo $employee->id; ?>">
                <div class="Contents">
                    <div class="profile-pic">
                        <div class="avatar">
                            <img src="<?php echo $avatar ?>" alt="avatar">
                        </div>
                        <p class="employee-name"><?php echo $employee->display_name; ?></p>
                    </div>
                    <div class="project-info">
                        <p class="project-description"><?php echo $employee->project_desc; ?></p>
                    </div>                    
                </div>
            <?php } ?>
            <?php } ?>
    </div>
    </a>

</section>