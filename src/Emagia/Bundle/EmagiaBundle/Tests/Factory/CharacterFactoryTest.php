<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 05.07.2016
 * Time: 11:26
 */

namespace Emagia\Bundle\EmagiaBundle\Tests\Factory;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * @var OptionsResolver
     */
    protected $resolver;

    public function setup()
    {
        $this->kernel = new \AppKernel('test', true);
        $this->kernel->boot();

        $this->container = $this->kernel->getContainer();
        $this->resolver = $this->container->get('options_resolver');
    }

    public function testCharacterCreation()
    {
        $this->assertTrue(is_object($this->container->get('emagia.character.factory')));

        $this->assertEquals('Orderus', $this->container->get('emagia.character')->getName());

        $this->assertNotNull($this->container->get('emagia.character')->getHealth());

        $this->assertNotNull($this->container->get('emagia.character')->getStrength());

        $this->assertNotNull($this->container->get('emagia.character')->getDefence());

        $this->assertNotNull($this->container->get('emagia.character')->getSpeed());

        $this->assertNotNull($this->container->get('emagia.character')->getLuck());

        $this->assertNull($this->container->get('emagia.character')->getId());
    }

    public function testCharacterCreationWillFailWithoutMandatoryParams()
    {
        $this->setExpectedException('Symfony\Component\OptionsResolver\Exception\MissingOptionsException');

        $this->container->get('emagia.character.factory')->setProperties([])->configureOptions($this->resolver);
    }

    /**
     * @dataProvider propertiesDataProvider
     *
     * @param array $data
     * @param       $exception
     */
    public function testCharacterCreationWillFailWithInvalidMandatoryParams(array $data, $exception)
    {
        $this->setExpectedException($exception);

        $this->container->get('emagia.character.factory')->setProperties($data)->configureOptions($this->resolver);
    }

    public function propertiesDataProvider()
    {

        $data = array (
            'a zero options character must not exist' =>
                array (
                    ['name' => 'Orderus', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                    'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
                ),
            array (
                ['name' => '', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
            ),
            array (
                ['name' => 'Orderus', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
            ),
            array (
                ['name' => 'Orderus', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
            ),
            array (
                ['name' => 'Orderus', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
            ),
            array (
                ['name' => 'Orderus', 'health' => 0, 'strength' => 0, 'defence' => 0, 'speed' => 0, 'luck' => 0],
                'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException'
            )
        );

        return $data;

        // Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
        // Symfony\Component\OptionsResolver\Exception\MissingOptionsException
        // Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException
    }

    public function tearDown()
    {
        $this->kernel->shutdown();

        unset($this->container);
        unset($this->kernel);
    }
}