<?php # -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;

/**
 * Class WpUsersRewriteRules
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListRewriteRules extends AbstractSingleton
{
    /**
     * @var string
     */
    const PATH = 'users';

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        if (wp_installing()) {
            return;
        }

        add_action('init', [$this, 'registerUsersRewriteRules']);
    }

    /**
     * Register rewrite rules for users list.
     *
     * @return void
     */
    public function registerUsersRewriteRules(): void
    {
        add_rewrite_rule(self::PATH . '/?', 'index.php?users=1', 'top');
        add_rewrite_tag('%' . self::PATH . '%', '1');
    }
}
