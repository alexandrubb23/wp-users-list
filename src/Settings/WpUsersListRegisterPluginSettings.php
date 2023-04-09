<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

/**
 * Class WpUsersListRegisterPluginSettings
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListRegisterPluginSettings
{
    /**
     * Register the plugin settings.
     *
     * @return void
     */
    public static function registerSettings(): void
    {

        register_setting(
            WP_USERS_LIST_PLUGIN_OPTION_GROUP,
            WP_USERS_LIST_PLUGIN_OPTION_GROUP,
            WpUsersListInitPluginSettingsForm::validate()
        );

        add_settings_section(
            WP_USERS_LIST_PLUGIN_SETTINGS,
            'Users List Settings',
            fn () => self::infoPluginOptions(),
            WP_USERS_LIST_PLUGIN_PAGE
        );
    }



    /**
     * Info plugin options.
     *
     * @return void
     */
    public static function infoPluginOptions(): void
    {
        echo '<p>Here you can set all the options for WP Users List</p>';
    }
}
