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
    <nav>
        <div class="logo">
            <h1>JPJ PMS</h1>   
        </div>
        <div class="nav-tools">
            <div class="account-details">
                <div class="name">
                    <p>Patrick</p>
                </div>
                <div class="avatar">
                    <img src="<?php echo $avatar ?>" alt="avatar">
                </div>
            </div>
            <div class="login">
                <a href="">Login</a>
            </div>
        </div>
    </nav>