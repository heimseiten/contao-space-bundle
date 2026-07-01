<?php
// src/Twig/Deserializer.php

namespace Heimseiten\ContaoSpaceBundle\Twig;

use Contao\StringUtil;  
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Deserializer extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('deserialize_1', [$this, 'deserialize1']),
            new TwigFilter('deserialize_2', [$this, 'deserialize2']),
            new TwigFilter('deserialize_3', [$this, 'deserialize3']),
            new TwigFilter('deserialize_4', [$this, 'deserialize4']),
            new TwigFilter('deserialize_top', [$this, 'deserializeTop']),
            new TwigFilter('deserialize_right', [$this, 'deserializeRight']),
            new TwigFilter('deserialize_bottom', [$this, 'deserializeBottom']),
            new TwigFilter('deserialize_left', [$this, 'deserializeLeft']),
            new TwigFilter('css_unit', [$this, 'cssUnit']),
        ];
    }

    // Reine Zahl -> "<n>px"; Wert mit Einheit (z. B. 10vh) unverändert; leer -> "".
    public function cssUnit(?string $value): string
    {
        $value = (string) $value;

        if ($value === '') {
            return '';
        }

        return is_numeric($value) ? $value . 'px' : $value;
    }
    public function deserialize1(?string $value): string { return (string) (StringUtil::deserialize($value, true)[0] ?? ''); }
    public function deserialize2(?string $value): string { return (string) (StringUtil::deserialize($value, true)[1] ?? ''); }
    public function deserialize3(?string $value): string { return (string) (StringUtil::deserialize($value, true)[2] ?? ''); }
    public function deserialize4(?string $value): string { return (string) (StringUtil::deserialize($value, true)[3] ?? ''); }

    public function deserializeTop(?string $value): string { return (string) (StringUtil::deserialize($value, true)['top'] ?? ''); }
    public function deserializeRight(?string $value): string { return (string) (StringUtil::deserialize($value, true)['right'] ?? ''); }
    public function deserializeBottom(?string $value): string { return (string) (StringUtil::deserialize($value, true)['bottom'] ?? ''); }
    public function deserializeLeft(?string $value): string { return (string) (StringUtil::deserialize($value, true)['left'] ?? ''); }
}