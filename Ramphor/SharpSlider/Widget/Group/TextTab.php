<?php
namespace Ramphor\SharpSlider\Widget\Group;

use Nextend\Framework\Pattern\PluggableTrait;
use Nextend\Framework\Form\Container\ContainerTable;
use Nextend\SmartSlider3\Widget\Group\AbstractWidgetGroup;
use Nextend\Framework\Form\Element\OnOff;
use Ramphor\SharpSlider\Widget\TextTab\TextTabTransition\TextTabTransition;

class TextTab extends AbstractWidgetGroup
{
    use PluggableTrait;

    public function __construct()
    {
        parent::__construct();

        new TextTabTransition($this, 'transition');

        $this->makePluggable('SliderWidgetTextTab');
    }

    public function getName()
    {
        return 'text_tab';
    }

    public function getLabel()
    {
        return __('Text Tab', 'sharp_slider');
    }

    public function renderFields($container)
    {
        $form = $container->getForm();

        $this->compatibility($form);

        /**
         * Used for field removal: /controls/widget-text-tab
         */
        $table = new ContainerTable($container, 'widget-text-tab', __('Text Tab', 'sharp_slider'));
        new OnOff($table->getFieldsetLabel(), 'widget-text-tab-enabled', false, 0, array(
            'relatedFieldsOn' => array(
                'table-rows-widget-text-tab'
            )
        ));
    }
}
