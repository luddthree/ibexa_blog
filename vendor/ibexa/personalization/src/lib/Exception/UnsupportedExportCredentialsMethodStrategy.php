<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Personalization\Exception;

use RuntimeException;
use Throwable;

final class UnsupportedExportCredentialsMethodStrategy extends RuntimeException implements IbexaPersonalizationException
{
    /**
     * @param array<string> $supportedStrategies
     */
    public function __construct(string $strategy, array $supportedStrategies, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf(
                'Unsupported ExportCredentialsStrategy: %s. Supported strategies: %s',
                $strategy,
                implode(', ', $supportedStrategies)
            ),
            $code,
            $previous
        );
    }
}
