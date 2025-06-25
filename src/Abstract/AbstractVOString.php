<?php

namespace PHPAlchemist\ValueObject\Abstract;

use PHPAlchemist\ValueObject\Contract\VONumberInterface;
use PHPAlchemist\ValueObject\Contract\VOStringInterface;
use PHPAlchemist\ValueObject\Model\VONumber;

/**
 * @template-implements VOStringInterface<string>
 */
abstract class AbstractVOString implements VOStringInterface
{
    protected readonly string $value;

    public function __toString() : string
    {
        return ($this->getValue()) ?: '';
    }

    #[\Override]
    public function getValue() : ?string
    {
        return $this->value;
    }

    #[\Override]
    public function contains(mixed $needle, bool $caseInsensitive = false) : bool
    {
        if ($caseInsensitive) {
            return str_contains(mb_strtolower($this->value), mb_strtolower($needle));
        }

        return str_contains($this->value, $needle);
    }

    /** @inheritDoc */
    #[\Override]
    public function endsWith(mixed $needle) : bool
    {
        return str_ends_with($this->value, $needle);
    }

    /** @inheritDoc */
    #[\Override]
    public function equals(VOStringInterface $comparitive) : bool
    {
        return $comparitive->getValue() === $this->getValue();
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function hasValue() : bool
    {
        return !is_null($this->value);
    }

    /** @inheritDoc */
    #[\Override]
    public function indexOf(string $needle, int $startIndex = 0) : int|false
    {
        return strpos($this->value, $needle, $startIndex);
    }

    #[\Override]
    public function lastIndexOf(string $needle, int $startIndex = 0) : int|false
    {
        return strrpos($this->value, $needle, $startIndex);
    }

    /**
     * @inheritDoc
     */
    #[\Override]
    public function length() : VONumberInterface|int
    {
        $length = strlen($this->value);

        return new VONumber($length);
    }

    /**
     * Convert string to lower case.
     *
     * @return string
     */
    public function lower() : ?string
    {
        return ($this->hasValue()) ? mb_strtolower($this->getValue()) : null;
    }

    /** @inheritDoc */
    #[\Override]
    public function startsWith(mixed $needle) : bool
    {
        return str_starts_with($this->value, $needle);
    }

    /** @inheritDoc */
    #[\Override]
    public function substring(int $offset, ?int $length = null) : string|\Stringable
    {
        return substr($this->value, $offset, $length);
    }
}
