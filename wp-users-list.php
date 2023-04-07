<?php

// -*- coding: utf-8 -*-

/**
 * Plugin Name: WP Users List
 * Plugin URI: https://github.com/alexandrubb23/wp-users-list
 * Description: A simple plugin to display a list of users.
 * Version: 1.7.9
 * Author: Alexandru Barbulescu
 * AUTHOR URI: alex_bb23@yahoo.co.uk
 * License: MIT
 */

namespace Inpsyde\WpUsersList;

define('WP_USERS_LIST_VERSION', '1.7.9');
define('WP_USERS_LIST_PLUGIN_OPTION_GROUP', 'wp_users_list_plugin_options');
define('WP_USERS_LIST_PLUGIN_SETTINGS', 'wp_users_list_settings');
define('WP_USERS_LIST_PLUGIN_PAGE', 'wp_users_list_plugin');
define('WP_USERS_LIST_PLUGIN_MENU_SLUG', 'wp-users-list-plugin');

if (!class_exists(WpUsersList::class) && is_readable(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use Inpsyde\WpUsersList\Components\{WpUsersListRewriteRules, WpUsersListSettings, WpUsersListTemplate};

$wpUsersListComponents = [
    WpUsersListSettings::getInstance(),
    WpUsersListRewriteRules::getInstance(),
    WpUsersListTemplate::getInstance(),
];

class_exists(WpUsersList::class) && WpUsersList::instance($wpUsersListComponents);
