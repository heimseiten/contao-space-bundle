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
        ];
    }
    public function deserialize1(string $value): string { return StringUtil::deserialize($value)[0]; }
    public function deserialize2(string $value): string { return StringUtil::deserialize($value)[1]; }
    public function deserialize3(string $value): string { return StringUtil::deserialize($value)[2]; }
    public function deserialize4(string $value): string { return StringUtil::deserialize($value)[3]; }
    
    public function deserializeTop(string $value): string { 
        if (StringUtil::deserialize($value, true) ?? '') {
            return StringUtil::deserialize($value, true)['top'];
        } else {
            return '';
        }
    }
    public function deserializeRight(string $value): string { 
        if (StringUtil::deserialize($value, true) ?? '') {
            return StringUtil::deserialize($value, true)['right'];
        } else {
            return '';
        }
    }
    public function deserializeBottom(string $value): string { 
        if (StringUtil::deserialize($value, true) ?? '') {
            return StringUtil::deserialize($value, true)['bottom'];
        } else {
            return '';
        }
    }
    public function deserializeLeft(string $value): string { 
        if (StringUtil::deserialize($value, true) ?? '') {
            return StringUtil::deserialize($value, true)['left'];
        } else {
            return '';
        }
    }
}