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
    if (!isset(self::$instance[static::class])) {
      self::$instance[static::class] = new static();
      self::$instance[static::class]->init();
    }

    return self::$instance[static::class];
  }

  /**
   * Init class component.
   *
   * @return void
   */
  abstract public function init(): void;
}
