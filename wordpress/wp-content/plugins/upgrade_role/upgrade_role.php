<?php

/*
Plugin Name: Upgrade Role
Plugin URI: https://www.youtube.com/watch?v=zL19uMsnpSU&ab_channel=cameronbarnett
Description: Ajoute des permissions supplémentaires au rôle "abonné" (celui de base)
*/

register_activation_hook( __FILE__, function () {
	$role = get_role( 'subscriber' );
	$role->add_cap( 'delete_posts' );
	$role->add_cap( 'delete_published_posts' );
});

register_deactivation_hook( __FILE__, function () {
	$role = get_role( 'subscriber' );
	$role->remove_cap( 'delete_posts' );
	$role->remove_cap( 'delete_published_posts' );
});