<?php

declare(strict_types=1);

namespace Source\Infra\Repositories\Memory;

use Source\Domain\Entities\Fields\Interfaces\FieldInterface;
use Source\Domain\Entities\Fields\Title;
use Source\Domain\Entities\Fields\Url;
use Source\Domain\Interfaces\Repositories\FieldRepositoryInterface;
use Source\Domain\ValueObjects\Error;
use Source\Domain\ValueObjects\Title as TitleVo;
use Source\Domain\ValueObjects\Url as UrlVo;
use Source\Domain\ValueObjects\Uuid;

final readonly class FieldRepository implements FieldRepositoryInterface
{
    /** @var array<string, array<FieldInterface>> */
    private array $fields;

    public function __construct()
    {
        $componentId = Uuid::parse('0197d891-0b0a-70a7-b2b2-a32ff67a5149');
        $subComponentId = Uuid::parse('0197d892-696b-7011-83bd-b7d31ea769db');

        $this->fields = [
            (string) $componentId => [
                new Title(
                    Uuid::parse('0197d891-a90b-7123-9146-90138a6dc228'),
                    $componentId,
                    TitleVo::parse('Apenas um título')
                ),
                new Url(
                    Uuid::parse('0197d891-d097-7038-9c46-a862a9cf4e6c'),
                    $componentId,
                    UrlVo::parse('https://ysocode.com')
                ),
            ],
            (string) $subComponentId => [
                new Url(
                    Uuid::parse('0197d893-f987-7122-9988-048500229fda'),
                    $componentId,
                    UrlVo::parse('https://t4.ftcdn.net/jpg/10/93/45/23/360_F_1093452370_iSpkxn4xqCPjxnMJyRuguYhpqaQ8P0Yk.jpg')
                ),
            ],
        ];
    }

    public function getById(Uuid $id): FieldInterface|Error
    {
        foreach ($this->fields as $fields) {
            foreach ($fields as $field) {
                if ($field->id->equals($id)) {
                    return $field;
                }
            }
        }

        return Error::parse('Field not found for the given ID.');
    }

    /**
     * {@inheritDoc}
     */
    public function getAllByOwnerId(Uuid $id): array|Error
    {
        foreach ($this->fields as $ownerId => $fields) {
            if (Uuid::parse($ownerId)->equals($id)) {
                return $fields;
            }
        }

        return Error::parse('No fields found.');
    }
}
