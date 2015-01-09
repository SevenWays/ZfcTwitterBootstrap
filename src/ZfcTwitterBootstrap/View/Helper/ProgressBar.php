<?php

/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Panel
 */
class ProgressBar extends AbstractHelper {

    /**
     * @var array
     */
    protected $format = array(
        '2' => array(
            'progress' => '<div class="progress %s">%s</div>',
            'progress-bar' => '<div class="bar %s" style="width: %s%%"></div>',
            'progress-class' => 'bar-',
            'progress-striped' => 'progress-striped',
        ),
        '3' => array(
            'progress' => '<div class="progress">%s</div>',
            'progress-bar' => '<div class="progress-bar %s %s" role="progressbar" aria-valuenow="%s" aria-valuemin="0" aria-valuemax="100"  style="width: %s%%">%s</div>',
            'progress-label' => '%s%%',
            'progress-with-label' => '<span class="sr-only">%s</span>',
            'progress-class' => 'progress-bar-',
            'progress-striped' => 'progress-bar-striped',
        )
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
     * Display a Info Progress Bar
     *
     * @param int $value_now
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string
     */
    public function info($value_now = 0, $value_visible = true, $striped = false, $animate = false) {
        return $this->render($value_now, 'info', $value_visible, $striped, $animate);
    }

    /**
     * Display a Danger Progress Bar
     *
     * @param int $value_now
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string
     */
    public function danger($value_now = 0, $value_visible = true, $striped = false, $animate = false) {
        return $this->render($value_now, 'danger', $value_visible, $striped, $animate);
    }

    /**
     * Display a Success Progress Bar
     *
     * @param int $value_now
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string
     */
    public function success($value_now = 0, $value_visible = true, $striped = false, $animate = false) {
        return $this->render($value_now, 'success', $value_visible, $striped, $animate);
    }

    /**
     * Display a Warning Progress Bar
     *
     * @param int $value_now
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string
     */
    public function warning($value_now = 0, $value_visible = true, $striped = false, $animate = false) {
        return $this->render($value_now, 'warning', $value_visible, $striped, $animate);
    }

    /**
     * Render Progress Bar
     * 
     * @param int $value_now
     * @param string $class
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string
     */
    public function render($value_now = 0, $class = '', $value_visible = true, $striped = false, $animate = false) {

        if (trim($class) != '') {
            $class = $this->format[TWITTER_BOOTSTRAP_VERSION]['progress-class'] . $class;
        }
        if ($striped) {
            $params = $this->format[TWITTER_BOOTSTRAP_VERSION]['progress-striped'];
        }
        if ($animate) {
            $params .= ' active';
        }


        if (TWITTER_BOOTSTRAP_VERSION == 2) {
            $progress_bar = sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress-bar'], $class, $value_now);
            return sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress'], $params, $progress_bar);
        }

        if (TWITTER_BOOTSTRAP_VERSION == 3) {
            $progress_label = (!$value_visible) ? sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress-with-label'], $value_now) : sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress-label'], $value_now);
            $progress_bar = sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress-bar'], $class, $params, $value_now, $value_now, $progress_label);
            return sprintf($this->format[TWITTER_BOOTSTRAP_VERSION]['progress'], $progress_bar);
        }
    }

    /**
     * Invoke Progress Bar
     *
     * @param int $value_now
     * @param string $class
     * @param bool $value_visible
     * @param bool $striped
     * @param bool $animate
     * @return string|self
     */
    public function __invoke($value_now = null, $class = '', $value_visible = true, $striped = false, $animate = false) {
        if ($value_now) {
            return $this->render($value_now, $class, $value_visible, $striped, $animate);
        }

        return $this;
    }

}
