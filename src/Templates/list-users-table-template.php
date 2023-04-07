<?php

// -*- coding: utf-8 -*-

/**
 * Template Name: WP Users List - Users Table Template
 */

use Inpsyde\WpUsersList\Services\UsersService;
use Inpsyde\WpUsersList\Components\WpUsersListTableStyle;
use Inpsyde\WpUsersList\Components\WpUsersListTableScript;

WpUsersListTableStyle::getInstance()->init();
WpUsersListTableScript::getInstance()->init();

wp_head();

$users = UsersService::getUsers();
if (empty($users)) {
  return;
}

$tableHtml = <<<EOT
<table id="users">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
  </tr>
EOT;

foreach ($users as $user) {
  $tableHtml .= <<<EOT
  <tr>
    <td class="user-id"><a href="#">{$user->id}</a></td>
    <td class="user-name"><a href="#">{$user->name}</a></td>
    <td class="user-username"><a href="#">{$user->username}</a></td>
  </tr>
EOT;
}

$tableHtml .= "</table>";

echo $tableHtml;

wp_footer();
