<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Helpers\PluginDir;

/**
 * Class WpUsersListTemplate
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListTemplate extends AbstractSingleton
{
    public function init(): void
    {
        add_filter('template_include', fn ($template) => $this->registerTemplate($template));
    }

    /**
     * Register template for users list.
     *
     * @return string
     */
    public function registerTemplate($template): string
    {
        $pageName = WpUsersListSettings::getPageName();
        if (!get_query_var($pageName)) {
            return $template;
        }

        return PluginDir::getPath() . 'templates/list-users-table-template.php';
    }
}
