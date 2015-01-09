<?php

/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap;

use Zend\ModuleManager\ModuleManagerInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Form\View\Helper\FormElementErrors;

/**
 * Module Setup
 */
class Module implements InitProviderInterface,AutoloaderProviderInterface {

    public function init(ModuleManagerInterface $manager) {
        /**
         * Set Bootstrap Version 2 or 3
         */
        defined('TWITTER_BOOTSTRAP_VERSION') || define('TWITTER_BOOTSTRAP_VERSION', 3);
    }

    /**
     * Get Config
     *
     * @return array
     */
    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Set Autoloader Configuration
     *
     * @return array
     */
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Get View Helper Configuration
     *
     * @return array
     */
    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                'formElementErrors' => function ($sm) {
                    $fee = new FormElementErrors();
                    $fee->setMessageCloseString('</li></ul>');
                    $fee->setMessageOpenFormat('<ul%s><li>');
                    $fee->setMessageSeparatorString('</li><li>');
                    $fee->setAttributes(array(
                        'class' => 'help-inline',
                    ));

                    return $fee;
                },
                    ),
                );
            }

        }
        