<?php # -*- coding: utf-8 -*-

declare(strict_types=1);

namespace Inpsyde\WpUsersList;

/**
 * Class Singleton
 *
 * @package Inpsyde\WpUsersList
 */
abstract class AbstractSingleton
{
    /**
     * Instance of the class
     *
     * @var object
     */
    private static $instance;

    /**
     * Class constructor.
     */
    private function __construct()
    {
    }

    /**
     * Class instance.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        return self::$instance[static::class] ??= new static();
    }

    /**
     * Init class component.
     *
     * @return void
     */
    abstract public function init(): void;
}
