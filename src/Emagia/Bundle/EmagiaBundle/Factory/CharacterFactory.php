<?php

namespace Emagia\Bundle\EmagiaBundle\Factory;

use Emagia\Bundle\EmagiaBundle\Entity\Character;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * CharacterFactory
 *
 */
class CharacterFactory
{
    /**
     * @var array
     */
    protected $options;

    public function configureOptions(OptionsResolver $resolver, $options)
    {
        $mandatory = ['name', 'health', 'strength', 'defence', 'speed', 'luck'];

        $resolver->setRequired($mandatory);

        $notEmptyValidator = function($value){
            if(empty($value)){
                return false;
            }
            return true;
        };

        foreach ($mandatory as $criterion) {
            $resolver->setAllowedValues($criterion, $notEmptyValidator);
        }

        $this->options = $resolver->resolve($options);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function build()
    {
        $options = $this->getOptions();

        $character = new Character();

        $accessor = PropertyAccess::createPropertyAccessor();
        foreach($options as $property => $option)
        {
            $accessor->setValue($character, $property, $option);
        }

        return $character;
    }
}
