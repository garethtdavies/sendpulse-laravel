<?php

namespace Wensleydale\SendPulseLaravel ;

require __DIR__. '/../vendor/autoload.php' ;

class SendPulseLaravelServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function test_register()
    {
        $app_mock = \Mockery::mock('Illuminate\Foundation\Application');
        $app_mock->shouldReceive('singleton')->once();

        $keen = (new SendPulseLaravelServiceProvider($app_mock))->register();

        $this->assertEquals(null, $keen);
    }
}