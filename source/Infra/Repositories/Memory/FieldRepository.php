<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\ComponentDefinition;
use Source\Domain\Entities\Field;
use Source\Domain\Interfaces\Repositories\FieldRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Key;
use Source\Domain\ValueObjects\Title;
use Source\Domain\ValueObjects\Url;
use Source\Domain\ValueObjects\Uuid;

final readonly class FieldRepository implements FieldRepositoryInterface
{
    /** @var array<string, array<Field>> */
    private array $fields;

    public function __construct()
    {
        /** @var ComponentDefinition $bannerDefinition */
        $bannerDefinition = require basePath('source/Domain/Definitions/Components/Banner.php');

        $imageDefinition = $bannerDefinition->getSubComponentDefinition(new Key('image'));

        $bannerId = new Uuid('0197efa3-b183-7034-b9b3-c73eba6726fd');
        $imageId = new Uuid('0197efa3-d728-722b-b9d4-114841d1550a');

        $this->fields = [
            (string) $bannerId => [
                new Field(
                    new Uuid('0197efaf-3071-72c8-b167-6764fa88c395'),
                    $bannerId,
                    $bannerDefinition->getFieldDefinition(new Key('title')),
                    new Title('Apenas um título')
                ),
                new Field(
                    new Uuid('0197efaf-4d97-726c-b668-e28067afe9ba'),
                    $bannerId,
                    $bannerDefinition->getFieldDefinition(new Key('link')),
                    new Url('https://ysocode.com')
                ),
            ],
            (string) $imageId => [
                new Field(
                    new Uuid('0197efaf-616a-7163-ad09-afa76ab68de0'),
                    $imageId,
                    $imageDefinition->getFieldDefinition(new Key('url')),
                    new Url('https://images.unsplash.com/photo-1615963244664-5b845b2025ee?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dGlnZXJ8ZW58MHx8MHx8fDA%3D')
                ),
                new Field(
                    new Uuid('0197fd06-0c39-73ed-aa33-8bebc227cbf6'),
                    $imageId,
                    $imageDefinition->getFieldDefinition(new Key('alt')),
                    new Title('Apenas uma imagem')
                ),
            ],
        ];
    }

    public function getById(Uuid $id): Field|Error
    {
        foreach ($this->fields as $fields) {
            foreach ($fields as $field) {
                if ($field->id->equals($id)) {
                    return $field;
                }
            }
        }

        return new Error('Field not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByComponentId(Uuid $id): array|Error
    {
        foreach ($this->fields as $componentId => $fields) {
            if (new Uuid($componentId)->equals($id)) {
                return $fields;
            }
        }

        return new Error('No fields found.');
    }
}
