<?php

declare(strict_types=1);

namespace Heimseiten\ContaoSpaceBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;

class HooksListener
{
    public function __invoke(Template $template)
    {
        if (TL_MODE == 'FE' && $template->type == 'article') {
            if ( deserialize($template->space_desktop)[0] != NULL ) { $template->style .= '--space_top_desktop: ' . deserialize($template->space_desktop)[0] . ';'; }
            if ( deserialize($template->space_desktop)[1] != NULL ) { $template->style .= '--space_bottom_desktop: ' . deserialize($template->space_desktop)[1] . ';'; }
            if ( deserialize($template->space_mobile)[0] != NULL ) { $template->style .= '--space_top_mobile: ' . deserialize($template->space_mobile)[0] . ';'; }
            if ( deserialize($template->space_mobile)[1] != NULL ) { $template->style .= '--space_bottom_mobile: ' . deserialize($template->space_mobile)[1] . ';'; }
        }
        if (TL_MODE == 'FE' && 
                $template->type == 'text' || 
                $template->type == 'image' ||
                $template->type == 'headline' ||
                $template->type == 'sliderStart' ||
                $template->type == 'sliderStop' ||
                $template->type == 'teaser_element' ||
                $template->type == 'accordionSingle' ||
                $template->type == 'gallery' ||
                $template->type == 'youtube' ||
                $template->type == 'player'
            ) {
            if ( deserialize($template->space_desktop)[0] != NULL ) { $template->style .= '--space_top_desktop: ' . deserialize($template->space_desktop)[0] . ';'; }
            if ( deserialize($template->space_desktop)[1] != NULL ) { $template->style .= '--space_bottom_desktop: ' . deserialize($template->space_desktop)[1] . ';'; }
            if ( deserialize($template->space_mobile)[0] != NULL ) { $template->style .= '--space_top_mobile: ' . deserialize($template->space_mobile)[0] . ';'; }
            if ( deserialize($template->space_mobile)[1] != NULL ) { $template->style .= '--space_bottom_mobile: ' . deserialize($template->space_mobile)[1] . ';'; }
        }
    }
}
