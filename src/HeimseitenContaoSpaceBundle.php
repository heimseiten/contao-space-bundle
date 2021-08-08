<?php

declare(strict_types=1);

namespace Heimseiten\ContaoSpaceBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class HeimseitenContaoSpaceBundle
 */
class HeimseitenContaoSpaceBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
