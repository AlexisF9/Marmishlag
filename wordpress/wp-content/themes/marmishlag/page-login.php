<?php

if (is_user_logged_in()) {
    wp_redirect( home_url() );
};

?>

<h1>Login</h1>

<?php wp_login_form(['form_id' => 'marmishlag_login_form']); ?>
