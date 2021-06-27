<?php


namespace Ramphor\SharpSlider\Widget\TitleTab\TitleTabTransition;

use Nextend\Framework\Form\Element\Font;
use Nextend\Framework\Form\Element\OnOff;
use Nextend\Framework\Form\Element\Select;
use Nextend\Framework\Form\Element\Style;
use Nextend\Framework\Form\Element\Text;
use Nextend\Framework\Form\Element\Text\FieldImage;
use Nextend\Framework\Form\Element\Text\Number;
use Nextend\Framework\Form\Fieldset\FieldsetRow;
use Ramphor\SharpSlider\Widget\AbstractWidget;

class TitleTabTransition extends AbstractWidget
{

    protected $key = 'widget-titletab-';

    protected $defaults = array(
        'widget-titletab-position-mode'     => 'simple',
        'widget-titletab-position-area'     => 12,
        'widget-titletab-action'            => 'click',
        'widget-titletab-style-bar'         => '{"data":[{"backgroundcolor":"242424ff","padding":"3|*|3|*|3|*|3|*|px","boxshadow":"0|*|0|*|0|*|0|*|000000ff","border":"0|*|solid|*|000000ff","borderradius":"0","extra":""}]}',
        'widget-titletab-style-slides'      => '{"data":[{"backgroundcolor":"00000000","padding":"0|*|0|*|0|*|0|*|px","boxshadow":"0|*|0|*|0|*|0|*|000000ff","border":"0|*|solid|*|ffffff00","borderradius":"0","opacity":"40","extra":"margin: 3px;\ntransition: all 0.4s;"},{"border":"0|*|solid|*|ffffffcc","opacity":"100","extra":""}]}',
        'widget-titletab-arrow'             => 1,
        'widget-titletab-arrow-image'       => '',
        'widget-titletab-arrow-width'       => 26,
        'widget-titletab-arrow-offset'      => 0,
        'widget-titletab-arrow-prev-alt'    => 'previous arrow',
        'widget-titletab-arrow-next-alt'    => 'next arrow',
        'widget-titletab-title-style'       => '{"data":[{"backgroundcolor":"000000ab","padding":"3|*|10|*|3|*|10|*|px","boxshadow":"0|*|0|*|0|*|0|*|000000ff","border":"0|*|solid|*|000000ff","borderradius":"0","extra":"bottom: 0;\nleft: 0;"}]}',
        'widget-titletab-title-font'        => '{"data":[{"color":"ffffffff","size":"12||px","tshadow":"0|*|0|*|0|*|000000ab","afont":"Montserrat","lineheight":"1.2","bold":0,"italic":0,"underline":0,"align":"left"},{"color":"fc2828ff","afont":"Raleway,Arial","size":"25||px"},{}]}',
        'widget-titletab-description'       => 0,
        'widget-titletab-description-font'  => '{"data":[{"color":"ffffffff","size":"12||px","tshadow":"0|*|0|*|0|*|000000ab","afont":"Montserrat","lineheight":"1.3","bold":0,"italic":0,"underline":0,"align":"left"},{"color":"fc2828ff","afont":"Raleway,Arial","size":"25||px"},{}]}',
        'widget-titletab-caption-size'      => 100,
        'widget-titletab-group'             => 1,
        'widget-titletab-orientation'       => 'auto',
        'widget-titletab-size'              => '100%',
        'widget-titletab-show-image'        => 1,
        'widget-titletab-width'             => 100,
        'widget-titletab-height'            => 60,
        'widget-titletab-align-content'     => 'start',
        'widget-titletab-show-nextprev'     => 0
    );


    public function renderFields($container)
    {
        $row1 = new FieldsetRow($container, 'widget-titletab-default-row-1');

        new Select($row1, 'widget-titletab-align-content', n2_('Align titles'), '', array(
            'options' => array(
                'start'         => n2_('Start'),
                'center'        => n2_('Center'),
                'end'           => n2_('End'),
                'space-between' => n2_('Space between'),
                'space-around'  => n2_('Space around')
            )
        ));

        $rowCaption = new FieldsetRow($container, 'widget-titletab-default-row-caption');
        new Style($rowCaption, 'widget-titletab-title-style', n2_('Caption'), '', array(
            'mode'    => 'simple',
            'post'    => 'break',
            'font'    => 'sliderwidget-titletab-title-font',
            'preview' => 'SmartSliderAdminWidgetTitleTab'
        ));

        new Font($rowCaption, 'widget-titletab-title-font', n2_('Title Font'), '', array(
            'mode'    => 'simple',
            'style'   => 'sliderwidget-titletab-title-style',
            'preview' => 'SmartSliderAdminWidgetTitleTab'
        ));

        new OnOff($rowCaption, 'widget-titletab-description', n2_('Description'), '', array(
            'relatedFieldsOn' => array(
                'sliderwidget-titletab-description-font'
            )
        ));

        new Font($rowCaption, 'widget-titletab-description-font', '', '', array(
            'mode'    => 'simple',
            'style'   => 'sliderwidget-titletab-title-style',
            'preview' => 'SmartSliderAdminWidgetTitleTab'
        ));

        new OnOff($rowCaption, 'widget-titletab-show-nextprev', n2_('Show Next/Prev'), '');

        new Number($rowCaption, 'widget-titletab-caption-size', n2_('Size'), '', array(
            'wide'           => 5,
            'unit'           => 'px',
            'tipLabel'       => n2_('Size'),
            'tipDescription' => n2_('The height (horizontal orientation) or width (vertical orientation) of the caption container.')
        ));
    }


    public function prepareExport($export, $params)
    {

        $export->addVisual($params->get($this->key . 'style-bar'));
        $export->addVisual($params->get($this->key . 'style-slides'));
        $export->addVisual($params->get($this->key . 'title-style'));

        $export->addVisual($params->get($this->key . 'title-font'));
        $export->addVisual($params->get($this->key . 'description-font'));
    }

    public function prepareImport($import, $params)
    {
        $params->set($this->key . 'style-bar', $import->fixSection($params->get($this->key . 'style-bar', '')));
        $params->set($this->key . 'style-slides', $import->fixSection($params->get($this->key . 'style-slides', '')));
        $params->set($this->key . 'title-style', $import->fixSection($params->get($this->key . 'title-style', '')));

        $params->set($this->key . 'title-font', $import->fixSection($params->get($this->key . 'title-font', '')));
        $params->set($this->key . 'description-font', $import->fixSection($params->get($this->key . 'description-font', '')));
    }
}
