<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

abstract class WpUsersListFormFields
{
    /**
     * Form fields.
     *
     * @var array
     */
    public const FIELDS = [
        'apiEndpoint' => [
            'label' => 'API Endpoint',
            'type' => 'text',
        ],
        'pageName' => [
            'label' => 'Page name',
            'type' => 'text',
        ]
    ];
}
