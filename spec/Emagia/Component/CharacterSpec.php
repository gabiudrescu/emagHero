<?php

namespace spec\Emagia\Component;

use Doctrine\Common\Collections\ArrayCollection;
use Emagia\Component\Properties\Health;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CharacterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Emagia\Component\Character');
    }

    function let(ArrayCollection $properties, Health $health)
    {
        $properties->get('Health')->willReturn($health);
        $health->getValue()->willReturn(80);

        $this->beConstructedWith($name = 'Orderus');
        $this->setProperties($properties);
    }

    function it_should_be_called_by_name()
    {
        $this->getName()->shouldReturn('Orderus');
    }

    function it_should_return_it_health_level()
    {
        $this->getHealth()->shouldBeBetween(70, 100);
    }

    public function getMatchers()
    {
        return [
            'beBetween' => function($current, $min, $max) {
                if ($current >= $min && $current <= $max)
                {
                    return true;
                }
                return false;
            }
        ];
    }
}
