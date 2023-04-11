<?php

// -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList\Services;

use Inpsyde\WpUsersList\Settings\WpUsersListAlertSettings;

class UsersService
{
    /**
     * UsersService constructor.
     *
     * @param HttpService $httpService
     */
    private function __construct(private HttpService $httpService)
    {
        $this->httpService = $httpService;
    }

    /**
     * Instance of the class.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        static $instance;

        if (null === $instance) {
            $instance = new self(new HttpService());
        }

        return $instance;
    }


    /**
     * Request handler.
     *
     * @return void
     */
    public static function getUsersHandler()
    {
        // Here we can handle $_POST data and search depending on the data passed
        // e.g. By user id, by user name, by user email, etc.
        $result = array(
            'success' => true,
            'data' => self::getUsers()
        );

        wp_send_json($result);

        wp_die();
    }

    /**
     * Get users.
     *
     * @return \WP_Error|array
     */
    private function getAllUsers(): \WP_Error|array
    {
        $response = $this->httpService->get('/users');
        if (is_wp_error($response)) {
            throw new \Exception($response->get_error_message());
        }

        return $response;
    }

    /**
     * Get users list.
     *
     * @return \WP_Error|array
     */
    public static function getUsers(): \WP_Error|array
    {
        try {
            $usersService = UsersService::getInstance();
            return $usersService->getAllUsers();
        } catch (\Exception $e) {
            // Log or handle the exception
            WpUsersListAlertSettings::alert();
        }

        return [];
    }
}
