<?php
namespace RestInPeaceSpec\RestInPeace;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use RestInPeace\Request\Request;
use RestInPeace\Response\JsonResponse;
use RestInPeace\Routing\Route;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RestInPeace\Application');
    }

    function it_can_get_a_json_response()
    {
        $this->visit('/url/')->shouldBeLike(JsonResponse::constructWithBody(''));
    }

    function it_can_be_configured_from_folder()
    {
        require_once __DIR__ . '/../../../../src-dev/src/bootstrap.php';

        $expectedRoute = Route::constructWithControllerAndActionName(
            '\RestInPeace\SampleApp\Controller\HelloWorldController',
            'getHelloWorldMessageAction'
        );

        $request = Request::constructWithPathAndMethod('/hello-world/', 'GET');

        $this->configureFromFolder();
        $this->getRouteForRequest($request)->shouldBeLike($expectedRoute);
    }
}
