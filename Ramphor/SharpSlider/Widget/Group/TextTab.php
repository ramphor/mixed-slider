<?php
namespace Ramphor\SharpSlider\Widget\Group;

use Nextend\Framework\Form\Container\ContainerTable;
use Nextend\Framework\Form\Element\OnOff;
use Nextend\Framework\Form\Element\Select;
use Nextend\Framework\Form\Element\Style;
use Nextend\Framework\Form\Element\Text;
use Nextend\Framework\Form\Element\Text\NumberAutoComplete;
use Nextend\Framework\Pattern\PluggableTrait;
use Nextend\SmartSlider3\Form\Element\ControlTypePicker;
use Nextend\SmartSlider3\Widget\Group\AbstractWidgetGroup;
use Ramphor\SharpSlider\Widget\TextTab\TextTabTransition\TextTabTransition;

class TextTab extends AbstractWidgetGroup
{
    use PluggableTrait;

    public function __construct()
    {
        parent::__construct();

        new TextTabTransition($this, 'text_tab');

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
        new OnOff($table->getFieldsetLabel(), 'widget-text_tab-enabled', false, 0, array(
            'relatedFieldsOn' => array(
                'table-rows-widget-text-tab'
            )
        ));

        $row1 = $table->createRow('widget-text-tab-1');


        $url = $form->createAjaxUrl(array("slider/renderwidgettext_tab"));

        new ControlTypePicker($row1, 'widgettext_tab', $table, $url, $this);

        $row2 = $table->createRow('widget-text-tab-3');
        new OnOff($row2, 'widget-text-tab-display-hover', n2_('Shows on hover'), 0);

        $this->addHideOnFeature('widget-text-tab-display-', $row2);
    }
}
