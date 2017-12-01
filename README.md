# abstract-http-client-guzzle

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Abstract http client with guzzle

## Install

Via Composer

``` bash
$ composer require williamespindola/abstract-http-client-guzzle
```

## Usage

extend
```php
namespace :project_name

...
use :project_name\Client\AbstractRequest;
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
use :project_name\MyRequest;
use :project_name\Client\GuzzleClient;

$instance = new MyRequest(new GuzzleClient(new Client), 'http://url');
```

Using extra query string

```php
namespace :project_name

...
use :project_name\Client\AbstractRequest;
use :project_name\Client\QueryString\ExtraQueryString;
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

[ico-version]: https://img.shields.io/packagist/v/williamespindola/abstract-http-client-guzzle.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/williamespindola/abstract-http-client-guzzle/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/williamespindola/abstract-http-client-guzzle.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/williamespindola/abstract-http-client-guzzle.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/williamespindola/abstract-http-client-guzzle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/williamespindola/abstract-http-client-guzzle
[link-travis]: https://travis-ci.org/williamespindola/abstract-http-client-guzzle
[link-scrutinizer]: https://scrutinizer-ci.com/g/williamespindola/abstract-http-client-guzzle/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/williamespindola/abstract-http-client-guzzle
[link-downloads]: https://packagist.org/packages/williamespindola/abstract-http-client-guzzle
[link-author]: https://github.com/williamespindola
[link-contributors]: ../../contributors
