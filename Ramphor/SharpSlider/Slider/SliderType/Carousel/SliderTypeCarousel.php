<?php
namespace Ramphor\SharpSlider\Slider\SliderType\Carousel;

use Nextend\SmartSlider3\Slider\SliderType\AbstractSliderType;

class SliderTypeCarousel extends AbstractSliderType
{
    public function getName()
    {
        return 'carousel';
    }

    public function createAdmin()
    {
        return new SliderTypeCarouselAdmin($this);
    }

    public function createCss($slider)
    {
    }

    public function createFrontend($slider)
    {
        return new SliderTypeCarouselFrontend($slider);
    }
}
