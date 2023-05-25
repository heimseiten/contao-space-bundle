<?php
// src/Twig/AppExtension.php

namespace Heimseiten\ContaoSpaceBundle\Twig;

use Contao\StringUtil;  

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // Register a new filter named "rot13" and tell Twig which method to execute
            new TwigFilter('space_top', [$this, 'spaceTop']),
            new TwigFilter('space_bottom', [$this, 'spaceBottom']),
        ];
    }

    public function spaceTop(string $value): string
    {
        return StringUtil::deserialize($value)[0];
    }
    
    public function spaceBottom(string $value): string
    {
        return StringUtil::deserialize($value)[1];
    }
}