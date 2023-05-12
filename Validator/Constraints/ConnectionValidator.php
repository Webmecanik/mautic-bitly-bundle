<?php

declare(strict_types=1);

namespace MauticPlugin\MauticBitlyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Contracts\Translation\TranslatorInterface;

class ConnectionValidator extends ConstraintValidator
{
    private \MauticPlugin\MauticBitlyBundle\Client\Connection $connection;

    private TranslatorInterface $translator;

    public function __construct(\MauticPlugin\MauticBitlyBundle\Client\Connection $connection, TranslatorInterface $translator)
    {
        $this->connection = $connection;
        $this->translator = $translator;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$this->connection->isValidAccessToken($value)) {
            $this->context->buildViolation($this->translator->trans($constraint->message))
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
