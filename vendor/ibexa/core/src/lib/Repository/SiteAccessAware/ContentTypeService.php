<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Core\Repository\SiteAccessAware;

use Ibexa\Contracts\Core\Repository\ContentTypeService as ContentTypeServiceInterface;
use Ibexa\Contracts\Core\Repository\LanguageResolver;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentType;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeCreateStruct;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeDraft;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeGroup;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeGroupCreateStruct;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeGroupUpdateStruct;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentTypeUpdateStruct;
use Ibexa\Contracts\Core\Repository\Values\ContentType\FieldDefinition;
use Ibexa\Contracts\Core\Repository\Values\ContentType\FieldDefinitionCreateStruct;
use Ibexa\Contracts\Core\Repository\Values\ContentType\FieldDefinitionUpdateStruct;
use Ibexa\Contracts\Core\Repository\Values\User\User;

/**
 * SiteAccess aware implementation of ContentTypeService injecting languages where needed.
 */
class ContentTypeService implements ContentTypeServiceInterface
{
    /** @var \Ibexa\Contracts\Core\Repository\ContentTypeService */
    protected $service;

    /** @var \Ibexa\Contracts\Core\Repository\LanguageResolver */
    protected $languageResolver;

    /**
     * Construct service object from aggregated service and LanguageResolver.
     *
     * @param \Ibexa\Contracts\Core\Repository\ContentTypeService $service
     * @param \Ibexa\Contracts\Core\Repository\LanguageResolver $languageResolver
     */
    public function __construct(
        ContentTypeServiceInterface $service,
        LanguageResolver $languageResolver
    ) {
        $this->service = $service;
        $this->languageResolver = $languageResolver;
    }

    public function createContentTypeGroup(ContentTypeGroupCreateStruct $contentTypeGroupCreateStruct): ContentTypeGroup
    {
        return $this->service->createContentTypeGroup($contentTypeGroupCreateStruct);
    }

