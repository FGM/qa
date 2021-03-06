<?php

declare(strict_types = 1);

namespace Drupal\qa;

/**
 * A lifetime class.
 *
 * Properties are: Start, Access, Modify, End.
 *
 * Note: SAME is an old (ca 2005) OSInet PHP_lib class, which other modules may
 * have imported in a non-namespaced form.
 */
class Same {

  /**
   * Start timestamp.
   *
   * @var float
   */
  public $s;

  /**
   * Access timestamp.
   *
   * @var float
   */
  public $a;

  /**
   * Modification timestamp.
   *
   * @var float
   */
  public $m;

  /**
   * End timestamp.
   *
   * @var float
   */
  public $e;

  /**
   * Constructor.
   *
   * S.A.M. default to current time, but E defaults to NULL.
   *
   * @param float $s
   *   Start timestamp.
   * @param float $a
   *   Access timestamp.
   * @param float $m
   *   Modification timestamp.
   * @param float $e
   *   End timestamp.
   */
  public function __construct($s = 0.0, $a = 0.0, $m = 0.0, $e = 0.0) {
    $now = microtime(TRUE);
    foreach (['s', 'a', 'm'] as $ts) {
      $this->$ts = ($$ts) ?: $now;
    }
    $this->e = $e;
  }

  /**
   * Update the access timestamp.
   *
   * @param float $now
   *   The timestamp to apply.
   */
  public function access($now = 0.0) {
    $this->a = $now ?: microtime();
  }

  /**
   * Update the modification timestamp.
   *
   * @param float $now
   *   The timestamp to apply.
   */
  public function modify($now = 0.0) {
    if (empty($now)) {
      $now = microtime(TRUE);
    }
    $this->access($now);
    $this->m = $now;
  }

  /**
   * Update the end timestamp.
   *
   * @param float $now
   *   The timestamp to apply.
   */
  public function end($now = 0.0) {
    if (empty($now)) {
      $now = microtime(TRUE);
    }
    $this->modify($now);
    $this->e = $now;
  }

  /**
   * Return the age of the instance, in microseconds.
   *
   * @return float
   *   The age, in microseconds.
   */
  public function age(): float {
    if (!empty($this->e)) {
      return $this->e - $this->s;
    }
    // Modifications imply update.
    elseif (!empty($this->a)) {
      return $this->a - $this->s;
    }
    return microtime(TRUE) - $this->s;
  }

  /**
   * Return the age of the instance in seconds, for use with UNIX timestamps.
   *
   * @return int
   *   The age, in seconds.
   */
  public function unixAge(): int {
    return intval($this->age() / 1E6);
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return (string) $this->age();
  }

}
