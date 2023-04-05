<?php # -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList;

/**
 * Class WpUsersList
 * 
 * @package Inpsyde\WpUsersList
 */
class WpUsersList
{
    /**
     * @var array
     */
    private $wpUsersListComponents;

    /**
     * WpUsersList constructor.
     *
     * @param array $wpUsersListComponents
     */
    private function __construct(array $wpUsersListComponents)
    {
        $this->wpUsersListComponents = $wpUsersListComponents;
    }

    /**
     * Class instance.
     * 
     * @param array $wpUsersListComponents
     *
     * @return WpUsersList
     */
    public static function instance(array $wpUsersListComponents): self
    {
        static $instance;

        if (!$instance) {
            $instance = new self($wpUsersListComponents);
            $instance->init();
        }

        return $instance;
    }

    /**
     * Init class component.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function init(): void
    {
        if (wp_installing()) {
            return;
        }

        foreach ($this->wpUsersListComponents as $wpUsersListComponent) {
            if (!($wpUsersListComponent instanceof AbstractSingleton)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'The class %s must be an instance of %s',
                        get_class($wpUsersListComponent),
                        AbstractSingleton::class
                    )
                );
            }

            $wpUsersListComponent->init();
        }
    }
}
