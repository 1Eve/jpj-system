<?php

/**
 * Template Name: User Dashboard
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';

if (is_user_logged_in()) {
    global $wpdb;
    $table = $wpdb->prefix . 'projects';
    $id = get_current_user_id();

    // Modify the query to fetch projects for the logged-in user
    $tasks = $wpdb->get_results("SELECT * FROM $table WHERE id = $id");


    foreach ($tasks as $task) {
        // var_dump($task);
    }

    if (isset($_POST['launchbtn'])) {
        $id = $_POST['launch_id'];
        var_dump($id);
        $result = $wpdb->query("UPDATE $table SET status='Launched' WHERE id=$id");
        if (!$result) {
            $error = "Error updating ticket";
        }
    }

    if(isset($_POST['markcompletebtn'])) {
        $id = $_POST['markcomplete_id'];
        $result = $wpdb->query("UPDATE $table SET status='Completed' WHERE id=$id");
        if (!$result) {
            $error = "Error updating ticket";
        }
    } 


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
                    <div class="button">
                        <div class="edit">
                            <?php
                            if ($task->status == 'Unlaunched') {

                            ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="launch_id" value="<?php echo $task->status; ?>">
                                    <button type="submit" name="launchbtn"><i class="bi bi-pencil-square"></i>Activate</button>
                                </form>
                            <?php
                            } else if ($task->status == 'Launched') {
                            ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="markcomplete_id" value="<?php echo $task->status; ?>">
                                    <button type="submit" name="markcompletebtn"><i class="bi bi-pencil-square"></i>Mark as Complete</button>
                                </form>
                            <?php
                            } else if ($task->status == 'Completed') {
                            ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="completed_id" value="<?php echo $task->status; ?>">
                                    <button type="submit" name="completedbtn"><i class="bi bi-check-circle-fill"></i>Completed</button>
                                </form>
                            <?php
                            }
                            ?>
                            <!-- <button><i class="bi bi-check-circle-fill"></i>Complete</button> -->
                        </div>

                    </div>
                </div>

            </a>
        </div>

    </section>

<?php } ?>