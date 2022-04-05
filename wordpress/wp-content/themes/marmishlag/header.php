<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>

<nav class="header">
    <div class="title">
        <h1><a class="navbar-brand" href="/">Marmishlag</a></h1>
        <?php wp_nav_menu([
            'theme_location' => 'custom_header',
            'menu_class' => 'item',
            'container' => false
        ]); ?>
    </div>
    <div>
	    <?php if (is_user_logged_in()) : ?>
		    <?php $currentUser = wp_get_current_user(); ?>
            <a class="headerLink" href="/profil"><?= $currentUser->user_login ?></a>
            <a class="headerLink" href="<?= wp_logout_url(home_url()); ?>">Logout</a>
	    <?php endif; ?>
	    <?php if (!is_user_logged_in()) : ?>
            <a class="headerLink" href="/login">Se connecter</a>
	    <?php endif; ?>
	    <?php if (!is_user_logged_in()) : ?>
            <a class="headerLink" href="/register">S'inscrire</a>
	    <?php endif; ?>
    </div>

</nav>


<div class="container p-5">