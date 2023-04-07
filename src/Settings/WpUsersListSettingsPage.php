<?php

// -*- coding: utf-8 -*-

namespace Inpsyde\WpUsersList\Settings;

class WpUsersListSettingsPage
{
    /**
     * Plugin menu settings page.
     *
     * @return void
     */
    public static function options(): void
    {
        add_options_page(
            'WP Users List',
            'WP Users List',
            'manage_options',
            'wp-users-list-plugin',
            fn () => self::settingsPage()
        );
    }

    /**
     * Settings page.
     *
     * @return void
     */
    public static function settingsPage(): void
    {
?>
        <h2>Users list Plugin Settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields(WpUsersListOptionGroup::OPTION_GROUP);
            do_settings_sections(WpUsersListOptionGroup::OPTION_GROUP_PAGE); ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
        </form>
<?php
    }
}
