<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Contracts\Core\Persistence\Content\ObjectState;

use Ibexa\Contracts\Core\Persistence\ValueObject;

/**
 * This class represents a persistent object state group.
 */
class Group extends ValueObject
{
    /**
     * The id of the object state group.
     *
     * @var mixed
     */
    public $id;

    /**
     * The identifier for the object state group.
     *
     * @var string
     */
    public $identifier;

    /**
     * The default language code for.
     *
     * @var string
     */
    public $defaultLanguage;

    /**
     * The available language codes for names an descriptions.
     *
     * @var string[]
     */
    public $languageCodes;

    /**
     * Human readable name of the object state group.
     *
     * The structure of this field is:
     * <code>
     * array( 'eng-US' => '<name_eng>', 'ger-DE' => '<name_de>' );
     * </code>
     *
     * @var string[]
     */
    public $name;

    /**
     * Human readable description of the object state group.
     *
     * The structure of this field is:
     * <code>
     * array( 'eng-US' => '<description_eng>', 'ger-DE' => '<description_de>' );
     * </code>
     *
     * @var string[]
     */
    public $description;
}

class_alias(Group::class, 'eZ\Publish\SPI\Persistence\Content\ObjectState\Group');
