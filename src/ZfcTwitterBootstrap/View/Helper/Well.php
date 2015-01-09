<?php

/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Well
 */
class Well extends AbstractHelper {

    /**
     * @var string
     */
    protected $format = '<div class="well%s">%s</div>';

    /**
     * Invoke Well
     *
     * @param  string      $content
     * @param  string      $class
     * @return string|self
     */
    public function __invoke($content = '', $class = '') {
        if ($content) {
            return $this->render($content, $class);
        }

        return $this;
    }

    /**
     * Display a large well
     *
     * @param  string $content
     * @return string
     */
    public function large($content) {
        $class = array(
            '2' => 'well-large',
            '3' => 'well-lg'
        );
        return $this->render($content, $class[TWITTER_BOOTSTRAP_VERSION]);
    }

    /**
     * Display an small well
     *
     * @param  string $content
     * @return string
     */
    public function small($content) {
        $class = array(
            '2' => 'well-small',
            '3' => 'well-sm'
        );
        return $this->render($content, $class[TWITTER_BOOTSTRAP_VERSION]);
    }

    /**
     * Render the well
     *
     * @param  string $content
     * @param  string $class
     * @return string
     */
    public function render($content, $class = '') {
        $class = ' ' . trim($class);

        return sprintf($this->format, $class, $content);
    }

}
