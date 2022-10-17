<?php
declare(strict_types=1);

namespace Taxaos\DTO;

use Taxaos\Generator\BulkGeneratorInterface;

/**
 * Class MetadataDto
 */
final class Metadata
{
    /** @var ColumnMetadataInterface[] */
    private array $fields = [];

    /**
     * @var array<int, string>
     */
    private array $idFields = [];

    private ?BulkGeneratorInterface $generator = null;

    private array $lifeCycleCallBacks;

    public function __construct(private ?string $table = null)
    {
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    public function setTable(string $table): Metadata
    {
        $this->table = $table;

        return $this;
    }

    public function addField(string $field, ColumnMetadataInterface $column): Metadata
    {
        $this->fields[$field] = $column;

        return $this;
    }

    /**
     * @return ColumnMetadataInterface[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Is table has field?
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasField(string $name): bool
    {
        return array_key_exists($name, $this->fields);
    }

    /**
     * Get field by it's name. Risky!
     *
     * @param string $name
     *
     * @return ColumnMetadataInterface
     */
    public function getField(string $name): ColumnMetadataInterface
    {
        return $this->fields[$name];
    }

    /**
     * @return array<int, string>
     */
    public function getIdFields(): array
    {
        return $this->idFields;
    }

    /**
     * @param array<int, string> $idFields
     * @return $this
     */
    public function setIdFields(array $idFields): Metadata
    {
        $this->idFields = $idFields;

        return $this;
    }

    public function getGenerator(): ?BulkGeneratorInterface
    {
        return $this->generator;
    }

    public function setGenerator(?BulkGeneratorInterface $generator): Metadata
    {
        $this->generator = $generator;

        return $this;
    }

    public function getLifeCycleCallBacks(): array
    {
        return $this->lifeCycleCallBacks;
    }

    /**
     * @param array $lifeCycleCallBacks
     */
    public function setLifeCycleCallBacks(array $lifeCycleCallBacks): void
    {
        $this->lifeCycleCallBacks = $lifeCycleCallBacks;
    }
}