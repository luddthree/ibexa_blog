<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Personalization\Form\Type;

use Ibexa\Personalization\Form\DataTransformer\ItemTypeListTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

final class ItemTypeListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addModelTransformer(new ItemTypeListTransformer());
    }

    public function getParent(): string
    {
        return ItemTypeChoiceType::class;
    }
}

class_alias(ItemTypeListType::class, 'Ibexa\Platform\Personalization\Form\Type\ItemTypeListType');
