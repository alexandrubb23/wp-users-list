<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Services;

use Inpsyde\WpUsersList\Settings\WpUsersListOptions;

class HttpService
{
    /**
     * Get request.
     *
     * @param string $url
     * @return \WP_Error|array
     */
    public function get(string $url): \WP_Error|array
    {
        $url = WpUsersListOptions::getApiEndpoint() . $url;
        $response = wp_remote_get($url);
        if (is_wp_error($response)) {
            return $response;
        }

        $decodedResponse = json_decode(wp_remote_retrieve_body($response)) ?? [];
        if (json_last_error() !== JSON_ERROR_NONE) {
            return new \WP_Error('json_decode_error', json_last_error_msg());
        }

        return $decodedResponse;
    }
}
