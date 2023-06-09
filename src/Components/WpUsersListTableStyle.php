<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Helpers\PluginDir;
use Inpsyde\WpUsersList\Settings\WpUsersListOptions;

/**
 * Class WpUsersListTableStyle
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListTableStyle extends AbstractSingleton
{
    public function init(): void
    {
        add_action('wp_enqueue_scripts', fn () => $this->registerStyle());
    }

    /**
     * Enqueue style for users list.
     *
     * @return void
     */
    public function registerStyle(): void
    {
        if (!wp_users_list_is_listings_page()) {
            return;
        }

        wp_enqueue_style(
            'users-listing-table',
            PluginDir::getUrl() . 'css/style.css',
            array(),
            WP_USERS_LIST_VERSION,
            'all'
        );
    }
}
