<?php

declare(strict_types=1);

namespace App\Bundle\OlxBundle\Provider\ItemCollection;

interface OlxItemCollectionProviderInterface
{
    public function provide(string $content): array;
}
