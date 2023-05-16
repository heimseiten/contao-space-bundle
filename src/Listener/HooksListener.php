<?php
declare(strict_types=1);

namespace Heimseiten\ContaoSpaceBundle\Listener;

use Contao\FrontendTemplate;
use Contao\Template;
use Contao\Module;
use Contao\StringUtil;  

class HooksListener
{
    public function __invoke(Template $template)
    {
        if ($template->type == 'article') {
            if ( StringUtil::deserialize ($template->space)[0] != NULL ) { 
                $template->class .= ' space_top';
                if (is_numeric(StringUtil::deserialize ($template->space)[0])){
                    $template->style .= 'margin-top: ' . StringUtil::deserialize ($template->space)[0] . 'px;'; 
                } else {
                    $template->style .= '--space_top: ' . StringUtil::deserialize ($template->space)[0] . ';'; 
                }
            }
            if ( StringUtil::deserialize ($template->space)[1] != NULL ) { 
                $template->class .= ' space_bottom';
                if (is_numeric(StringUtil::deserialize ($template->space)[1])){
                    $template->style .= 'margin-bottom: ' . StringUtil::deserialize ($template->space)[1] . 'px;'; 
                } else {
                    $template->style .= '--space_bottom: ' . StringUtil::deserialize ($template->space)[1] . ';'; 
                }
            }
            if ( StringUtil::deserialize ($template->space_mobile)[0] != NULL ) { 
                $template->class .= ' space_top_mobile'; 
                $template->style .= '--space_top_mobile: ' . StringUtil::deserialize ($template->space_mobile)[0] . ';'; 
            }
            if ( StringUtil::deserialize ($template->space_mobile)[1] != NULL ) { 
                $template->class .= ' space_bottom_mobile'; 
                $template->style .= '--space_bottom_mobile: ' . StringUtil::deserialize ($template->space_mobile)[1] . ';'; 
            }
        }
               
            if ( StringUtil::deserialize ($template->space)[0] != NULL ) { 
                $template->class .= ' space_top;'; 
                if (is_numeric(StringUtil::deserialize ($template->space)[0])){
                    $template->style .= 'margin-top: ' . StringUtil::deserialize ($template->space)[0] . 'px;'; 
                } else {
                    $template->style .= '--space_top: ' . StringUtil::deserialize ($template->space)[0] . ';'; 
                }
            }
            if ( StringUtil::deserialize ($template->space)[1] != NULL ) { 
                $template->class .= ' space_bottom'; 
                if (is_numeric(StringUtil::deserialize ($template->space)[1])){
                    $template->style .= 'margin-bottom: ' . StringUtil::deserialize ($template->space)[1] . 'px;'; 
                } else {
                    $template->style .= '--space_bottom: ' . StringUtil::deserialize ($template->space)[1] . ';'; 
                }
            }
            if ( StringUtil::deserialize ($template->space_mobile)[0] != NULL ) { 
                $template->class .= ' space_top_mobile'; 
                $template->style .= '--space_top_mobile: ' . StringUtil::deserialize ($template->space_mobile)[0] . ';'; 
            }
            if ( StringUtil::deserialize ($template->space_mobile)[1] != NULL ) { 
                $template->class .= ' space_bottom_mobile'; 
                $template->style .= '--space_bottom_mobile: ' . StringUtil::deserialize ($template->space_mobile)[1] . ';'; 
            }
        
    }
}
