<?php

function projecttheme_script_enqueue(){
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/custom/custom.css', [], '1.0.1', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/custom/custom.js', [], '1.0.1', true);

    //introducing bootstrap
    wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');
    wp_enqueue_style('bootstrapcss');

    wp_register_script('jsbootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script('jsbootstrap');
}

add_action('wp_enqueue_scripts', 'projecttheme_script_enqueue');

//add menus
function projecttheme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}

// add navwalker
if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('init', 'projecttheme_setup');

/**
 * THEME SUPPORT
 */

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');


//add shortcode

add_shortcode('login', function(){
    // echo 'FORMMMMMMMMMMMMMMMMMMMMMMMMMMMM';

    $login_img = get_template_directory_uri() . "/assets/login.jpg";
    $error = '';

    if (isset($_POST['loginbtn'])) {

        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
    
        $user = wp_signon([
            'user_login' => $user_email,
            'user_password' => $user_pass
        ]);
    
        // var_dump($user);
        if (!is_wp_error($user)) {
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);
    
            wp_redirect('/jpj-system/create-project');
            exit;
        }
        $error = "Invalid email or password";
    }

    $logincode = '';
    $logincode .= '<div class="loginpage bg-light" style="height: 77vh;">';
    $logincode .='<div class="form bg-white d-flex flex-row w-75 m-auto mt-5 rounded-1" style="border-radius: 20px;">';
    $logincode .= '<div class="d-flex flex-column justify-content-center align-items-center p-4 w-50">';
    $logincode .= '<form action="" method="post">';
    $logincode .= '<h2 style="text-center;">Login to Your Account</h2>';
    $logincode .= '<div class="d-flex flex-column justify-content-center align-items-center gap-3">';
    $logincode .='<div class="d-flex flex-column justify-content-start; align-item-start gap-2">';
    $logincode .= '<label>Email: </label>';
    $logincode .='<div class="login-input" >';
    $logincode .= '<input type="email" class="form-control" name="user_email" placeholder="abc@example.com" style="width: 100%; height: 45px; border: 1px solid grey; border-radius: 10px;">';
    $logincode .='</div>';
    $logincode .='</div>';
    $logincode .='<div style="display:flex; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 10px">';
    $logincode .= '<label>Password: </label>';
    $logincode .='<div class="login-input" >';
    $logincode .= '<input type="password" class="form-control" name="user_pass" placeholder="Enter your password" style="width: 100%; height: 45px; border: 1px solid grey; border-radius: 10px;">';
    $logincode .='</div>';
    $logincode .='</div>';
    $logincode .= '</div>';
    $logincode .= '<div>';
    $logincode .= '<input type="submit" name="loginbtn" value="Login" style="width: 100%; height: 45px; border: hidden; border-radius: 10px; color: white; cursor: hover; background-color: #6E3EF3; margin-top: 30px;">';
    $logincode .= '</div>';
    $logincode .= '</form>';
    $logincode .= '</div>';
    $logincode .='<div class="login-image w-50" style="background-color: #6E3EF3; position: relative">';
    $logincode .= '<img src='. $login_img.' alt="logo" class="image" style="position: absolute;"/>';
    $logincode .='</div>';
    $logincode .='</div>';
    $logincode .='</div>';

    $logincode .= '<style>
    .form{
        border-radius: 20px;
    }
    .login-image{
        display:absolute;
    }
    .image{
        display: relative;
        width: 450px;
        height: 300px;
        top: 50px;
    }
    @media screen and (max-width: 767px) {
        .loginpage{
            background-color: white;
        }
        .form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .login-image {
            display: none;
        }
    }
    @media screen and (max-width: 585px) {
        .login-input input{
            width: 60%;
        }
    }
</style>';

    return $logincode;
});

//get user info
function get_login_info()
{
    $current_employee = [];
    $user = wp_get_current_user();
    $id = $user->ID;
    $current_employee['id'] = $user->ID;
    $current_employee['name'] = $user->user_login;

    return $current_employee;
}


global $successmessage;
$successmessage;

global $errormessage;
$errormessage;