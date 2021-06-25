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
    }

    public function createCss($slider)
    {
    }

    public function createFrontend($slider)
    {
        return new SliderTypeCarouselFrontend($slider);
    }
}
