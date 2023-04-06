<?php

// -*- coding: utf-8 -*-

namespace Inpsyde\WpUsersList\Components;

use Inpsyde\WpUsersList\AbstractSingleton;

class WpUsersListSettings extends AbstractSingleton
{
    /**
     * @var string
     */
    public const OPTIONS_KEY = 'wp_users_list_plugin_options';

    /**
     * @var string
     */
    private const API_ENDPOINT = 'apiEndpoint';

    /**
     * @var string
     */
    private const PAGE_NAME = 'pageName';

    /**
     * Form fields.
     *
     * @var array
     */
    private $fields = [
        self::API_ENDPOINT => [
            'label' => 'API Endpoint',
            'type' => 'text',
        ],
        self::PAGE_NAME => [
            'label' => 'Page name',
            'type' => 'text',
        ]
    ];

    /**
     * Init the plugin settings.
     *
     * @return void
     */
    public function init(): void
    {
        add_action('admin_notices', fn () => $this->alertMessage());
        add_action('admin_menu',  fn () => $this->pluginMenuSettingsPage());
        add_action('admin_init', fn () => $this->initPluginSettings());
    }

    /**
     * Validate the plugin settings.
     *
     * @return void
     */
    public function alertMessage()
    {
        $options = get_option(self::OPTIONS_KEY);
        $options = is_array($options) ? $options : [];

        $falsyKeys = array_keys(array_filter($options, fn ($value) => !$value)) ?? [];

        if (!empty($falsyKeys)) {
            $pluginSettingsUrl = esc_url(admin_url('options-general.php?page=wp-users-list-plugin'));

            echo '<div class="notice notice-error is-dismissible"><p>Please define all the settings in <a href="' . $pluginSettingsUrl . '">WP Users List settings page</a></p></div>';
        }
    }

    /**
     * Plugin menu settings page.
     *
     * @return void
     */
    public function pluginMenuSettingsPage()
    {
        add_options_page(
            'WP Users List',
            'WP Users List',
            'manage_options',
            'wp-users-list-plugin',
            fn () => $this->settingsPage()
        );
    }

    /**
     * Settings page.
     *
     * @return void
     */
    public function settingsPage()
    {
?>
        <h2>Example Plugin Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields(self::OPTIONS_KEY);
            do_settings_sections('wp_users_list_plugin'); ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
        </form>
<?php
    }

    /**
     * Init the plugin settings.
     *
     * @return void
     */
    public function initPluginSettings()
    {
        $this->registerSettings();
        $this->registerFields();
    }

    /**
     * Register the plugin settings.
     *
     * @return void
     */
    private function registerSettings()
    {
        register_setting(self::OPTIONS_KEY, self::OPTIONS_KEY, fn (array $inputs) => $this->validateMethod($inputs));
        add_settings_section('api_settings', 'API Settings', fn () => $this->infoPluginOptions(), 'wp_users_list_plugin');
    }

    /**
     * Validate the plugin settings.
     *
     * @param array $inputs
     * @return void
     */
    public function validateMethod(array $inputs)
    {
        foreach ($this->fields as $field => $options) {
            $this->validationError($inputs[$field], $options['label']);
        }

        $stripped = array_map(fn ($value) => rtrim($value, '/'), $inputs);

        return $stripped;
    }

    /**
     * Validation error.
     * 
     * @param string $field
     * @return void
     */
    private function validationError(string $field, string $label)
    {
        if (empty($field)) {
            add_settings_error(
                self::OPTIONS_KEY,
                self::OPTIONS_KEY,
                'Please fill the ' . $label . ' field',
                'error'
            );
        }
    }

    /**
     * Register the plugin settings fields.
     * 
     * @return void
     */
    private function registerFields()
    {
        foreach ($this->fields as $field => $options) {
            add_settings_field(
                $field,
                $options['label'],
                fn () => $this->{$field}(),
                'wp_users_list_plugin',
                'api_settings'
            );
        }
    }

    /**
     * Info plugin options.
     *
     * @return void
     */
    function infoPluginOptions()
    {
        echo '<p>Here you can set all the options for WP Users List</p>';
    }

    /**
     * Html input.
     *
     * @param string $field
     * @param string $type
     * @return string
     */
    private function htmlInput(string $field)
    {
        $name = self::OPTIONS_KEY . "[$field]";
        $type = $this->fields[$field]['type'];
        $value = esc_attr(self::getOption($field));

        return "<input id='" . $field . "' name='" . $name . "' type='" . $type . "' value='" . $value . "' />";
    }

    /**
     * Get the api endpoint.
     *
     * @return void
     */
    public static function getApiEndpoint()
    {
        return self::getOption(self::API_ENDPOINT);
    }

    /**
     * Get the page name.
     */
    public static function getPageName()
    {
        return self::getOption(self::PAGE_NAME);
    }

    /**
     * Get the option.
     *
     * @param string $option
     * @return string
     */
    public static function getOption(string $option): string
    {
        $options = get_option(self::OPTIONS_KEY);
        $options = is_array($options) ? $options : [];

        if (!isset($options[$option])) {
            return '';
        }

        return $options[$option];
    }

    /**
     * Call magic method.
     *
     * @param string $name
     * @param array $arguments
     * @return void
     */
    public function __call(string $name, array $arguments): void
    {
        if (isset($this->fields[$name])) {
            echo $this->htmlInput($name);
        }
    }
}
