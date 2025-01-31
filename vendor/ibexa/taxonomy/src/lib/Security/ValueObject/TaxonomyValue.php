<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Taxonomy\Security\ValueObject;

use Ibexa\Contracts\Core\Repository\Values\ValueObject;

final class TaxonomyValue extends ValueObject
{
    public string $taxonomy;
}
