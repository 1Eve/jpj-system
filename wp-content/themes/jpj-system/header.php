<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management System</title>
    <?php wp_head(); ?>
</head>
<?php
$avatar = get_template_directory_uri() . '/custom/memoji-modified.png';
$logo = get_template_directory_uri() . '/custom/memoji.png';
?>

<body>
    <?php
        if(isset($_POST['logout'])){
            wp_logout();
            wp_redirect('/jpj-system/login');
        }
    ?>
    <?php

    $curent_page = basename(get_permalink());
    if ($curent_page == 'login') {
    ?>
        <div class="text-center bg-light text-white pb-3 pt-3 mb-4">
            <nav>
                <a href="/jpj-system/">JPJ Management System</h2>
            </nav>
        </div>

    <?php
    } else {
        if (is_user_logged_in()) :
            $user = wp_get_current_user();
            $name = $user->display_name;
           
    
            global $wpdb;
            $table = $wpdb->prefix . 'users';
            $email = $user->user_email;
    
        endif;
    ?>
        <nav>
            <div class="logo">
                <h1>JPJ PMS</h1>
            </div>
            <div class="nav-tools">
                <div class="account-details">
                    <?php 
                    if(is_user_logged_in()){
                        ?>
                    <div class="name">
                        <span><?php
                                echo  $name ;
                                ?></span>
                    </div>
                    <div class="avatar">
                        <img src="<?php echo $avatar ?>" alt="avatar">
                    </div>
                    <?php
                    }?>
                </div>
                <div class="login">
                <?php
                    if (is_user_logged_in()) {
                    ?><form action="logout.php" method="POST">
                            <input name="logout" type="submit" value="Logout" >
                        </form>
                    <?php
                    } else {
                    ?>
                    <a href="/jpj-system/login">Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>

    <?php } ?>