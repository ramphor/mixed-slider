<?php
namespace Ramphor\SharpSlider\Widget\Group;

use Nextend\Framework\Form\Container\ContainerTab;
use Nextend\Framework\Form\Container\ContainerTable;
use Nextend\Framework\Form\Element\OnOff;
use Nextend\Framework\Form\Element\Text;
use Nextend\Framework\Form\Element\Text\NumberAutoComplete;
use Nextend\Framework\Pattern\PluggableTrait;
use Nextend\SmartSlider3\Form\Element\ControlTypePicker;
use Nextend\SmartSlider3\Widget\Group\AbstractWidgetGroup;

use Ramphor\SharpSlider\Widget\TitleTab\TitleTabTransition\TitleTabTransition;

class TitleTab extends AbstractWidgetGroup
{

    use PluggableTrait;

    public $ordering = 6;

    public function __construct()
    {
        parent::__construct();

        new TitleTabTransition($this, 'titletab');

        $this->makePluggable('SliderWidgetTitleTab');
    }

    public function getName()
    {
        return 'titletab';
    }

    public function getLabel()
    {
        return n2_('Title Tabs');
    }

    /**
     * @param ContainerTab $container
     */
    public function renderFields($container)
    {

        $form = $container->getForm();

        $this->compatibility($form);

        /**
         * Used for field removal: /controls/widget-titletab
         */
        $table = new ContainerTable($container, 'widget-titletab', n2_('Title Tabs'));

        new OnOff($table->getFieldsetLabel(), 'widget-titletab-enabled', false, 0, array(
            'relatedFieldsOn' => array(
                'table-rows-widget-titletab'
            )
        ));

        $row1 = $table->createRow('widget-titletab-1');

        $row2 = $table->createRow('widget-titletab-2');

        new NumberAutoComplete($row2, 'widget-titletab-width', n2_('Desktop width'), 100, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));

        new NumberAutoComplete($row2, 'widget-titletab-height', n2_('Height'), 60, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));

        new NumberAutoComplete($row2, 'widget-titletab-tablet-width', n2_('Tablet width'), 100, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));

        new NumberAutoComplete($row2, 'widget-titletab-tablet-height', n2_('Height'), 60, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));

        new NumberAutoComplete($row2, 'widget-titletab-mobile-width', n2_('Mobile width'), 100, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));

        new NumberAutoComplete($row2, 'widget-titletab-mobile-height', n2_('Height'), 60, array(
            'unit'   => 'px',
            'values' => array(
                60,
                100,
                150,
                200
            ),
            'wide'   => 4
        ));


        $ajaxUrl = $form->createAjaxUrl(array("slider/renderwidgettitletab"));
        new ControlTypePicker($row1, 'widgettitletab', $table, $ajaxUrl, $this, 'default');


        $row3 = $table->createRow('widget-titletab-3');
        $this->addHideOnFeature('widget-titletab-display-', $row3);
    }
}
