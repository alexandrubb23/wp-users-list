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
			self::optionGroup(),
			self::optionGroup(),
			fn (array $inputs) => self::validateMethod($inputs)
		);

		add_settings_section(
			WpUsersListOptionGroup::OPTION_GROUP_SECTION,
			'Users List Settings',
			fn () => self::infoPluginOptions(),
			WpUsersListOptionGroup::OPTION_GROUP_PAGE
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
				self::optionGroup(),
				self::optionGroup(),
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

	/**
	 * Get the option group name.
	 *
	 * @return string
	 */
	private static function optionGroup(): string
	{
		return WpUsersListOptionGroup::OPTION_GROUP;
	}
}
