# abstract-http-client

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Abstract http client for:
- guzzle

## Install

Via Composer

``` bash
$ composer require williamespindola/abstract-http-client
```

## Usage

extend
```php
...
use WilliamEspindola\AbstractHTTPClient\AbstractRequest;
use GuzzleHttp\Psr7\Response;
...

final class MyRequest extends AbstractRequest
{
    /**
     * @var string $endPoint End point of resource
     */
    protected $endPoint = '/some/end-point/:someStringParam';
    
    public function request(string $someStringParam, int $someIntParam): Response
    {
        $this->setParameters([':someStringParam' => $someStringParam]);
    
        $this->httpClient->setOptions(['form_params' => ['someIntParam' => $someIntParam]]);
   
        return $this->httpClient->request('POST', $this->getURI());
    }
}
```

Instance
```php
use GuzzleHttp\Client;
use WilliamEspindola\AbstractHTTPClient\MyRequest;
use WilliamEspindola\AbstractHTTPClient\Client\GuzzleClient;

$instance = new MyRequest(new GuzzleClient(new Client), 'http://url');
```

Using extra query string

```php
namespace WilliamEspindola\AbstractHTTPClient

...
use WilliamEspindola\AbstractHTTPClient\Client\AbstractRequest;
use WilliamEspindola\AbstractHTTPClient\Client\QueryString\ExtraQueryString;
use GuzzleHttp\Psr7\Response;
...

final class MyRequest extends AbstractRequest
{
    use ExtraQueryString;
    
    /**
     * @var string $endPoint End point of resource
     */
    protected $endPoint = '/some/end-point/:someStringParam';
    
    public function request(string $someStringParam, int $someIntParam): Response
    {
        $this->setParameters([':someStringParam' => $someStringParam]);
    
        $this->httpClient->setOptions(['form_params' => ['someIntParam' => $someIntParam]]);
   
        return $this->httpClient
            ->request(
                'POST', 
                $this->getUriWithExtraString($this->getURI())
            );
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email oi@williamespindola.com.br instead of using the issue tracker.

## Credits

- [William Espindola][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/williamespindola/abstract-http-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/williamespindola/abstract-http-client/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/williamespindola/abstract-http-client.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/williamespindola/abstract-http-client.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/williamespindola/abstract-http-client.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/williamespindola/abstract-http-client
[link-travis]: https://travis-ci.org/williamespindola/abstract-http-client
[link-scrutinizer]: https://scrutinizer-ci.com/g/williamespindola/abstract-http-client/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/williamespindola/abstract-http-client
[link-downloads]: https://packagist.org/packages/williamespindola/abstract-http-client
[link-author]: https://github.com/williamespindola
[link-contributors]: ../../contributors
