<?php
namespace Ramphor\SharpSlider\Slider\SliderType\Carousel;

use Nextend\SmartSlider3\Slider\SliderType\AbstractSliderTypeFrontend;

class SliderTypeCarouselFrontend extends AbstractSliderTypeFrontend
{
    protected static $instances = array();

    public function renderType($css)
    {
        $nextId = max(static::$instances) + 1;
        array_push(static::$instances, $nextId);

        $sliderId = $this->slider->alias ? $this->slider->alias : "sharp_slider_{$this->slider->sliderId}";
        $slides = $this->slider->getSlides();
        ?>
        <div id="<?php echo $sliderId; ?>" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                <?php foreach ($slides as $slide) : ?>
                    <li class="splide__slide"><?php echo $slide->background; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php
        execute_script("<script>var {$sliderId} = new Splide( '#{$sliderId}', {
            type: 'loop',
            perPage: 3,
            perMove: 3,
        } ).mount();</script>");
    }
}
