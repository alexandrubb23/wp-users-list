<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

class WpUsersListOptions
{
    /**
     * Get option by name.
     *
     * @param string $name
     * @param array $arguments
     * @return string
     */
    public static function __callStatic(string $name, array $arguments): string
    {
        $name = lcfirst(str_replace('get', '', $name));
        if (isset(WpUsersListFormFields::FIELDS[$name])) {
            return self::getOption($name);
        }

        return '';
    }

    /**
     * Get all the options.
     * 
     * @return array
     */
    public static function getOptions(): array
    {
        $options = get_option(WP_USERS_LIST_PLUGIN_OPTION_GROUP);
        $options = is_array($options) ? $options : [];

        return $options;
    }

    /**
     * Get the option.
     *
     * @param string $option
     * @return string
     */
    public static function getOption(string $option): string
    {
        $options = self::getOptions();
        if (!isset($options[$option])) {
            return '';
        }

        return $options[$option];
    }
}
