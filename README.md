# Bitly bundle

Bitly integration for Mautic.

Note: this plugin require Mautic 5.0.0 or higher and pull request for shortener services https://github.com/mautic/mautic/pull/12299

## Installation

By composer 

`composer require webmecanik/mautic-bitly-bundle`

Manually from GitHub

https://github.com/webmecanik/mautic-bitly-bundle

## Setup

1. Get access key from https://app.bitly.com/settings/api and setup/enable bitly plugin
2. Go to Configuration > System Settings > Shortener service and set bitly as default shortener service
   ![image](https://github.com/Webmecanik/mautic-bitly-bundle/assets/462477/3f5eacb5-f455-40ae-89c4-cdada62bf946)

## Usage

At the moment If you enable shortener service, automatically all links in sms are shortened by Bitly. 