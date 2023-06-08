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
    $user_login = wp_get_current_user()->user_login;

    $task = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '$user_login' AND status !='Completed'");



    if (isset($_POST['launchbtn'])) {
        $launch_id = $_POST['launch_id'];
        $result = $wpdb->query("UPDATE $table SET status='Launched' WHERE id=$launch_id");
        if ($result) {
            echo "<script>
                    var yes = confirm('Are you sure you want to activate this task?');
                    if (yes) {
                        alert('Task Activated');
                    } else {
                        alert('Task not activated');
                    }
                </script>";

                $task = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '$user_login' AND status !='Completed'");
        } else {
            $error = "Error updating ticket";
        }
    }

    if (isset($_POST['markcompletebtn'])) {
        $markcomplete_id = $_POST['markcomplete_id'];
        $result = $wpdb->query("UPDATE $table SET status='Completed' WHERE id=$markcomplete_id");
        if ($result) {
            echo "<script>
                    var yes = confirm('Are you sure you want to mark this task as complete?');
                    if (yes) {
                        alert('Task marked as complete');
                    } else {
                        alert('Task not marked as complete');
                    }
                </script>";
                $task = $wpdb->get_row("SELECT * FROM $table WHERE employee_name = '$user_login' AND status !='Completed'");
        } else {
            $error = "Error updating ticket";
        }
    }

    
        
?>
    <?php get_header(); ?>


<section class="Dashboard">
    <div class="sidebar">
        <div class="sidebar-link">
            <div class="side-bar-details">
                <div>     
                    <span><i class="bi bi-microsoft"></i></span> 
                    <a href="/jpj-system/user-dashboard/">Dashboard</a>
                    <div class="aarrow">
                        <i class=" bi bi-chevron-right"></i>
                    </div>
                </div>
                <div>
                    <span><i class="bi bi-check2-circle"></i></span>
                    <a href="/jpj-system/user-completed-tasks/">Completed Tasks</a>
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
            <?php if (empty($task)) { ?>
            <div class="bg-light h-75 d-flex justify-content-center align-items-center">
                <h2 class="text-center">No Active Task</h2>
            </div>
            <?php
                } else {
            ?>
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
                                    <input type="hidden" name="launch_id" value="<?php echo $task->id; ?>">
                                    <button type="submit" name="launchbtn"><i class="bi bi-pencil-square"></i>Activate</button>
                                </form>
                            <?php
                            } else if ($task->status == 'Launched') {
                            ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="markcomplete_id" value="<?php echo $task->id; ?>">
                                    <button type="submit" name="markcompletebtn"><i class="bi bi-pencil-square"></i>Completed</button>
                                </form>
                            <?php
                            } else if ($task->status == 'Completed') {
                            ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="completed_id" value="<?php echo $task->id; ?>">
                                    <button type="submit" name="completedbtn"><i class="completedbtn bi bi-check-circle-fill"></i>Erase</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    
<?php } ?>

