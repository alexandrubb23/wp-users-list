<?php # -*- coding: utf-8 -*-

/**
 * Template Name: WP Users List - Users Table Template
 */

use Inpsyde\WpUsersList\Services\UsersService;

wp_head();

$users = UsersService::getUsers();
if (empty($users)) {
  return;
}

$tableHtml = <<<EOT
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
  </tr>
EOT;

foreach ($users as $user) {
  $tableHtml .= <<<EOT
  <tr>
    <td>{$user->id}</td>
    <td>{$user->name}</td>
    <td>{$user->username}</td>
  </tr>
EOT;
}

$tableHtml .= "</table>";

echo $tableHtml;

wp_footer();
