<?php

/**
 * Template Name: Trash Page
 */

?>
<?php
// if ( ! current_user_can( 'administrator' ) || ! is_admin() ) {
//     wp_redirect('/jpj-system/user-dashboard');
//     exit;
// }

$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

global $wpdb;
$table = $wpdb->prefix . 'projects';

$tasks = $wpdb->get_results("SELECT * FROM $table where is_deleted=1");

if (isset($_POST['delete'])) {
    $result = $wpdb->query("DELETE FROM $table WHERE id=$tasks->id");

    if (!$result) {
        $error = "Error deleting ticket";
    }
}
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
                <p>Trash</p>
            </div>
            <div>
                <i class="bi bi-laptop"></i>
                <p>Status Tracker</p>
            </div>
        </div>
        <hr>
        <?php if (empty($tasks)) { ?>
            <div class="bg-light h-75 d-flex justify-content-center align-items-center">
                <h2 class="text-center">No Trash</h2>
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
                            <div class="delete">
                                <button name="delete"><i class="bi bi-trash3-fill"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
    </div>
    </a>

</section>