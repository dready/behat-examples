<?php

use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{

    function __construct(array $parameters)
    {
        $this->useContext('api', new Behat\CommonContexts\WebApiContext($parameters['base_url']));
    }

	/**
	 * @Given /^I wait (\d+) seconds$/
	 * @Given /^I wait (\d+) second$/
	 */
	public function iWaitSeconds($time)
	{
		sleep($time);
	}
}

