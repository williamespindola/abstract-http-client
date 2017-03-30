# abstract-http-client-guzzle
Abstract http client with guzzle

## Example

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
