<?php

// -*- coding: utf-8 -*-


declare(strict_types=1);

use Inpsyde\WpUsersList\Settings\WpUsersListOptions;

/**
 * Check if the current page is the one passed as argument.
 *
 * @param string $pageName
 * @return bool
 */
function wp_users_list_is_current_page(string $pageName): bool
{
    global $wp;

    return $pageName === $wp->request;
}

/**
 * Check if the current page is the one set in the plugin settings.
 *
 * @return bool
 */
function wp_users_list_is_listings_page(): bool
{
    $pageName = WpUsersListOptions::getPageName();

    return wp_users_list_is_current_page($pageName);
}
