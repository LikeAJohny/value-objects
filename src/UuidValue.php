<?php

declare(strict_types=1);

namespace ValueObjects;

use Webmozart\Assert\Assert;

class UuidValue extends StringValue
{
    function validate(string $value): void
    {
        Assert::uuid($value);
    }
}
