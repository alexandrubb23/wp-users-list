<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;
use Inpsyde\WpUsersList\Helpers\PluginDir;
use Inpsyde\WpUsersList\Services\UsersService;

/**
 * Class WpUsersListTableScript
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListTableScript extends AbstractSingleton
{
    /**
     * Ajax action.
     */
    private const AJAX_ACTION = 'get_users';

    /**
     * Init hooks.
     *
     * @return void
     */
    public function init(): void
    {
        add_action('init', fn () => $this->registerAjaxHandler());
        add_action('wp_enqueue_scripts', fn () => $this->registerScript());
    }

    /**
     * Register ajax handler.
     *
     * @return void
     */
    public function registerAjaxHandler(): void
    {
        add_action('wp_ajax_' . self::AJAX_ACTION, fn () => UsersService::getUsersHandler());
        add_action('wp_ajax_nopriv_' . self::AJAX_ACTION, fn () => UsersService::getUsersHandler());
    }

    /**
     * Enqueue style for users list.
     *
     * @return void
     */
    public function registerScript(): void
    {
        if (!wp_users_list_is_listings_page()) {
            return;
        }

        wp_enqueue_script('wp-users-list-script', PluginDir::getUrl() . 'js/script.js', array('jquery'), WP_USERS_LIST_VERSION, true);
        wp_localize_script('wp-users-list-script', 'ajaxObject', array(
            'url' => admin_url('admin-ajax.php'),
            'action' => self::AJAX_ACTION
        ));
    }
}
