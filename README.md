# dvelop-web-extensions
Helpful tools for working with the new d.velop utils like d.3one, d.ecs http gateway and d.velop cloud. This tool is still under development!

Right now it provides class libraries for
 - Extensions on document and document lists
 - Validation of d.velop d.ecs identity provider auth
 - Manage registration of apps at d.velop d.ecs http gateway
 
## Installation

### Via Composer (Preferred)
Get the latest release version via 

```composer require edoc/dvelop-web-extensions``` 

For the most current master commit require

```composer require edoc/dvelop-web-extensions "dev-master"``` 

### Via Download
Download current package and require the autoload.php.

```require_once "dvelop-web-extensions/autoload.php;"``` 

## Usage
You can find usage examples in the examples directory.

- [Description of ``SimpleIdpClient`` ](documentation/SimpleIdpClient.md)

## Development
You are encouraged to contribute to this repository. Please create your own branch and create your pull requests. 

To actively develop yourself install the dependencies after cloning the repo through ```composer install```
