<?php

/**
 * @file
 * OSInet QA Plugin for References module.
 *
 * @copyright Copyright (C) 2011-2012 Frederic G. MARAND for Ouest Systèmes Informatiques (OSInet)
 *
 * @since DRUPAL-6
 *
 * @license Licensed under the disjunction of the CeCILL, version 2 and General Public License version 2 and later
 *
 * License note: QA is distributed by OSInet to its customers under the
 * CeCILL 2.0 license. OSInet support services only apply to the module
 * when distributed by OSInet, not by any third-party further down the
 * distribution chain.
 *
 * If you obtained QA from drupal.org, that site received it under the
 * GPLv2 license and can therefore distribute it under the GPLv2, and
 * so can you and just anyone down the chain as long as the GPLv2 terms
 * are abided by, the module distributor in that case being the
 * drupal.org organization or the downstream distributor, not OSInet.
 */

namespace OSInet\DrupalQA\References;

use OSInet\DrupalQA\BasePackage;

class Package extends BasePackage {
  function __construct() {
    parent::__construct();
    $this->title = t('Node/User References');
    $this->description = t('Look for references to missing nodes or users');
  }
}
