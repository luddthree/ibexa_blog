<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\CorporateAccount\View;

use Ibexa\Contracts\Core\Repository\Values\Content\Content;
use Ibexa\Core\MVC\Symfony\View\BaseView;

class CompanyEditSuccessView extends BaseView
{
    private Content $company;

    public function __construct(
        Content $company
    ) {
        parent::__construct();

        $this->company = $company;
    }

    /**
     * @return array{
     *     company: \Ibexa\Contracts\Core\Repository\Values\Content\Content
     * }
     */
    protected function getInternalParameters()
    {
        return [
            'company' => $this->company,
        ];
    }

    public function getCompany(): Content
    {
        return $this->company;
    }

    public function setCompany(Content $company): void
    {
        $this->company = $company;
    }
}
