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
    <?php get_search_form(); ?>
</nav>


<div class="container p-5">