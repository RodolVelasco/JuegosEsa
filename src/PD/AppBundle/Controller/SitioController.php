<?php

namespace PD\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    public function estaticaAction($pagina)
    {
        return $this->render('PDBundle:Sitio:'.$pagina.'.html.twig');
    }
}
