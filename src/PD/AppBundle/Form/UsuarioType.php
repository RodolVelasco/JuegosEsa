<?php

namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\Security\Core\SecurityContext;

class UsuarioType extends AbstractType
{
	private $securityContext;

	public function __construct(SecurityContext $securityContext)
	{
	    $this->securityContext = $securityContext;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nombre')
			->add('apellidos')
			->add('dui')
			->add('username')
			->add('password', 'repeated', array(
				'type' => 'password',
				'required' => true,
				'invalid_message' => 'Las dos contraseñas deben coincidir',
				'first_options'  => array('label' => 'Contraseña'),
                'second_options' => array('label' => 'Repite contraseña'),
				//'options' => array('label' => 'Contraseña')
			))
			->add('email','email',  array('label' => 'Correo electrónico', 'attr' => array(
                'placeholder' => 'usuario@servidor'
            )))
			->add('direccion')
			->add('fecha_nacimiento', 'date', array(
					'required' => true,
        			'widget' => 'single_text',
					'attr' => array(
						'class'   => 'fecha',
						//'style' => 'width: 125px;'
					),
			)
			/*
			->add('fecha_nacimiento', 'birthday', array(
                'years' => range(date('Y') - 18, date('Y') - 18 - 120)
            )*/
            );
			
			/*
			->add('tipo_usuario', 'choice', array(
			    'choices'   => array('ADMIN' => 'Administrador', 'SUPERVISOR' => 'Supervisor', 'VENDEDOR' => 'Vendedor de tickets'),
			    //'empty_value' => 'Elija una opción',
			    'preferred_choices' => array('4'),
			    'required'  => true,
			    'multiple'  => false,
			));*/
			
			$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
		        $product = $event->getData();
		        $form = $event->getForm();

		        if ($this->securityContext->getToken()->getUser()->getTipoUsuario() === 'SUPER_ADMIN'){
		            $form->add('tipo_usuario', 'choice', array(
					    'choices'   => array('ADMIN' 					=> 'Administrador', 
					    					 'SUPERVISOR' 				=> 'Supervisor',
					    					 'VENDEDOR' 				=> 'Vendedor de tickets',
					    					 'VENDEDOR_INDEPENDIENTE' 	=> 'Vendedor independiente'),
					    //'empty_value' => 'Elija una opción',
					    'preferred_choices' => array('4'),
					    'required'  => true,
					    'multiple'  => false,
					));

					//$this->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
				    	$product = $event->getData();
	        			$form = $event->getForm();

	        			if($form->get('tipo_usuario')->getData() == 'ADMIN'){
	        				$form->add('hola','text');
	        			}
					//});
		        }
				if ($this->securityContext->getToken()->getUser()->getTipoUsuario() === 'ADMIN'){
		            $form->add('tipo_usuario', 'choice', array(
					    'choices'   => array('SUPERVISOR' 				=> 'Supervisor',
					    					 'VENDEDOR' 				=> 'Vendedor de tickets',
					    					 'VENDEDOR_INDEPENDIENTE' 	=> 'Vendedor independiente'),
					    //'empty_value' => 'Elija una opción',
					    'preferred_choices' => array('4'),
					    'required'  => true,
					    'multiple'  => false,
					));
				}
				if ($this->securityContext->getToken()->getUser()->getTipoUsuario() === 'SUPERVISOR'){
		            $form->add('tipo_usuario', 'choice', array(
					    'choices'   => array('VENDEDOR' 				=> 'Vendedor de tickets',
					    					 'VENDEDOR_INDEPENDIENTE' 	=> 'Vendedor independiente'),
					    //'empty_value' => 'Elija una opción',
					    'preferred_choices' => array('4'),
					    'required'  => true,
					    'multiple'  => false,
					));
		        }
    		});
			$builder->add('estado', 'choice', array(
				    'choices'   => array('ACTIVO' => 'Activo', 'INACTIVO' => 'Inactivo'),
				    //'empty_value' => 'Elija una opción',
				    'required'  => true,
				    'multiple'  => false,
				));
			$builder->add('registrar_usuario', 'submit', array(
				'label' => 'Registrar usuario'
			));
	}
	
	public function setDefaultsOptions(OptionsResolverInterface $resolver) 
	{
		$resolver->setDefaults(array(
			'data_class' => 'PD\AppBundle\Entity\Usuario'
		));
	}
	
	public function getName()
	{
		return 'pd_appbundle_usuariotype';
	}
}
