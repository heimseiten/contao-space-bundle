<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_article']['fields']['space'] = [
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['space'],
	'exclude'   => true,
	'inputType' => 'text',
	'eval'      => array('multiple'=>true, 'size'=>2, 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'       => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_article']['fields']['space_mobile'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['space_mobile'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50'),
    'sql'       => "text NULL"
];

PaletteManipulator::create()
    ->addField('space', 'expert_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('space_mobile', 'expert_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_article');
