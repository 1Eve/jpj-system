<?php

/**
 * Template Name: User clicked Project
 */

?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';
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
            <p class="employee-name">Employee Name</p>
        </div>
        <div class="project-info">
            <p class="project-title">Sample Title</p>
            <p class="full-project-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
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
                    <p>April 15, 2023 </p>
                </div>
                <div class="rocket">
                    <p>Launched</p>
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