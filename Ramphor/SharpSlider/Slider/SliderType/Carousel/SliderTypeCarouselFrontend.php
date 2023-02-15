<?php
namespace Ramphor\SharpSlider\Slider\SliderType\Carousel;

use Nextend\SmartSlider3\Slider\SliderType\AbstractSliderTypeFrontend;

class SliderTypeCarouselFrontend extends AbstractSliderTypeFrontend
{
    protected static $instances = array();

    public function renderType($css)
    {
        $nextId = empty(static::$instances) ? 1 : max(static::$instances) + 1;
        array_push(static::$instances, $nextId);

        $sliderId = empty($this->slider->alias) ? "sharp_slider_{$this->slider->sliderId}" : $this->slider->alias;
        $slides = $this->slider->getSlides();
        ?>
        <div id="<?php echo $sliderId; ?>" class="swiffy-slider slider-item-show4 slider-nav-page slider-nav-autoplay slider-nav-autopause" data-slider-nav-autoplay-interval="5000">

            <ul class="slider-container">
            <?php foreach ($slides as $slide) : ?>
                <li class="splide__slide"><?php echo $slide->background; ?></li>
            <?php endforeach; ?>
            </ul>
            <button type="button" class="slider-nav" aria-label="Go left"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
        </div>

        <?php
    }
}
