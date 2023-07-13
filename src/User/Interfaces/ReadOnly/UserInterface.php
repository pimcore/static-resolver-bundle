<?php

declare(strict_types=1);

namespace Pimcore\Bundle\StaticResolverBundle\User\Interfaces\ReadOnly;

interface UserInterface
{
    public function getPassword(): ?string;

    /**
     * Alias for getName()
     *
     */
    public function getUsername(): ?string;

    public function getFirstname(): ?string;

    public function getLastname(): ?string;

    public function getFullName(): string;

    public function getEmail(): ?string;

    public function getLanguage(): string;

    /**
     * @see getAdmin()
     *
     */
    public function isAdmin(): bool;

    public function getAdmin(): bool;

    public function getActive(): bool;

    public function isActive(): bool;

    public function isAllowed(string $key, string $type = 'permission'): bool;

    /**
     * @return int[]
     */
    public function getRoles(): array;

    public function getWelcomescreen(): bool;

    public function getCloseWarning(): bool;

    public function getMemorizeTabs(): bool;

    public function getAllowDirtyClose(): bool;

    /**
     *
     * @return resource
     */
    public function getImage(?int $width = null, ?int $height = null);

    /**
     * @return string[]
     */
    public function getContentLanguages(): array;

    public function getActivePerspective(): string;

    /**
     * Returns the first perspective name
     *
     * @internal
     */
    public function getFirstAllowedPerspective(): string;

    /**
     * Returns array of languages allowed for editing. If edit and view languages are empty all languages are allowed.
     * If only edit languages are empty (but view languages not) empty array is returned.
     *
     * @return string[]|null
     * @internal
     *
     */
    public function getAllowedLanguagesForEditingWebsiteTranslations(): ?array;

    /**
     * Returns array of languages allowed for viewing. If view languages are empty all languages are allowed.
     *
     * @return string[]|null
     * @internal
     *
     */
    public function getAllowedLanguagesForViewingWebsiteTranslations(): ?array;

    public function getLastLogin(): int;

    public function getKeyBindings(): ?string;

    public function getTwoFactorAuthentication(string $key = null): mixed;

    public function getProvider(): ?string;

    public function hasImage(): bool;
}
