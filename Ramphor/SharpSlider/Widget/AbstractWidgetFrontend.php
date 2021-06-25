<?php
namespace Ramphor\SharpSlider\Widget;

use Nextend\SmartSlider3\Widget\AbstractWidgetFrontend as SmartAbstractWidgetFrontend;

abstract class AbstractWidgetFrontend extends SmartAbstractWidgetFrontend
{
    public static function getAssetsPathV4($path = '')
    {
        return sprintf(
            '%s/assets/%s',
            SHARP_SLIDER_ROOT_DIR,
            $path
        );
    }
}
