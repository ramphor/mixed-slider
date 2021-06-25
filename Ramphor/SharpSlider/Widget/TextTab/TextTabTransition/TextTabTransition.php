<?php
namespace Ramphor\SharpSlider\Widget\TextTab\TextTabTransition;

use Nextend\Framework\Form\Element\Style;
use Nextend\Framework\Form\Element\Select;
use Nextend\Framework\Form\Fieldset\FieldsetRow;
use Nextend\SmartSlider3\Form\Element\Group\WidgetPosition;
use Ramphor\SharpSlider\Widget\TextTab\AbstractTextTab;

class TextTabTransition extends AbstractTextTab
{
    public function renderFields($container)
    {
        $row1 = new FieldsetRow($container, 'widget-text-tab-default-row-1');

        new WidgetPosition($row1, 'widget-text-tab-position', n2_('Position'));

        new Select($row1, 'widget-text-tab-align-content', n2_('Align thumbnails'), '', array(
            'options' => array(
                'start'         => n2_('Start'),
                'center'        => n2_('Center'),
                'end'           => n2_('End'),
                'space-between' => n2_('Space between'),
                'space-around'  => n2_('Space around')
            )
        ));

        new Style($row1, 'widget-text-tab-style-bar', n2_('Bar'), '', array(
            'mode'    => 'simple',
            'style2'  => 'sliderwidget-text-tab-style-slides',
            'preview' => 'SmartSliderAdminWidgetThumbnailBasic'
        ));

        new Style($row1, 'widget-text-tab-style-slides', n2_('Thumbnail'), '', array(
            'mode'    => 'dot',
            'style2'  => 'sliderwidget-text-tab-style-bar',
            'preview' => 'SmartSliderAdminWidgetThumbnailBasic'
        ));
    }
}
