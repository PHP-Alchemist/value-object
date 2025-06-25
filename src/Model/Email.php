<?php

namespace PHPAlchemist\ValueObject\Model;

use InvalidArgumentException;
use PHPAlchemist\ValueObject\Abstract\AbstractVOString;

/**
 * @final
 *
 * @template-extends AbstractVOString
 *
 * @psalm-suppress InvalidExtendClass
 */
final class Email extends AbstractVOString
{
    private const string INVALID_EMAIL_MESSAGE = 'Invalid email address: %s';

    public function __construct(string $value)
    {
        $this->validateEmail($value);
        $this->value = $value;
    }

    private function validateEmail(string $email) : void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(self::INVALID_EMAIL_MESSAGE, $email)
            );
        }
    }

    public function getUser() : string
    {
        $parts = explode('@', $this->value, 2);

        return array_shift($parts);
    }

    public function getDomain() : string
    {
        $parts = explode('@', $this->value, 2);

        return array_pop($parts);
    }

    public function getTLD() : string
    {
        $parts = explode('.', $this->value);

        return array_pop($parts);
    }
}
