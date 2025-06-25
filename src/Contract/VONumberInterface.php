<?php

namespace PHPAlchemist\ValueObject\Contract;

/**
 * @template T
 */
interface VONumberInterface
{
    public function getValue() : int|float;

    public function equals(self $number) : bool;
}
