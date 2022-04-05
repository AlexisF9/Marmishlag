<?php

if (is_user_logged_in()) {
	$currentUser = wp_get_current_user();
	wp_head();
	?>
<h2>Bienvenue sur ton profil <?= $currentUser->user_login ?> !</h2>

<?php

} else {
    wp_redirect( home_url() );
}

?>





