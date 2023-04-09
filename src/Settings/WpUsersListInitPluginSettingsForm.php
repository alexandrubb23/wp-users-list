<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

/**
 * Class WpUsersListInitPluginSettingsForm
 *
 * @package Inpsyde\WpUsersList
 */
class WpUsersListInitPluginSettingsForm
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

    /**
     * Submit button label.
     *
     * @var string
     */
    private const SUBMIT_BUTTON_LABEL = 'Save';

    /**
     * Register the plugin settings fields.
     *
     * @return void
     */
    public static function addFormFields(): void
    {
        foreach (self::FIELDS as $field => $options) {
            add_settings_field(
                $field,
                $options['label'],
                fn () => self::{$field}(),
                WP_USERS_LIST_PLUGIN_PAGE,
                WP_USERS_LIST_PLUGIN_SETTINGS
            );
        }
    }

    /**
     * Html input.
     *
     * @param string $field
     * @param string $type
     * @return string
     */
    private static function htmlInput(string $field): string
    {
        $type = self::FIELDS[$field]['type'];
        $name = WP_USERS_LIST_PLUGIN_OPTION_GROUP . "[$field]";
        $value = esc_attr(WpUsersListOptions::getOption($field));

        $input =
            sprintf(
                __('<input id="%s" name="%s" type="%s" value="%s" />', 'wp-users-list'),
                $field,
                $name,
                $type,
                $value
            );

        return $input;
    }

    /**
     * Call the html input.
     *
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public static function __callStatic(string $name, array $arguments): void
    {
        if (isset(self::FIELDS[$name])) {
            echo self::htmlInput($name);
        }
    }

    /**
     * Settings page.
     *
     * @return void
     */
    public static function form(): void
    {
        ?>
        <h2>Users list Plugin Settings</h2>
        <form action="options.php" method="post">
            <?php
            self::addFormFields();
            settings_fields(WP_USERS_LIST_PLUGIN_OPTION_GROUP);
            do_settings_sections(WP_USERS_LIST_PLUGIN_PAGE);
            ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e(self::SUBMIT_BUTTON_LABEL); ?>" />
        </form>
        <?php
    }

    /**
     * Validate the form fields.
     *
     * @return callable
     */
    public static function validate(): callable
    {
        return function (array $inputs) {
            foreach ($inputs as $field => $value) {
                if (empty($value)) {
                    add_settings_error(
                        WP_USERS_LIST_PLUGIN_OPTION_GROUP,
                        $field,
                        sprintf(
                            __('The field %s is required', 'wp-users-list'),
                            self::FIELDS[$field]['label']
                        ),
                        'error'
                    );
                }
            }

            $stripped = array_map(fn ($value) => rtrim($value, '/'), $inputs);

            return $stripped;
        };
    }
}
