<?php

declare(strict_types=1);

namespace MauticPlugin\MauticBitlyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class Connection extends Constraint
{
    public string $message = 'mautic.bilty.connection.invalid';
}
