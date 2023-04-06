<?php # -*- coding: utf-8 -*-

namespace Inpsyde\WpUsersList\Services;

class HttpService
{
    /**
     * Api endpoint.
     *
     * @var string
     */
    private string $apiEndpoint = 'https://jsonplaceholder.typicode.com';

    /**
     * Get request.
     *
     * @param string $url
     * @return \WP_Error|array
     */
    public function get(string $url): \WP_Error|array
    {
        $url = $this->apiEndpoint . $url;
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
