<?php

namespace Drupal\go_back_history\Hook;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Hook\Attribute\Hook;
use Drupal\Core\StringTranslation\StringTranslationTrait;
/**
 * Hook implementations for go_back_history.
 */
class GoBackHistoryHooks
{
    use StringTranslationTrait;
    /**
     * Implements hook_help().
     */
    #[Hook('help')]
    public function help($route_name, \Drupal\Core\Routing\RouteMatchInterface $route_match)
    {
        switch ($route_name) {
            // Main module help for the Go Back module.
            case 'help.page.go_back_history':
                $output = '';
                $output .= '<h3>' . $this->t('About Go Back History') . '</h3>';
                $output .= '<p>' . $this->t('Allows you to add a block to any pages.') . '</p>';
                $output .= '<p>' . $this->t('This block adds a button that allows us to return to the previous page that we visited on the site.') . '</p>';
                return $output;
            default:
        }
    }
    /**
     * Implements hook_theme().
     */
    #[Hook('theme')]
    public static function theme($existing, $type, $theme, $path)
    {
        return [
            'block_go_back_history' => [
                'template' => 'block--go-back-history',
                'render element' => 'elements',
                'variables' => [
                    'button_value' => NULL,
                ],
            ],
        ];
    }
}
