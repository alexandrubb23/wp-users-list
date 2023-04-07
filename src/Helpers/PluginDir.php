<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Helpers;

class PluginDir
{
    /**
     * Plugin path.
     *
     * @return string
     */
    public static function getPath(): string
    {
        return plugin_dir_path(__DIR__);
    }

    /**
     * Plugin url.
     *
     * @return string
     */
    public static function getUrl(): string
    {
        return plugin_dir_url(__DIR__);
    }
}
