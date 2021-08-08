<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_article']['fields']['space_desktop'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['space_desktop'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50 clr'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_article']['fields']['space_mobile'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['space_mobile'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50'),
    'sql'       => "text NULL"
];

PaletteManipulator::create()
    ->addField('space_desktop', 'expert_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('space_mobile', 'expert_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_article');