    public function loadContentTypeGroup(int $contentTypeGroupId, array $prioritizedLanguages = null): ContentTypeGroup
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeGroup($contentTypeGroupId, $prioritizedLanguages);
    }

    public function loadContentTypeGroupByIdentifier(string $contentTypeGroupIdentifier, array $prioritizedLanguages = null): ContentTypeGroup
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeGroupByIdentifier($contentTypeGroupIdentifier, $prioritizedLanguages);
    }

    public function loadContentTypeGroups(array $prioritizedLanguages = null): iterable
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeGroups($prioritizedLanguages);
    }

    public function updateContentTypeGroup(ContentTypeGroup $contentTypeGroup, ContentTypeGroupUpdateStruct $contentTypeGroupUpdateStruct): void
    {
        $this->service->updateContentTypeGroup($contentTypeGroup, $contentTypeGroupUpdateStruct);
    }

    public function deleteContentTypeGroup(ContentTypeGroup $contentTypeGroup): void
    {
        $this->service->deleteContentTypeGroup($contentTypeGroup);
    }

    public function createContentType(ContentTypeCreateStruct $contentTypeCreateStruct, array $contentTypeGroups): ContentTypeDraft
    {
        return $this->service->createContentType($contentTypeCreateStruct, $contentTypeGroups);
    }

    public function loadContentType(int $contentTypeId, array $prioritizedLanguages = null): ContentType
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentType($contentTypeId, $prioritizedLanguages);
    }

    public function loadContentTypeByIdentifier(string $identifier, array $prioritizedLanguages = null): ContentType
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeByIdentifier($identifier, $prioritizedLanguages);
    }

    public function loadContentTypeByRemoteId(string $remoteId, array $prioritizedLanguages = null): ContentType
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeByRemoteId($remoteId, $prioritizedLanguages);
    }

    public function loadContentTypeDraft(int $contentTypeId, bool $ignoreOwnership = false): ContentTypeDraft
    {
        return $this->service->loadContentTypeDraft($contentTypeId, $ignoreOwnership);
    }

    public function loadContentTypeList(array $contentTypeIds, array $prioritizedLanguages = null): iterable
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypeList($contentTypeIds, $prioritizedLanguages);
    }

    public function loadContentTypes(ContentTypeGroup $contentTypeGroup, array $prioritizedLanguages = null): iterable
    {
        $prioritizedLanguages = $this->languageResolver->getPrioritizedLanguages($prioritizedLanguages);

        return $this->service->loadContentTypes($contentTypeGroup, $prioritizedLanguages);
    }

    public function createContentTypeDraft(ContentType $contentType): ContentTypeDraft
    {
        return $this->service->createContentTypeDraft($contentType);
    }

    public function updateContentTypeDraft(ContentTypeDraft $contentTypeDraft, ContentTypeUpdateStruct $contentTypeUpdateStruct): void
    {
        $this->service->updateContentTypeDraft($contentTypeDraft, $contentTypeUpdateStruct);
    }

    public function deleteContentType(ContentType $contentType): void
    {
        $this->service->deleteContentType($contentType);
    }

    public function copyContentType(ContentType $contentType, User $creator = null): ContentType
    {
        return $this->service->copyContentType($contentType, $creator);
    }

    public function assignContentTypeGroup(ContentType $contentType, ContentTypeGroup $contentTypeGroup): void
    {
        $this->service->assignContentTypeGroup($contentType, $contentTypeGroup);
    }

    public function unassignContentTypeGroup(ContentType $contentType, ContentTypeGroup $contentTypeGroup): void
    {
        $this->service->unassignContentTypeGroup($contentType, $contentTypeGroup);
    }

    public function addFieldDefinition(ContentTypeDraft $contentTypeDraft, FieldDefinitionCreateStruct $fieldDefinitionCreateStruct): void
    {
        $this->service->addFieldDefinition($contentTypeDraft, $fieldDefinitionCreateStruct);
    }

    public function removeFieldDefinition(ContentTypeDraft $contentTypeDraft, FieldDefinition $fieldDefinition): void
    {
        $this->service->removeFieldDefinition($contentTypeDraft, $fieldDefinition);
    }

    public function updateFieldDefinition(ContentTypeDraft $contentTypeDraft, FieldDefinition $fieldDefinition, FieldDefinitionUpdateStruct $fieldDefinitionUpdateStruct): void
    {
        $this->service->updateFieldDefinition($contentTypeDraft, $fieldDefinition, $fieldDefinitionUpdateStruct);
    }

    public function publishContentTypeDraft(ContentTypeDraft $contentTypeDraft): void
    {
        $this->service->publishContentTypeDraft($contentTypeDraft);
    }

    public function newContentTypeGroupCreateStruct(string $identifier): ContentTypeGroupCreateStruct
    {
        return $this->service->newContentTypeGroupCreateStruct($identifier);
    }

    public function newContentTypeCreateStruct(string $identifier): ContentTypeCreateStruct
    {
        return $this->service->newContentTypeCreateStruct($identifier);
    }

    public function newContentTypeUpdateStruct(): ContentTypeUpdateStruct
    {
        return $this->service->newContentTypeUpdateStruct();
    }

    public function newContentTypeGroupUpdateStruct(): ContentTypeGroupUpdateStruct
    {
        return $this->service->newContentTypeGroupUpdateStruct();
    }

    public function newFieldDefinitionCreateStruct(string $identifier, string $fieldTypeIdentifier): FieldDefinitionCreateStruct
    {
        return $this->service->newFieldDefinitionCreateStruct($identifier, $fieldTypeIdentifier);
    }

    public function newFieldDefinitionUpdateStruct(): FieldDefinitionUpdateStruct
    {
        return $this->service->newFieldDefinitionUpdateStruct();
    }

    public function isContentTypeUsed(ContentType $contentType): bool
    {
        return $this->service->isContentTypeUsed($contentType);
    }

    public function removeContentTypeTranslation(ContentTypeDraft $contentTypeDraft, string $languageCode): ContentTypeDraft
    {
        return $this->service->removeContentTypeTranslation($contentTypeDraft, $languageCode);
    }

    public function deleteUserDrafts(int $userId): void
    {
        $this->service->deleteUserDrafts($userId);
    }
}

class_alias(ContentTypeService::class, 'eZ\Publish\Core\Repository\SiteAccessAware\ContentTypeService');
