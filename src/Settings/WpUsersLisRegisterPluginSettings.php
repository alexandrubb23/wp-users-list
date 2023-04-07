<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Settings;

class WpUsersLisRegisterPluginSettings
{
	/**
	 * Register the plugin settings.
	 *
	 * @return void
	 */
	public static function registerSettings(): void
	{
		register_setting(
			WP_USERS_LIST_PLUGIN_OPTION_GROUP,
			WP_USERS_LIST_PLUGIN_OPTION_GROUP,
			fn (array $inputs) => self::validateMethod($inputs)
		);

		add_settings_section(
			WP_USERS_LIST_PLUGIN_SETTINGS,
			'Users List Settings',
			fn () => self::infoPluginOptions(),
			WP_USERS_LIST_PLUGIN_PAGE
		);
	}

	/**
	 * Validate the plugin settings.
	 *
	 * @param array $inputs
	 * @return array
	 */
	public static function validateMethod(array $inputs): array
	{
		$formFields = WpUsersListFormFields::FIELDS;
		foreach ($formFields as $field => $options) {
			self::validationError($inputs[$field], $options['label']);
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
	private static function validationError(string $field, string $label): void
	{
		if (empty($field)) {
			add_settings_error(
				WP_USERS_LIST_PLUGIN_OPTION_GROUP,
				WP_USERS_LIST_PLUGIN_OPTION_GROUP,
				'Please fill the ' . $label . ' field',
				'error'
			);
		}
	}

	/**
	 * Info plugin options.
	 *
	 * @return void
	 */
	public static function infoPluginOptions(): void
	{
		echo '<p>Here you can set all the options for WP Users List</p>';
	}
}
