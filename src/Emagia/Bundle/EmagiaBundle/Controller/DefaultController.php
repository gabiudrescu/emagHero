<?php

namespace Emagia\Bundle\EmagiaBundle\Controller;

use Emagia\Bundle\EmagiaBundle\Entity\Character;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $orderus = $this->get('emagia.character');
        dump($orderus);

        return $this->render('EmagiaBundle:Default:index.html.twig');
    }
}
