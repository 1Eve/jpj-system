<?php

/**
 * Template Name: Admin
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;
$table = $wpdb->prefix . 'projects';

$tasks = $wpdb->get_results("SELECT * FROM $table");
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
                <p>All Task</p>
            </div>
            <div>
                <i class="bi bi-laptop"></i>
                <p>Status Tracker</p>
            </div>
        </div>
        <hr>
        <?php if (empty($tasks)) { ?>
            <div class="bg-light h-75 d-flex justify-content-center align-items-center">
                <h2 class="text-center">No Tasks</h2>
            </div>
            <?php
        } else {
            foreach ($tasks as $task) {
                ?>
                <a href="http://localhost/jpj-system/clicked-project?id=<?php echo $task->id; ?>">
                    <div class="Contents">
                        <div class="profile-pic">
                            <div class="avatar">
                                <img src="<?php echo $avatar ?>" alt="avatar">
                            </div>
                            <p class="employee-name">
                                <?php echo $task->employee_name; ?>
                            </p>
                        </div>
                        <div class="project-info">
                            <p class="project-title">
                                <?php echo $task->project_title; ?>
                            </p>
                            <p class="project-description">
                                <?php echo $task->project_desc; ?>
                            </p>
                        </div>
                        <div class="Status">
                            <div class="status-tracker">
                                <div>
                                    <p>Due:</p>
                                </div>
                                <div>
                                    <p>Status:</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <p>
                                        <?php echo $task->due_date; ?>
                                    </p>
                                </div>
                                <div class="rocket">
                                    <p>
                                        <?php echo $task->status; ?>
                                    </p>
                                    <i class="bi bi-rocket-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
    </div>
    </a>

</section>