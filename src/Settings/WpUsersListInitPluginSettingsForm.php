<?php

// -*- coding: utf-8 -*-

namespace Inpsyde\WpUsersList\Settings;

class WpUsersListInitPluginSettingsForm
{
	/**
	 * Register the plugin settings fields.
	 * 
	 * @return void
	 */
	public static function registerFields(): void
	{
		$formFields = self::formFields();
		foreach ($formFields as $field => $options) {
			add_settings_field(
				$field,
				$options['label'],
				fn () => self::{$field}(),
				WpUsersListOptionGroup::OPTION_GROUP_PAGE,
				WpUsersListOptionGroup::OPTION_GROUP_SECTION
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

		$name = WpUsersListOptionGroup::OPTION_GROUP . "[$field]";
		$type = self::formFields()[$field]['type'];
		$value = esc_attr(WpUsersListOptions::getOption($field));

		return "<input id='" . $field . "' name='" . $name . "' type='" . $type . "' value='" . $value . "' />";
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
		if (isset(self::formFields()[$name])) {
			echo self::htmlInput($name);
		}
	}

	/**
	 * Get the form fields.
	 * 
	 * @return array
	 */
	private static function formFields(): array
	{
		return WpUsersListFormFields::FIELDS;
	}
}
