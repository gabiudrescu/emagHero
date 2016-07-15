<?php

namespace spec\Emagia\Component\Properties;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Emagia\Component\Properties\AbstractProperty;

class HealthSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Emagia\Component\Properties\Health');
        $this->shouldHaveType(AbstractProperty::class);
    }

    function let()
    {
        $this->beConstructedWith(70, 100);
    }

    function it_will_throw_an_exception_if_it_is_instanciated_with_wrong_parameters()
    {
        $this->beConstructedWith(10, 20);
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_will_return_a_random_value_between_min_and_max()
    {
        $this->getValue()->shouldBeBetween(70, 100);
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
