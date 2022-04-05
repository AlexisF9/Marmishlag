<?php

if (is_user_logged_in()) {
    wp_redirect( home_url() );
};
wp_head();

?>
<section class='register_container'>
<h1>Sign up</h1>

<form action="<?= admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">

        <input placeholder='Name' type="text" id="exampleInputEmail1" name="name">


        <input class="emailInput" placeholder='Email' type="email" id="exampleInputEmail1" name="email">

        <input placeholder='password' type="password" id="exampleInputPassword1" name="password">

    <input type="hidden" name="action" value="register">
    <?php wp_nonce_field('form', 'form'); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</section>