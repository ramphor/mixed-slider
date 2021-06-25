<?php
namespace Ramphor\SharpSlider\Widget\TextTab\TextTabTransition;

use Ramphor\SharpSlider\Widget\TextTab\AbstractTextTabFrontend;

class TextTabTransitionFrontend extends AbstractTextTabFrontend
{
    public function __construct($sliderWidget, $widget, $params)
    {

        parent::__construct($sliderWidget, $widget, $params);

        $this->addToPlacement($this->key . 'position-', array(
            $this,
            'render'
        ));
    }

    public function render($attributes = array())
    {
    }
}
