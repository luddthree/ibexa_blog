<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\CorporateAccount\REST\QueryBuilder;

use Ibexa\Contracts\Core\Repository\Values\Content\Query;
use Symfony\Component\HttpFoundation\Request;

/**
 * @internal
 */
interface ContentQueryBuilderInterface
{
    public function buildQuery(Request $request, int $defaultLimit): Query;
}
