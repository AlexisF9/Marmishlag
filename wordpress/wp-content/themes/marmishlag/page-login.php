<?php

if (is_user_logged_in()) {
    wp_redirect( home_url() );
};
wp_head();
?>

<div class="loginContent">
    <a href="/">Retour</a>
    <h1>Se connecter</h1>

	<?php wp_login_form(['form_id' => 'marmishlag_login_form']); ?>
</div>



<?php wp_footer(); ?>