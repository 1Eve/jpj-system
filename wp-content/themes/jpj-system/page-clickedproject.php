<?php

/**
 * Template Name: Clicked Project
 */

?>

<?php get_header(); ?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;

$table = $wpdb->prefix . 'projects';
$id = $_GET['id'];
var_dump($id);


$task = $wpdb->get_row("SELECT * FROM $table WHERE id = $id");


if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];


    $result = $wpdb->query("UPDATE $table SET is_deleted=1 WHERE id=$id");

    if (!$result) {
        $error = "Error deleting ticket";
    }
}

?>
<?php get_header(); ?>


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
            <div class="edit">         
                <button><i class="bi bi-pencil-square"></i>Edit</button>
            </div>
            <div class="delete">  
                <button><i class="bi bi-trash3-fill"></i>Delete</button>
            </div>
        </div>
    </div>
</section>