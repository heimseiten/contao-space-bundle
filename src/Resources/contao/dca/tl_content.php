<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_content']['fields']['space_desktop'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['space_desktop'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50 clr'),
    'sql'       => "text NULL"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['space_mobile'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['space_mobile'],
    'inputType' => 'text',
    'eval'      => array('multiple'=>true, 'size'=>2,'tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function()
{
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette)
    {
        if (\is_string($palette))
        {   
            PaletteManipulator::create()
            ->addField('space_desktop', 'expert_legend', PaletteManipulator::POSITION_APPEND)
            ->addField('space_mobile', 'expert_legend', PaletteManipulator::POSITION_APPEND)
            ->applyToPalette($key, 'tl_content');
        }
    }
};