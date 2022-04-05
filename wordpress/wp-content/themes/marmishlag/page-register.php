<?php

if (is_user_logged_in()) {
    wp_redirect( home_url() );
};
wp_head();

?>
<section class='register_container'>
<h1>Sign up</h1>

<form action="<?= admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">

        <label for="name">Nom d'utilisateur</label>
        <input type="text" id="name" name="name">

        <label for="email">Email</label>
        <input class="emailInput" type="email" id="email" name="email">

        <label for="password">Votre mot de passe</label>
        <input type="password" id="password" name="password">

    <input type="hidden" name="action" value="register">
    <?php wp_nonce_field('form', 'form'); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</section>