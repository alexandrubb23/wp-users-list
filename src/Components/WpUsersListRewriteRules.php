<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Settings\WpUsersListOptions;

/**
 * Class WpUsersRewriteRules
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListRewriteRules extends AbstractSingleton
{
    public function init(): void
    {
        if (wp_installing()) {
            return;
        }

        add_action('init', fn () => $this->registerUsersRewriteRules());
    }

    /**
     * Register rewrite rules for users list.
     *
     * @return void
     */
    public function registerUsersRewriteRules(): void
    {
        $pageName = WpUsersListOptions::getPageName();
        if (!$pageName) {
            return;
        }

        add_rewrite_rule($pageName . '/?', 'index.php?' . $pageName . '=1', 'top');
        add_rewrite_tag('%' . $pageName . '%', '1');
        flush_rewrite_rules();
    }
}
