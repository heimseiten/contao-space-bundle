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

        // Abstände als CSS-Variablen im selben Format wie die Content-Elemente
        // (siehe content_element/_base.html.twig): --margin-*(-mobile). Reine Zahlen
        // bekommen "px", Werte mit Einheit (z. B. 10vh) werden unverändert übernommen.
        // deserialize(..., true) liefert immer ein Array -> keine Offset-Warnungen.
        $space = StringUtil::deserialize($template->space, true);
        $spaceMobile = StringUtil::deserialize($template->space_mobile, true);

        $map = [
            '--margin-top' => $space[0] ?? '',
            '--margin-bottom' => $space[1] ?? '',
            '--margin-top-mobile' => $spaceMobile[0] ?? '',
            '--margin-bottom-mobile' => $spaceMobile[1] ?? '',
        ];

        foreach ($map as $prop => $value) {
            if ((string) $value !== '') {
                $template->style .= $prop . ': ' . $value . (is_numeric($value) ? 'px' : '') . ';';
            }
        }
    }
}
