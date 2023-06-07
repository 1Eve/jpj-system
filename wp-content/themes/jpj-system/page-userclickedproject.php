<?php

/**
 * Template Name: User clicked Project
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

if (is_user_logged_in()) {
    global $wpdb;
    $table = $wpdb->prefix . 'projects';
    $id = get_current_user_id();
    $user_login = wp_get_current_user()->user_login;

    // Modify the query to fetch projects for the logged-in user
    $task = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '$user_login' AND status='Completed'");

}

?>
<section class="Widely-View-Projects">
    <div>
        <?php get_header(); ?>
    </div>
    <div class="Content">
        <div class="profile-pic">
            <div class="avatar">
                <img src="<?php echo $avatar ?>" alt="avatar">
            </div>
            <p class="employee-name"><?php echo $task->employee_name; ?></p>
        </div>
        <div class="project-info">
            <p class="project-title"><?php echo $task->project_title; ?></p>
            <p class="full-project-description"><?php echo $task->project_desc; ?></p>
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
            <div class="delete">  
                <button><i class="bi bi-trash3-fill"></i>Erase</button>
            </div>
        </div>
    </div>
</section>
