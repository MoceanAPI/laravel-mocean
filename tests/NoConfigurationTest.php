<?php
/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 12/31/2018
 * Time: 11:29 AM.
 */

namespace Mocean\Laravel\Tests;

class NoConfigurationTest extends AbstractTesting
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('mocean.accounts.main.MOCEAN_API_KEY', '');
    }

    public function testExceptionRaisedIfSettingNotConfigured()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('MOCEAN_API_KEY is not configured');
        app('mocean')->getMocean();
    }
}
