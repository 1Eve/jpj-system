<?php

/**
 * Template Name: Clicked Project
 */

?>

<?php get_header(); ?>
<?php
if (!current_user_can('manage_options')) {
    wp_redirect('/jpj-system/user-dashboard');
    exit;
}

$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;

$table = $wpdb->prefix . 'projects';
$id = $_GET['id'];



$task = $wpdb->get_row("SELECT * FROM $table WHERE id = $id");


if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

    if (!$result) {
        $error = "Error deleting ticket";
    }
}

?>
<?php get_header(); ?>


<section class="Widely-View-Projects">
    <div class="back">
        <a href="http://localhost/jpj-system/admin/"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
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
        <?php 
        if($task->status == 'Completed') {
            echo '<div class="buttons">
            <div class="delete">  
                <button><i class="bi bi-trash3-fill"></i>Erase</button>
            </div>';
        } else {
        ?>
        <div class="buttons">
            <div class="edit">
                <a href="<?php echo site_url('jpj-system/update-project?id=').$id; ?>"><button><i class="bi bi-pencil-square"></i>Edit</button></a>
            </div>
            <div class="delete">
                <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $task->id; ?>">
                    <button type="submit" name="delete_btn"><i class="bi bi-trash3-fill"></i>Delete</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</section>