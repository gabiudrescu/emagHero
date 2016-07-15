<?php

namespace spec\Emagia\Component;

use Emagia\Component\Character;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Emagia\Component\CharacterFactory');
    }

    function let(OptionsResolver $resolver)
    {
        $this->beConstructedWith($resolver);
    }

    function it_should_build_a_list_of_all_character_properties(OptionsResolver $resolver)
    {
        $minMax = ['min' => 70, 'max' => 100];
        $properties = ['health' => $minMax];

        $resolver->setRequired(['min', 'max'])->shouldBeCalled();
        $resolver->setAllowedTypes('min', 'int')->shouldBeCalled();
        $resolver->setAllowedTypes('max', 'int')->shouldBeCalled();

        $resolver->resolve($properties['health'])->willReturn($minMax);

        $this->build('Orderus', $properties)->shouldHaveType(Character::class);
    }
}
