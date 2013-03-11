<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FunctionalTestCase extends WebTestCase
{
    /**
     * @var \Symfony\Component\BrowserKit\Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();

        try {
            $this->client = static::createClient();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            $this->markTestSkipped("*******************************");
        }
    }

    /**
     * Return the current client state
     *
     * @return \Symfony\Component\BrowserKit\Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * Request a $url
     *
     * @param string $url
     *
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    protected function request($url)
    {
        return $this->getClient()->request("GET", $url);
    }

    /**
     * Returns the container
     *
     * @return \Symfony\Component\DependencyInjection\Container
     */
    protected function getContainer()
    {
        return $this->getClient()->getContainer();
    }

    /**
     * Returns the crawler
     *
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    protected function getCrawler()
    {
        return $this->getClient()->getCrawler();
    }

    /**
     * Returns a service
     *
     * @param string $id The service id
     *
     * @return object
     */
    protected function getService($id)
    {
        return $this->getContainer()->get($id);
    }

    /**
     * Returns the url
     *
     * @return string
     */
    protected function generateUrl($name, array $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->getService("router")->generate($name, $parameters, $referenceType);
    }

    /**
     * Debug page
     */
    protected function debugPage()
    {
        $crawler = $this->getCrawler();

        $body = $crawler->filter("body");
        if (1 === count($body)) {
            var_dump($body->text());

            $title = $crawler->filter("title");
            if (1 === count($title)) {
                var_dump($title->text());
            } else {
                var_dump($crawler);
            }
        }
    }
}
