<?php
/**
 * ZfcTwitterBootstrap
 */

namespace ZfcTwitterBootstrap\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Label
 */
class Label extends AbstractHelper
{

    /**
     * @var string
     */
     protected $format = <<<FORMAT
<span class="label label-%s">%s</span>
FORMAT;

    /**
     * Display an Informational Label
     *
     * @param  string $label
     * @return string
     */
    public function info($label)
    {
        return $this->render($label, 'info');
    }

    /**
     * Display an Important Label
     *
     * @param  string $label
     * @return string
     */
    public function important($label)
    {
         $class= array(
            '2' => 'important',
            '3' => 'danger'
            );
        
        return $this->render($label, $class[TWITTER_BOOTSTRAP_VERSION]);
    }

    /**
     * Display an Inverse Label Bootstrap = v2
     *
     * @param  string $label
     * @return string
     */
    public function inverse($label)
    {
        return $this->render($label, 'inverse');
    }

    /**
     * Display a Sucess Label
     *
     * @param  string $label
     * @return string
     */
    public function success($label)
    {
        return $this->render($label, 'success');
    }
    
      /**
     * Display a Primary Label Bootstrap>v3.x
     *
     * @param  string $label
     * @return string
     */
    public function primary($label)
    {
        return $this->render($label, 'primary');
    }


    /**
     * Display a Warning Label
     *
     * @param  string $label
     * @return string
     */
    public function warning($label)
    {
        return $this->render($label, 'warning');
    }

    /**
     * Render an Label
     *
     * @param  string $label
     * @param  string $class
     * @return string
     */
    public function render($label, $class = 'default')
    {
        $class = trim($class);

        return sprintf($this->format, $class, $label);
    }

    /**
     * Invoke Label
     *
     * @param  string      $label
     * @param  string      $class
     * @return string|self
     */
    public function __invoke($label = null, $class = 'default')
    {
        if ($label) {
            return $this->render($label, $class);
        }

        return $this;
    }
}
