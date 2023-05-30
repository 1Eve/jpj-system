<?php get_header(); ?>
<?php
$sad = get_template_directory_uri() . "/assets/sad.jpeg";
?>
<div class="d-flex flex-column align-items-center justify-content0-center">
<img src='<?php echo $sad; ?>' class="" alt='logo' />
<h1>404 Error</h1>
<p>Sorry we could not find the page you are looking for!</p>
</div>

<?php get_footer(); ?>