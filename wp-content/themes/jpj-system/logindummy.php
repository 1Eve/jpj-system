<?php

/**
 * Template Name: Login Dummy
 */

?>
<?php
$loginphoto = get_template_directory_uri() . '/assets/login.png';
?>


<section class="login-container">
    <div>
        <?php get_header(); ?>
        <div class="login-form">
            <div class="login-details-container">
                <form action="">
                    <label for="">Email</label>
                    <input type="text">
                    <label for="">Password</label>
                    <input type="password" name="" id="">
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="login-picture-container">
                <div>
                    <img src="<?php echo $loginphoto ?>" alt="avatar">
                </div>
            </div>
        </div>
    </div>
</section>

