<?php

/**
 * Template Name: View All Tasks
 */

?>
<?php get_header(); ?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';
?>

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
                <p>All Task</p>
            </div>
            <div>
                <i class="bi bi-laptop"></i>
                <p>Status Tracker</p>
            </div>
        </div>
        <hr>
        <a href="http://localhost/jpj-system/clicked-project/">
            <div class="Contents">
                <div class="profile-pic">
                    <div class="avatar">
                        <img src="<?php echo $avatar ?>" alt="avatar">
                    </div>
                    <p class="employee-name">Employee Name</p>
                </div>
                <div class="project-info">
                    <p class="project-title">Sample Title</p>
                    <p class="project-description">Lorem ipsum dolor sit amet, consectetur adipiscing elite Lorem ipsum
                        dolor sit amet, consectetur adipiscing elit</p>
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
                        <div class=" due-date">
                            <p>April 15, 2023</p>
                        </div>
                        <div class="rocket">
                            <p>Launched</p>
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
            <div class="Contents">
                <div class="profile-pic">
                    <div class="avatar">
                        <img src="<?php echo $avatar ?>" alt="avatar">
                    </div>
                    <p class="employee-name">Employee Name</p>
                </div>
                <div class="project-info">
                    <p class="project-title">Sample Title</p>
                    <p class="project-description">Lorem ipsum dolor sit amet, consectetur adipiscing elite Lorem ipsum
                        dolor sit amet, consectetur adipiscing elit</p>
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
                        <div class=" due-date">
                            <p>April 15, 2023</p>
                        </div>
                        <div class="rocket">
                            <p>Launched</p>
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
    </div>
    </a>
</section>