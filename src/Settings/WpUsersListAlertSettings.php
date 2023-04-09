<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

/**
 * Class WpUsersListAlertSettings
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListAlertSettings
{
    /**
     * Alert the user if the plugin settings are not defined.
     *
     * @return void
     */
    public static function alert(): void
    {
        $options = get_option(WP_USERS_LIST_PLUGIN_OPTION_GROUP);
        $falsyKeys = match (is_array($options)) {
            true => array_keys(array_filter($options, fn ($value) => !$value)),
            default => true,
        };

        if (!empty($falsyKeys)) {
            static::displayAlert();
        }
    }

    /**
     * Display alert.
     *
     * @param string $message
     * @return void
     */
    public static function displayAlert(): void
    {
        $isWpUsersListSettingsPage = $_GET['page'] ?? null === WP_USERS_LIST_PLUGIN_MENU_SLUG;
        if ($isWpUsersListSettingsPage) {
            return;
        }

        $pluginSettingsUrl = esc_url(url: admin_url('options-general.php?page=' . WP_USERS_LIST_PLUGIN_MENU_SLUG));

        $styleClass = $styleClass ?? (!is_admin() ? 'alert danger' : 'notice notice-error is-dismissible');

        $message = '<p>Please define all the settings in <a href="' . $pluginSettingsUrl . '">WP Users List settings page</a></p>';

        echo '<div class="' . $styleClass . '">' . $message . '</div>';
    }
}
