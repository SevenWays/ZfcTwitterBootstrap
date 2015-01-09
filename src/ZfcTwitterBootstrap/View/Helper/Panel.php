<?php

/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Panel
 */
class Panel extends AbstractHelper {

    /**
     * @var array
     */
    protected $format = array(
        'panel' => '<div class="panel panel-%s">%s %s %s</div>',
        'panel-title' => '<div class="panel-heading"><h3 class="panel-title">%s</h3></div>',
        'panel-body' => '<div class="panel-body">%s</div>',
        'panel-footer' => '<div class="panel-footer">%s</div>',
    );

    /**
     * Display an Primary Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function primary($body, $title = null, $footer = null) {

        return $this->render($body, $title, $footer, 'primary');
    }

    /**
     * Display an Informational Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function info($body, $title = null, $footer = null) {
        return $this->render($body, $title, $footer, 'info');
    }

    /**
     * Display an Error Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function danger($body, $title = null, $footer = null) {

        return $this->render($body, $title, $footer, 'danger');
    }

    /**
     * Display a Success Panel
     * 
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function success($body, $title = null, $footer = null) {
        return $this->render($body, $title, $footer, 'success');
    }

    /**
     * Display a Warning Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function warning($body, $title = null, $footer = null) {
        return $this->render($body, $title, $footer, 'warning');
    }

    /**
     * Render an Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string
     * 
     */
    public function render($body, $title = null, $footer = null, $class = 'default') {
        $body = sprintf($this->format['panel-body'], $body);
        $title = (!is_null($title)) ? sprintf($this->format['panel-title'], $title) : '';
        $footer = (!is_null($footer)) ? sprintf($this->format['panel-footer'], $footer) : '';
        return sprintf($this->format['panel'], $class, $title, $body, $footer);
    }

    /**
     * Invoke Panel
     *
     * @param string $body
     * @param string $title
     * @param string $footer
     * @return string|self
     * 
     */
    public function __invoke($body=null, $title = null, $footer = null, $class = 'default') {
        if ($body) {
            return $this->render($body, $title, $footer, $class);
        }

        return $this;
    }

}
