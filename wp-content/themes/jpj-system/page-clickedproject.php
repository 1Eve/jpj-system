<?php

/**
 * Template Name: Clicked Project
 */

?>

<?php get_header(); ?>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';
?>

<section class="Widely-View-Projects">
    <div class="Content">
        <div class="profile-pic">
            <div class="avatar">
                <img src="<?php echo $avatar ?>" alt="avatar">
            </div>
            <p class="employee-name">Employee Name</p>
        </div>
        <div class="project-info">
            <p class="project-title">Sample Title</p>
            <p class="full-project-description">Lorem ipsum dolor sit amet,
                sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                consectetur adipiscing elite Lorem ipsum
                dolor sit amet, consectetur adipiscing elit Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Reiciendis tempore quis ipsum! Consequatur nesciunt, iusto dolores explicabo illo doloremque
                perspiciatis. Nobis praesentium sapiente itaque in veniam! Ad impedit sed eaque?</p>
        </div>
        <div class="buttons">
            <div class="edit">
                <button>Edit</button>
            </div>
            <div class="delete">
                <button>Delete</button>
            </div>
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
    </div>
</section>