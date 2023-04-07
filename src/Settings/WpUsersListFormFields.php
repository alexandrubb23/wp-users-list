<?php

// -*- coding: utf-8 -*-

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
