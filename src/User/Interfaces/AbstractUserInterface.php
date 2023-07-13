<?php
declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\User\Interfaces;

use Pimcore\Model\ModelInterface;

/**
 * @method void setLastLoginDate()
 */
interface AbstractUserInterface extends ModelInterface
{
    public function getId(): ?int;

    /**
     * @return $this
     */
    public function setId(int $id): static;

    public function getParentId(): ?int;

    /**
     * @return $this
     */
    public function setParentId(int $parentId): static;

    public function getName(): ?string;

    /**
     * @return $this
     */
    public function setName(string $name): static;

    public function getType(): string;

    /**
     * @return $this
     *
     * @throws \Exception
     */
    public function save(): static;

    /**
     * @throws \Exception
     */
    public function delete(): void;

    /**
     * @return $this
     */
    public function setType(string $type): static;
}
