<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Settings\WpUsersListSettingsPage;
use Inpsyde\WpUsersList\Settings\WpUsersListAlertSettings;
use Inpsyde\WpUsersList\Settings\WpUsersListInitPluginSettings;

/**
 * Class WpUsersListSettings
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListSettings extends AbstractSingleton
{
    /**
     * Init the plugin settings.
     *
     * @return void
     */
    public function init(): void
    {
        add_action('admin_init', fn () => WpUsersListInitPluginSettings::init());
        add_action('admin_menu',  fn () => WpUsersListSettingsPage::options());
        add_action('admin_notices', fn () => WpUsersListAlertSettings::alert());
    }
}
