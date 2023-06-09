<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_content']['fields']['space'] = [
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['space'],
	'exclude'   => true,
	'inputType' => 'text',
	'eval'      => array('multiple'=>true, 'size'=>2, 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'       => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['space_mobile'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['space_mobile'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['imagemargin'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['imagemargin'],
    'exclude'   => true,
    'inputType' => 'trbl',
    'options'   => array('px', '%', 'em', 'rem'),
    'eval'      => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(128) COLLATE ascii_bin NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function()
{
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette)
    {
        if (\is_string($palette))
        {   
            PaletteManipulator::create()
            ->addField('space', 'expert_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('space_mobile', 'expert_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('imagemargin', 'expert_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette($key, 'tl_content');
        }
    }
};
