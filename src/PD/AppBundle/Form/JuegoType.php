<?php

namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//use Symfony\Component\Form\FormEvent;
//use Symfony\Component\Form\FormEvents;

//use Symfony\Component\Security\Core\SecurityContext;

class JuegoType extends AbstractType
{
	//private $securityContext;

	/*
	public function __construct(SecurityContext $securityContext)
	{
	    $this->securityContext = $securityContext;
	}*/
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nombre')
			->add('numero_tickets','integer')
			//->add('precio_x_tickets')
			->add('precio_x_ticket','money', array(
					//'grouping' => true,
					'currency' => false,
					'label' => 'Precio por ticket',
				))
			->add('estado', 'choice', array(
				    'choices'   => array('ACTIVO' => 'Activo', 'INACTIVO' => 'Inactivo'),
				    //'empty_value' => 'Elija una opción',
				    'required'  => true,
				    'multiple'  => false,
				))
			->add('registrar_juego', 'submit', array(
				'label' => 'Registrar juego'
			));
	}
	
	public function setDefaultsOptions(OptionsResolverInterface $resolver) 
	{
		$resolver->setDefaults(array(
			'data_class' => 'PD\AppBundle\Entity\Juego'
		));
	}
	
	public function getName()
	{
		//return 'pd_appbundle_juegotype';
		return 'juegotype';
	}
}
