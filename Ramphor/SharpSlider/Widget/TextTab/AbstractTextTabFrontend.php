<?php
namespace Ramphor\SharpSlider\Widget\TextTab;

use Nextend\Framework\Platform\Platform;
use Nextend\Framework\Url\Url;
use Ramphor\SharpSlider\Widget\AbstractWidgetFrontend;

abstract class AbstractTextTabFrontend extends AbstractWidgetFrontend
{
    public function __construct($sliderWidget, $widget, $params)
    {

        parent::__construct($sliderWidget, $widget, $params);

        if ($params->get($this->key . 'thumbnail-show-image')) {
            $this->slider->exposeSlideData['thumbnail'] = true;
        }

        $this->addToPlacement($this->key . 'position-', array(
            $this,
            'render'
        ));
    }


    public function getCommonAssetsUri()
    {
        return Url::pathToUri($this->getCommonAssetsPath());
    }

    public function getCommonAssetsPath()
    {

        return Platform::filterAssetsPath(dirname(__FILE__) . '/Assets');
    }
}
