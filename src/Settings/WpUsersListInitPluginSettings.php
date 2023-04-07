<?php

// -*- coding: utf-8 -*-

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
