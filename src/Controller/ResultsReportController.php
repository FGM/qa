<?php

namespace Drupal\qa\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ResultsReportController.
 *
 * @package Drupal\qa\Controller
 */
class ResultsReportController extends ControllerBase {

  /**
   * Action.
   *
   * @return string
   *   Return Hello string.
   */
  public function report() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: report'),
    ];
  }

  public function view($qaVariable) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: view'),
    ];
  }

}