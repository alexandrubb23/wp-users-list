<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

class  WpUsersListAlertSettings
{
    /**
     * Alert the user if the plugin settings are not defined.
     *
     * @return void
     */
    public static function alert(): void
    {
        $options = get_option(WpUsersListOptionGroup::OPTION_GROUP);
        $falsyKeys = is_array($options)
            ? array_keys(array_filter($options, fn ($value) => !$value))
            : true;

        if (!empty($falsyKeys)) {
            $pluginSettingsUrl = esc_url(admin_url('options-general.php?page=wp-users-list-plugin'));

            echo '<div class="notice notice-error is-dismissible"><p>Please define all the settings in <a href="' . $pluginSettingsUrl . '">WP Users List settings page</a></p></div>';
        }
    }
}
