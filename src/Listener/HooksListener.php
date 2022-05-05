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
            if ( deserialize($template->space)[0] != NULL ) { 
                $template->class .= ' space_top';
                if (is_numeric(deserialize($template->space)[0])){
                    $template->style .= 'margin-top: ' . deserialize($template->space)[0] . 'px;'; 
                } else {
                    $template->style .= '--space_top: ' . deserialize($template->space)[0] . ';'; 
                }
            }
            if ( deserialize($template->space)[1] != NULL ) { 
                $template->class .= ' space_bottom';
                if (is_numeric(deserialize($template->space)[1])){
                    $template->style .= 'margin-bottom: ' . deserialize($template->space)[1] . 'px;'; 
                } else {
                    $template->style .= '--space_bottom: ' . deserialize($template->space)[1] . ';'; 
                }
            }
            if ( deserialize($template->space_mobile)[0] != NULL ) { 
                $template->class .= ' space_top_mobile'; 
                $template->style .= '--space_top_mobile: ' . deserialize($template->space_mobile)[0] . ';'; 
            }
            if ( deserialize($template->space_mobile)[1] != NULL ) { 
                $template->class .= ' space_bottom_mobile'; 
                $template->style .= '--space_bottom_mobile: ' . deserialize($template->space_mobile)[1] . ';'; 
            }
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
            if ( deserialize($template->space)[0] != NULL ) { 
                $template->class .= ' space_top;'; 
                if (is_numeric(deserialize($template->space)[0])){
                    $template->style .= 'margin-top: ' . deserialize($template->space)[0] . 'px;'; 
                } else {
                    $template->style .= '--space_top: ' . deserialize($template->space)[0] . ';'; 
                }
            }
            if ( deserialize($template->space)[1] != NULL ) { 
                $template->class .= ' space_bottom'; 
                if (is_numeric(deserialize($template->space)[1])){
                    $template->style .= 'margin-bottom: ' . deserialize($template->space)[1] . 'px;'; 
                } else {
                    $template->style .= '--space_bottom: ' . deserialize($template->space)[1] . ';'; 
                }
            }
            if ( deserialize($template->space_mobile)[0] != NULL ) { 
                $template->class .= ' space_top_mobile'; 
                $template->style .= '--space_top_mobile: ' . deserialize($template->space_mobile)[0] . ';'; 
            }
            if ( deserialize($template->space_mobile)[1] != NULL ) { 
                $template->class .= ' space_bottom_mobile'; 
                $template->style .= '--space_bottom_mobile: ' . deserialize($template->space_mobile)[1] . ';'; 
            }
        }
    }
}
