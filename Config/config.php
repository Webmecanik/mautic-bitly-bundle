<?php

return [
    'name'        => 'MauticBitlyBundle',
    'description' => 'Bitly bundle for Mautic.',
    'version'     => '1.0',
    'author'      => 'Webmecanik',
    'services'    => [
        'others' => [
            'mautic.shortener.bitly' => [
                'class'     => \MauticPlugin\MauticBitlyBundle\Shortener\BitlyService::class,
                'arguments' => [
                    'mautic.bitly.connection',
                    'monolog.logger.mautic',
                ],
                'tags'      => [
                    'mautic.shortener.service',
                ],
            ],
            'mautic.bitly.config'            => [
                'class'     => \MauticPlugin\MauticBitlyBundle\Integration\Config::class,
                'arguments' => [
                    'mautic.integrations.helper',
                ],
            ],
            'mautic.bitly.connection'            => [
                'class'     => \MauticPlugin\MauticBitlyBundle\Client\Connection::class,
                'arguments' => [
                    'mautic.bitly.config',
                ],
            ],
        ],
        'integrations' => [
            // Basic definitions with name, display name and icon
            'mautic.integration.bitlybundle' => [
                'class' => \MauticPlugin\MauticBitlyBundle\Integration\BitlyBundleIntegration::class,
                'tags'  => [
                    'mautic.integration',
                    'mautic.basic_integration',
                ],
            ],
            // Provides the form types to use for the configuration UI
            'bitlybundle.integration.configuration' => [
                'class'     => \MauticPlugin\MauticBitlyBundle\Integration\Support\ConfigSupport::class,
                'tags'      => [
                    'mautic.config_integration',
                ],
            ],
        ],
        'validators' => [
            'bitlybundle.validator.connection_validator' => [
                'class'     => \MauticPlugin\MauticBitlyBundle\Validator\Constraints\ConnectionValidator::class,
                'arguments' => [
                    'mautic.bitly.connection',
                    'translator',
                ],
                'tags' => [
                    'name' => 'validator.constraint_validator',
                ],
            ],
        ],
    ],
];
