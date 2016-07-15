<?php

namespace Emagia\Bundle\EmagiaBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Emagia\Component\Character;
use Emagia\Component\Properties\Health;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        $character = new Character('Orderus');
//        $character->setProperties(new ArrayCollection([
//            'health' => new Health(70, 100)
//        ]));

        $character = $this->get('emagia.orderus');

        return $this->render('EmagiaBundle:Default:index.html.twig', ['character' => $character]);
    }
}
