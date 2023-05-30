<?php

/**
 * Template Name: User Dashboard
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';
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
                    <p class="employee-name">Employee Name</p>
                </div>
                <div class="project-info">
                    <p class="project-title">Sample Title</p>
                    <p class="project-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris</p>
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
                            <p>April 15, 2023</p>
                        </div>
                        <div class="rocket">
                            <p>Launched</p>
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