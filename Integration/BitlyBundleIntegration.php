<?php

declare(strict_types=1);

namespace MauticPlugin\MauticBitlyBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;

class BitlyBundleIntegration extends BasicIntegration implements BasicInterface
{
    use ConfigurationTrait;

    public const NAME         = 'bitlybundle';
    public const DISPLAY_NAME = 'Bitly';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDisplayName(): string
    {
        return self::DISPLAY_NAME;
    }

    public function getIcon(): string
    {
        return 'plugins/MauticBitlyBundle/Assets/img/bitly.png';
    }
}
