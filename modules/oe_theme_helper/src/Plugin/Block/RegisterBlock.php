<?php

declare(strict_types = 1);

namespace Drupal\oe_theme_helper\Plugin\Block;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an register widget as a block.
 *
 * @Block(
 *   id = "oe_register",
 *   admin_label = @Translation("Register block"),
 *   category = @Translation("Cnect Corporate blocks (depr)"),
 * )
 */
class RegisterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['#theme'] = 'oe_corporate_blocks_register';

    $build['#attached'] = [
        'library' => [
          'oe_theme_helper/register',
        ],
      ];
    return $build;
  }

}
