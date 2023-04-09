<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

/**
 * Class WpUsersListSettingsPage
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListSettingsPage
{
    /**
     * Plugin menu settings page.
     *
     * @return void
     */
    public static function options(): void
    {
        add_options_page(
            'WP Users List',
            'WP Users List',
            'manage_options',
            WP_USERS_LIST_PLUGIN_MENU_SLUG,
            fn () => WpUsersListInitPluginSettingsForm::form()
        );
    }
}
