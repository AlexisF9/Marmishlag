<?php

if (is_user_logged_in()) {
    wp_redirect( home_url() );
};

?>

<h1>Sign up</h1>

<form action="<?= admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="exampleInputEmail1">Name</label>
        <input type="text" id="exampleInputEmail1" name="name">
    </div>
    <div>
        <label for="exampleInputEmail1">Email</label>
        <input type="email" id="exampleInputEmail1" name="email">
    </div>
    <div>
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" id="exampleInputPassword1" name="password">
    </div>
    <input type="hidden" name="action" value="register">
    <?php wp_nonce_field('form', 'form'); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>