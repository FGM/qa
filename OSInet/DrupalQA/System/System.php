<?php

namespace OSInet\DrupalQA\System;

use OSInet\DrupalQA\BaseControl;

/**
 * Find views containing PHP code
 */
class System extends BaseControl {

  public function __construct() {
    parent::__construct();
    $this->title = t('Unused non-core packages');
    $this->description = t('Unused modules and themes present on disk can represent a useless cost on most dimensions. Packages entirely unused should usually be removed. This does not necessarily hold in a multi-site filesystem layout.');
  }

  /**
   * Identify packages entirely consisting of not-enabled modules.
   */
  function checkModules() {
    $ret = array(
      'status' => 1,
      'result' => array(),
    );
    return $ret;
  }

  /**
   * Identify disabled themes not used as base themes for an enabled theme.
   */
  function checkThemes() {
    $ret = array(
      'status' => 1,
      'result' => array(),
    );
    return $ret;
  }

  function run() {
    $pass = parent::run();
    $pass->record($this->checkModules());
    $pass->life->modify();
    $pass->record($this->checkThemes());
    $pass->life->end();
    return $pass;
  }
}
