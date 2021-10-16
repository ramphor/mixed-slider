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
            perPage: 4,
            perMove: 4,
            pagination: false,
        } ).mount();</script>");
    }
}
