<?php

/**
 * Template Name: Employees Page
 */

?>
<?php
if ( !current_user_can( 'manage_options' )) {
    wp_redirect('/jpj-system/user-dashboard');
    exit;
}

$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;
$table = $wpdb->prefix . 'users';

$employees = $wpdb->get_results("SELECT * FROM $table");

if(isset($_POST['search'])){
    $search = $_POST['searchinput'];
    $employees = $wpdb->get_results("SELECT * FROM $table WHERE display_name LIKE '%$search%'");
}
?>
<?php get_header(); ?>


<section class="Dashboard">
<div class="sidebar">
        <div class="sidebar-link">
            <div class="side-bar-details">
                <div>
                    <span><i class="bi bi-microsoft"></i></span>
                    <a href="/jpj-system/admin/">Dashboard</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-plus-square-fill"></i></span>
                    <a href="/jpj-system/create-project">Add New Task</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-binoculars-fill"></i></span>
                    <a href="/jpj-system/view-all-tasks">View All Tasks</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-check2-circle"></i></span>
                    <a href="/jpj-system/completed-tasks">Completed Tasks</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-trash3-fill"></i></span>
                    <a href="/jpj-system/trash">Trash</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-people-fill"></i></span>
                    <a href="/jpj-system/employees">All Employees</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-arrow-up-right"></i></span>
                    <a href="/jpj-system/pms.php">My Wordpress</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="Contents-Container">
        <div class="Contents-header">
            <div>
                <form action="" method="post">
                    <input type="search" name="searchinput" placeholder="Who are you looking for?">
                    <button name="search" type="submit">Search</button>
                </form>
                <!-- <p>All Employees</p> -->
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

        } else {?>
        <div class="employee-section">
        <?php
        foreach ($employees as $employee) {
        ?>
            <a href="http://localhost/jpj-system/clicked-project?id=<?php echo $employee->id; ?>">
            
                <div class="Contents-employee">
                        <div class="profile-pic">
                            <div class="avatar">
                                <img src="<?php echo $avatar ?>" alt="avatar">
                            </div>
                            <p class="employee-name"><?php echo $employee->display_name; ?></p>
                        </div>                  
                    </div>
               
            <?php } ?>
            </div>
            <?php } ?>

    </div>
    </a>

</section>