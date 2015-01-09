<?php
/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Alert
 */
class Alert extends AbstractHelper {

    /**
     * @var array
     */
    protected $format = array(
        '2' => '<div class="alert %s"><button type="button" class="close" data-dismiss="alert">&times;</button>%s</div>',
        '3' => '<div class="alert  %s  alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>%s</div>'
    );

    /**
     * Display an Informational Alert
     *
     * @param  string $alert
     * @param  bool   $isBlock
     * @return string
     */
    public function info($alert, $isBlock = false) {
        return $this->render($alert, $isBlock, 'alert-info');
    }

    /**
     * Display an Error Alert
     *
     * @param  string $alert
     * @param  bool   $isBlock
     * @return string
     */
    public function error($alert, $isBlock = false) {
        $class= array(
            '2' => 'alert-error',
            '3' => 'alert-danger'
            );
        
        return $this->render($alert, $isBlock, $class[TWITTER_BOOTSTRAP_VERSION]);
    }

    /**
     * Display a Success Alert
     *
     * @param  string $alert
     * @param  bool   $isBlock
     * @return string
     */
    public function success($alert, $isBlock = false) {
        return $this->render($alert, $isBlock, 'alert-success');
    }

    /**
     * Display a Warning Alert
     *
     * @param  string $alert
     * @param  bool   $isBlock
     * @return string
     */
    public function warning($alert, $isBlock = false) {
         $class= array(
            '2' => '',
            '3' => 'alert-warning'
            );
        
        return $this->render($alert, $isBlock, $class[TWITTER_BOOTSTRAP_VERSION]);
    }

    /**
     * Render an Alert
     *
     * @param  string $alert
     * @param  bool   $isBlock
     * @param  string $class
     * @return string
     */
    public function render($alert, $isBlock = false, $class = 'alert-info') {
        if ($isBlock && TWITTER_BOOTSTRAP_VERSION == 2) {
            $class .= ' alert-block';
        }
        $class = trim($class);

        return sprintf($this->format[TWITTER_BOOTSTRAP_VERSION], $class, $alert);
    }

    /**
     * Invoke Alert
     *
     * @param  string      $alert
     * @param  bool        $isBlock
     * @param  string      $class
     * @return string|self
     */
    public function __invoke($alert = null, $isBlock = false, $class = 'alert-info') {
        if ($alert) {
            return $this->render($alert, $isBlock, $class);
        }

        return $this;
    }

}
