<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Helpers\PluginDir;

/**
 * Class WpUsersListTableScript
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListTableScript extends AbstractSingleton
{
    public function init(): void
    {
        add_action('wp_enqueue_scripts', fn () => $this->registerScript());
    }

    /**
     * Enqueue style for users list.
     *
     * @return void
     */
    public function registerScript(): void
    {
        if (!wp_users_list_is_listings_page()) {
            return;
        }

        wp_enqueue_script('wp-users-list-script', PluginDir::getUrl() . 'js/script.js', array('jquery'), WP_USERS_LIST_VERSION, true);
    }
}
