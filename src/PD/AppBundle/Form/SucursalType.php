<?php

namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PD\AppBundle\Entity\Sucursal;
use Doctrine\ORM\EntityRepository;

class SucursalType extends AbstractType
{	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nombre')
			->add('estado', 'choice', array(
					    'choices'   => array('ACTIVO'	=> 'Activo', 
					    					 'INACTIVO'	=> 'Inactivo'),
					    'required'  => true,
					    'multiple'  => false,
					))
			->add('fecha_ingreso_sistema', 'date', array(
					'label' => 'Fecha creación',
					'read_only'=>true,
					'required' => false,
        			'widget' => 'single_text',
					'attr' => array(
						'class'   => 'fecha',
						//'style' => 'width: 125px;'
					),
				))
			->add('registrar_sucursal', 'submit', array(
				'label' => 'Registrar sucursal'
			));
	}
	
	public function setDefaultsOptions(OptionsResolverInterface $resolver) 
	{
		$resolver->setDefaults(array(
			'data_class' => 'PD\AppBundle\Entity\Sucursal'
		));
	}
	
	public function getName()
	{
		return 'sucursal_type';
	}
}
