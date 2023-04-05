<?php # -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;

/**
 * Class WpUsersListTemplate
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListTemplate extends AbstractSingleton
{
    /**
     * @inheritdoc
     */
    public function init(): void
    {
        add_filter('template_include', fn ($template) => $this->registerTemplate($template));
    }

    /**
     * Register template for users list.
     *
     * @return void
     */
    public function registerTemplate($template): string
    {
        if (get_query_var('users')) {
            return plugin_dir_path(__DIR__) . '/templates/list-users-table-template.php';
        }

        return $template;
    }
}
