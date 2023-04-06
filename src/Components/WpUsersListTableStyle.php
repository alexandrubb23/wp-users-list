<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Helpers\PluginDir;

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
        wp_enqueue_style('users-listing-table', PluginDir::getUrl() . 'css/style.css', array(), '1.0.0', 'all');
    }
}
