<?php
declare(strict_types=1);

namespace Heimseiten\ContaoSpaceBundle\Listener;

use Contao\StringUtil;
use Contao\Template;

class HooksListener
{
    public function __invoke(Template $template)
    {
        if ($template->type !== 'article') {
            return;
        }

        // deserialize(..., true) always yields an array, so empty/unset values no longer
        // trigger "array offset on null" / "uninitialized string offset" warnings.
        $space = StringUtil::deserialize($template->space, true);
        $spaceMobile = StringUtil::deserialize($template->space_mobile, true);

        if (($space[0] ?? '') !== '') {
            $template->class .= ' space_top';
            if (is_numeric($space[0])) {
                $template->style .= 'margin-top: ' . $space[0] . 'px;';
            } else {
                $template->style .= '--space_top: ' . $space[0] . ';';
            }
        }
        if (($space[1] ?? '') !== '') {
            $template->class .= ' space_bottom';
            if (is_numeric($space[1])) {
                $template->style .= 'margin-bottom: ' . $space[1] . 'px;';
            } else {
                $template->style .= '--space_bottom: ' . $space[1] . ';';
            }
        }
        if (($spaceMobile[0] ?? '') !== '') {
            $template->class .= ' space_top_mobile';
            $template->style .= '--space_top_mobile: ' . $spaceMobile[0] . ';';
        }
        if (($spaceMobile[1] ?? '') !== '') {
            $template->class .= ' space_bottom_mobile';
            $template->style .= '--space_bottom_mobile: ' . $spaceMobile[1] . ';';
        }
    }
}
