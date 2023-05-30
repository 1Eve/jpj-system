<?php

/**
 * Template Name: Launched Tasks Page
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;
$table = $wpdb->prefix . 'projects';

$tasks = $wpdb->get_results("SELECT * FROM $table where status='Completed'");
?>
<?php get_header(); ?>


<section class="Dashboard">
    <div class="sidebar">
        <div>
            <i class="bi bi-microsoft"></i>
            <a href="">Dashboard</a>
        </div>
        <div>
            <i class="bi bi-plus-square-fill"></i>
            <a href="">Add New Task</a>
        </div>
        <div>
            <i class="bi bi-binoculars-fill"></i>
            <a href="">View All Tasks</a>
        </div>
        <div>
            <i class="bi bi-check2-circle"></i>
            <a href="">Completed Tasks</a>
        </div>
        <div>
            <i class="bi bi-trash3-fill"></i>
            <a href="">Trash</a>
        </div>
        <div>
            <i class="bi bi-people-fill"></i>
            <a href="">All Employees</a>
        </div>
    </div>




    <div class="Contents-Container">
        <div class="Contents-header">
            <div>
                <p>Launched Tasks</p>
            </div>
            <div>
                <i class="bi bi-laptop"></i>
                <p>Status Tracker</p>
            </div>
        </div>
        <hr>
        <?php if(empty($tasks)){ ?>
            <div class="bg-light h-75 d-flex justify-content-center align-items-center">
                <h2 class="text-center">No Launched Tasks</h2>
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
                        <p class="employee-name"><?php echo $task->employee_name; ?></p>
                    </div>
                    <div class="project-info">
                        <p class="project-title"><?php echo $task->project_title; ?></p>
                        <p class="project-description"><?php echo $task->project_desc; ?></p>
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
                                <p><?php echo $task->due_date; ?></p>
                            </div>
                            <div class="rocket">
                                <p><?php echo $task->status; ?></p>
                                <i class="bi bi-rocket-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="edit">
                            <button><i class="bi bi-pencil-square"></i>Edit</button>
                        </div>
                        <div class="delete">
                            <button><i class="bi bi-trash3-fill"></i>Delete</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
    </div>
    </a>

</section>