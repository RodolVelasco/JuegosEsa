<?php

namespace PD\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
	public function mainAction()
	{
		return $this->render('PDBundle:Default:main.html.twig');
	}
	
	public function mainMenuAction()
	{
		return $this->render('PDBundle:Default:mainMenu.html.twig');
	}
	
	public function loginSymfonyAction()
	{
		$peticion = $this->getRequest();
		$sesion = $peticion->getSession();
		
		//exit(\Doctrine\Common\Util\Debug::dump($peticion));
		
		$error = $peticion->attributes->get(
			SecurityContext::AUTHENTICATION_ERROR,
			$sesion->get(SecurityContext::AUTHENTICATION_ERROR)
		);
		
		return $this->render('PDBundle:Default:loginSymfony.html.twig', array(
			'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
			'error'         => $error
		));
	}
	
	public function logout()
	{
		return $this->redirect($this->generateUrl('login'));
	}
	
		
    public function indexAction($name)
    {
        return $this->render('PDBundle:Default:index.html.twig', array('name' => $name));
    }
	
}
