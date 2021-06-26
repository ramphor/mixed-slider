<?php
namespace Ramphor\SharpSlider\Slider\SliderType\Carousel;

class SliderTypeCarousel
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
