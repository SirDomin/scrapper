<?php

declare(strict_types=1);

namespace App\Bundle\CoreBundle\Provider;

interface BaseUrlProviderInterface
{
    public function provide(): string;
}
