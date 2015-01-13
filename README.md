ZfcTwitterBootstrap
===================
Zend Framework Integration with Twitter Bootstrap 2.x and 3.x
Version 0.4.0 Powered by Sergej Hoffmann


forked from https://github.com/mwillbanks/ZfcTwitterBootstrap
Version 0.2.1 Created by Mike Willbanks

Naming
------

This module is currently named *Zfc*TwitterBootstrap since the goal is to
ultimately get this into the ZF-Commons area.  Once this gets more to a
feature complete state, it will be submitted to a vote for ZF-Commons.
If the module does not make it, it will be renamed.

Introduction
------------

ZfcTwitterBootstrap is a module that attempts to handle Twitter Bootstrap
integration for Zend Framework 2.  Out of the box this presently includes
view helpers to render forms, alerts, badges and labels.  Overall this module
will continue to grow out the view helpers to assist in generating many of
the items that Twitter Bootstrap contains.

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (2.*)

Installation
------------
Your composer.json should include the following:

    {
        "require": {
            "mwillbanks/zfc-twitter-bootstrap": "@dev"
        }
    }

Enable the module in your `application.config.php` file:

    <?php
    return array(
        'modules' => array(
            // ...
            'ZfcTwitterBootstrap',
        ),
        // ...
    );
    

Features
--------
* Form Integration
  * FormRenderer
  * FormElement
  * FormDescription
* Navigation Integration
  * Breadcrumbs
  * Menu
* View Helpers
  * Alerts
  * Badges
  * CloseIcons
  * FlashMessages
  * Icons
  * Images
  * Labels
  * Wells
  * ProgressBar
  * Panel           for Bootstrap v3.x

Roadmap
-------

* Zend\Form - Completed basic integration
* Alert Messages - Completed basic view helper
* Close Icons - Completed basic view helper
* Badges - Completed basic view helper
* FlashMessages - Completed basic view helper
* Icons - Completed basic view helper
* Image - Completed basic view helper
* Labels - Completed basic view helper
* Wells - Completed basic view helper
* Zend\Navigation - Completed basic integration
* ProgressBar  - Completed basic view helper
* Panel - Completed basic view helper for Bootstrap v3.x


Navigation Usage
----------------

<?php
$container = new Zend\Navigation\Navigation(array(
    array(
        'label' => 'Page 1',
        'uri' => '/account',
        
    ),
    array(
        'label' => 'Page 2',
        'uri' => '#',
        
        'pages' => array(
            array(
                'label' => 'Page 2.1',
                'uri' => '#',
                'active' => 'true',
            ),
            array(
                'label' => 'Page 2.2',
                'uri' => '#',
            )
        )
    ),
    array(
        'label' => 'Page 3',
        'uri' => '#',
    ),
        ));
?>


Bootstrap v3.x

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <?php echo $this->ztbnavigation()->ztbmenu($container); ?>
        </div>
    </div>
</nav>


Bootstrap v2.x

<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">Title</a>

        <?php echo $this->ztbnavigation()->ztbmenu($container); ?>
    </div>
</div>


Breadcrumbs Usage
----------------

<?php
echo $this->ztbnavigation()->ztbbreadcrumbs($container);
?>


Form Usage
----------

<?php
// render a whole form
echo $this->ztbForm($this->form);
?>
<br/>

<?php
// render element by element
$form = $this->form;
$form->prepare();
echo $this->form()->openTag($form);
echo $this->ztbFormElement($this->form->get('element'));
echo $this->form()->closeTag();
?>
<br/>
Alert Usage
-----------

<?php
echo $this->ztbAlert('This is an alert');
// additional parameters: block level and class
echo $this->ztbAlert('This is an alert', true, 'alert-danger');

// explicit usage
// explicit types: info, error, success, warning
echo $this->ztbAlert()->warning('This is an alert');
// explicit additional parameters: block level
echo $this->ztbAlert()->warning('This is an alert');
?>
<br/>
Badge Usage
-----------

<?php
echo $this->ztbBadge('This is a badge');
// additional parameters: class
echo $this->ztbBadge('This is a badge', 'badge-info');

// explicit usage
// explicit types: info, important, inverse, success, warning
echo $this->ztbBadge()->warning('This is a badge');
?>
<br/>
Close Icon Usage
----------------

<?php
echo $this->ztbCloseIcon();
// or render an anchor
echo $this->ztbCloseIcon('a');
?>
<br/>


FlashMessenger Usage
--------------------

<?php
// controller/action
// other types Info, Success, Error
/*$this->flashMessenger()->addMessage(
        'User could not be saved due to a database error.'
);

// other options
$this->flashMessenger()->addMessage(array(
    'message' => 'User could not be saved due to a database error.',
    'title' => 'Fatal Error!',
    'titleTag' => 'h4',
    'isBlock' => true,
));*/
?>
<br/>


<?php
// view script
// render all messages in all namespaces
echo $this->ztbFlashMessenger()->render();

// explicit usage
// explicit types: default, info, success, error
echo $this->ztbFlashMessenger('error');
// or
echo $this->ztbFlashMessenger()->render('info');
?>
<br/>


Icon Usage
-----------
  <a class="btn btn-primary" href="#"><?php echo $this->ztbIcon('user', 'white'); ?> User</a>
<?php
echo $this->ztbIcon('user');
// additional parameters: color
echo $this->ztbIcon('user', 'white');

// explicit usage
echo $this->ztbIcon()->user();
echo $this->ztbIcon()->user('white');
// icon names with dashes should be camel cased when using this method
echo $this->ztbIcon()->plusSign();
?>

see [Twitter Botstrap Icons](http://twitter.github.com/bootstrap/base-css.html#icons) for available icons

<br/>
Image Usage
-----------

<?php
echo $this->ztbImage('/img/067.JPG', 'circle');

// explicit usage
// explicit types: circle, rounded, polaroid
echo $this->ztbImage()->polaroid('/img/067.JPG');
?>
<br/>
Label Usage
-----------

<?php
echo $this->ztbLabel('This is a label');
// additional parameters: class
echo $this->ztbLabel('This is a label', 'important');

// explicit usage
// explicit types: info, important, inverse, success, warning
echo $this->ztbLabel()->info('This is a label');
?>

<br/>


Well Usage
-----------

<?php
echo $this->ztbWell('This is a well');
// additional parameters: class
echo $this->ztbWell('This is a large well', 'well-large');

// explicit usage
// explicit types: small, large
echo $this->ztbWell()->small('This is a small well');
?>

Panel Usage
-------------

<?php
echo $this->ztbPanel('This is a Panelbody', 'This is a Paneltitle', 'This is a Panelfooter', 'primary');
echo $this->ztbPanel()->success('This is a Panelbody', 'This is a Paneltitle', 'This is a Panelfooter');

?>

Progress Usage
---------------

<?php

echo $this->ztbProgress(50, 'success', false, true, false);
echo $this->ztbProgress()->danger(50, true, true, true);
?>

