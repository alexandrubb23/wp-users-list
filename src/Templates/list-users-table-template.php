<?php

// -*- coding: utf-8 -*-

wp_head();

/**
 * Template Name: WP Users List - Users Table Template
 */

$users = get_users();

$tableHtml = <<<EOT
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
EOT;

foreach ($users as $user) {
  $tableHtml .= <<<EOT
  <tr>
    <td>{$user->ID}</td>
    <td>{$user->display_name}</td>
    <td>{$user->user_email}</td>
  </tr>
EOT;
}

$tableHtml .= "</table>";

echo $tableHtml;

wp_footer();
