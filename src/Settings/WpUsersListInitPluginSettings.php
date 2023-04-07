<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

class WpUsersListInitPluginSettings
{
    /**
     * Init the plugin settings.
     *
     * @return void
     */
    public static function init(): void
    {
        WpUsersLisRegisterPluginSettings::registerSettings();
        WpUsersListInitPluginSettingsForm::registerFields();
    }
}
