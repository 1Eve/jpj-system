<?php

/**
 * Template Name: User Dashboard
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

if(is_user_logged_in()){
    $user = wp_get_current_user();
    $name = $user->display_name;
    

    global $wpdb;
    $table = $wpdb->prefix . 'users';
    $project = $wpdb->prefix . 'projects';

    $tasks = $wpdb->get_row("SELECT * FROM $project where employee_name = $name");

?>
<?php get_header(); ?>


<section class="Dashboard">
    <div class="sidebar">
        <div>
            <i class="bi bi-microsoft"></i>
            <a href="">Dashboard</a>
        </div>
        <div>
            <i class="bi bi-check2-circle"></i>
            <a href="">Completed Tasks</a>
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
        <a href="http://localhost/jpj-system/user-clicked-project/">
            <div class="user-contents">
                <div class="profile-pic">
                    <div class="avatar">
                        <img src="<?php echo $avatar ?>" alt="avatar">
                    </div>
                    <p class="employee-name"><?php $tasks->employee_name; ?></p>
                </div>
                <div class="project-info">
                    <p class="project-title"><?php $tasks->project_title; ?></p>
                    <p class="project-description"><?php $tasks->project_desc; ?></p>
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
                            <p><?php $tasks->due_date; ?></p>
                        </div>
                        <div class="rocket">
                            <p><?php $tasks->status; ?></p>
                            <i class="bi bi-rocket-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <div class="edit">
                        <button><i class="bi bi-check-circle-fill"></i>Complete</button>
                    </div>
                 
                </div>
            </div>

        </a>
    </div>

</section>

<?php } ?>
