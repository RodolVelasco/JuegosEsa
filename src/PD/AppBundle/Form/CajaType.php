<?php

namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PD\AppBundle\Entity\Usuario;
use PD\AppBundle\Entity\UsuarioRepository;
use Doctrine\ORM\EntityRepository;
//use Symfony\Component\Form\FormEvent;
//use Symfony\Component\Form\FormEvents;

//use Symfony\Component\Security\Core\SecurityContext;

class CajaType extends AbstractType
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
			->add('numero_carton')
			->add('contiene_libreta_limite_inferior')
			->add('contiene_libreta_limite_superior')
			->add('omite_libreta')
			//->add('total_libretas','integer')
			->add('juego')
			->add('sucursal')
			->add('usuario', 'entity', array(
				'label' => 'Se asigna a',
			    'class' => 'PDBundle:Usuario',
			    //'class' => 'PD\AppBundle\Entity\Usuario',
			    'query_builder' => function(EntityRepository $er) {
			      return $er->createQueryBuilder('u')
							->where('u.tipoUsuario IN (:tipoUsuario)')                
		            		->setParameter('tipoUsuario', array('ADMIN','SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY)
			                //->groupBy('u.id')
			                ->orderBy('u.nombre', 'ASC');
			      },))
			/*->add('precio_x_tickets')
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
				))*/
			->add('registrar_caja', 'submit', array(
				'label' => 'Registrar caja'
			));
	}
	
	public function setDefaultsOptions(OptionsResolverInterface $resolver) 
	{
		$resolver->setDefaults(array(
			'data_class' => 'PD\AppBundle\Entity\Caja'
		));
	}
	
	public function getName()
	{
		//return 'pd_appbundle_juegotype';
		return 'caja_type';
	}
}
