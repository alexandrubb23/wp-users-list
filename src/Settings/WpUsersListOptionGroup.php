<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

abstract class WpUsersListOptionGroup
{
    /**
     * @var string
     */
    public const OPTION_GROUP = 'wp_users_list_plugin_options';

    /**
     * @var string
     */
    public const OPTION_GROUP_SECTION = 'wp_users_list_settings';

    /**
     * @var string
     */
    public const OPTION_GROUP_PAGE = 'wp_users_list_plugin';
}
