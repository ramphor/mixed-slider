<?php
namespace Ramphor\SharpSlider\Application\Frontend;

class ScriptManager
{
    public function init() {
        js('sharpslider', ApplicationTypeFrontend::getAssetPath('js/sharpslider.js'), array(), '3.5.0.10', true);
        js('sharpslider');
    }
}
