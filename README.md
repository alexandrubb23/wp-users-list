# WP Users List Plugin

The WP Users List Plugin is a simple plugin for WordPress that allows you to display a list of users on a page. The plugin allows you to customize the settings by specifying the API Endpoint and the page where the user list should be displayed.

## Installation

1. To install the `wp-users-list-plugin`, you will need to add the following lines to your `composer.json` file in your WordPress app:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:alexandrubb23/wp-users-list.git"
    }
  ],
  "extra": {
    "installer-paths": {
      "wp-content/plugins/{$name}/": ["type:wordpress-plugin"]
    }
  },
  "scripts": {
    "post-install-cmd": [
      "cd wp-content/plugins/wp-users-list && composer install"
    ],
    "post-update-cmd": [
      "cd wp-content/plugins/wp-users-list && composer install"
    ]
  }
}
```

2. Once you have updated your `composer.json`, run the following command to install the plugin and its dependencies:

```shell
composer require alexandrubb23/wp-users-list
```

3. Activate the `alexandrubb23/wp-users-list` plugin via the WordPress Admin panel.

To activate the plugin, log in to your WordPress Admin panel and navigate to the "Installed Plugins" page. You should see the "WP Users List" Plugin. Click on "Activate".

Once the plugin is activated, an alert will appear at the top of the page indicating that the plugin options are missing.

![Installed Plugins](https://i.ibb.co/SfwmkYL/Screenshot-2023-04-07-at-11-43-27.png)

You should see the `WP Users List` Plugin. Click on `Activate`

Once the plugin is getting active, an alert will appear on top of the page who tell us that the plugin options are missing

![Alert](https://i.ibb.co/XkNBnQz/Screenshot-2023-04-07-at-11-48-58.png)

## Customization

You can customize the WP Users List Plugin by modifying the settings on the plugin's settings page. To access the settings page, go to the "WP Users List" menu item under the "Settings" menu in the WordPress admin panel.

## Plugin Settings

The WP Users List Plugin has two input fields:

- API Endpoint: Here you can define the API endpoint (e.g. https://jsonplaceholder.typicode.com).
- Page Name: Here you can define the page where the user list will be displayed (e.g. http://domain.com/users-table).

## Setting up Permalinks

To register your newly created page, navigate to the "Permalink Settings" page and select "Post Name". Once "Post Name" is selected, click on "Save".

## Usage

To display the list of users on the page you defined in the plugin settings, visit the URL you specified in the "Page Name" field (e.g. http://domain.com/users-table).

## Contributing

Contributions to the WP Users List Plugin are welcome! If you would like to contribute code or report a bug, please visit the [GitHub repository](https://github.com/alexandrubb23/wp-users-list) for this plugin.

## License

The WP Users List Plugin is released under the [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html) license.
