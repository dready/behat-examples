<?php

use Behat\Behat\Event\StepEvent;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{

    function __construct(array $parameters)
    {
	    $apiContext = new Behat\CommonContexts\WebApiContext($parameters['base_url']);
	    $client = $apiContext->getBrowser()->getClient();
	    if ($client instanceof \Buzz\Client\FileGetContents) {
		    $client->setVerifyPeer(false);
	    }
	    $this->useContext('api', $apiContext);
    }

	/**
	 * @Given /^I wait (\d+) seconds$/
	 * @Given /^I wait (\d+) second$/
	 */
	public function iWaitSeconds($time)
	{
		sleep($time);
	}

	/**
	 * Take screenshot when step fails.
	 * Works only with Selenium2Driver.
	 *
	 * @param StepEvent $event
	 *
	 * @throws Exception
	 * @AfterStep
	 */
	public function takeScreenshotAfterFailedStep($event)
	{
		if (StepEvent::FAILED !== $event->getResult()) {
			return;
		}

		/** @var MinkContext $mainContext */
		$mainContext = $this->getMainContext();
		$api = $mainContext->getSubcontext('api');
		if (!$api instanceof Behat\CommonContexts\WebApiContext) {
			return;
		}

		$response = "" . $api->getBrowser()->getLastResponse();
		echo $response;
		return;
	}
}

