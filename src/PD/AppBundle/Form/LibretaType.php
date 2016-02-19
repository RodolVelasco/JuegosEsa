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

class LibretaType extends AbstractType
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
			//->add('caja')
			->add('correlativo')
			->add('vendedor', 'entity', array(
				'empty_value'	=> '',
				'required'		=> false,
			    'class' 		=> 'PDBundle:Usuario',
			    'query_builder' => function(EntityRepository $er) {
			      return $er->createQueryBuilder('u')
			      			->Where('u.estado = :estado')
							->andWhere('u.tipoUsuario IN (:tipoUsuario)')
		            		->setParameter('estado', 'ACTIVO')
		            		->setParameter('tipoUsuario', array('VENDEDOR', 'VENDEDOR_INDEPENDIENTE'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY)
			                ->orderBy('u.nombre', 'ASC');
			      },))
			->add('precio_al_vendedor')
			->add('precio_acumulado', 'text', array(
				'read_only' => true,
				'disabled'  => true,
				))
			->add('premio_acumulado', 'text', array(
				'read_only' => true,
				'disabled'  => true,
				))
			->add('raspable_gratis_acumulado', 'text', array(
				'read_only' => true,
				'disabled'  => true,
				))
			->add('is_vendedor_changed', 'hidden', array('mapped'=>false, 'label'=>false))
			->add('guardar_libreta', 'submit', array(
				'label' => 'Guardar libreta'
			))
			->add('guardar_libreta_y_continuar', 'submit', array(
				'label' => 'Guardar libreta y continuar'
			))
			->add('no_guardar_ir_menu_principal', 'submit', array(
				'label' => 'No guardar e ir a menú principal'
			));
	}
	
	public function setDefaultsOptions(OptionsResolverInterface $resolver) 
	{
		$resolver->setDefaults(array(
			'data_class' => 'PD\AppBundle\Entity\Libreta'
		));
	}
	
	public function getName()
	{
		return 'libreta_type';
	}
}
