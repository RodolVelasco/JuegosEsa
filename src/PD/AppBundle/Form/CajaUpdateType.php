<?php

namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PD\AppBundle\Entity\Usuario;
use PD\AppBundle\Entity\UsuarioRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

//use Symfony\Component\Security\Core\SecurityContext;

class CajaUpdateType extends AbstractType
{
	private $modificar_asigna_usuario;
	private $esta_deshabilitado;
	private $modificar_numero_carton;

	
	public function __construct($modificar_asigna_usuario, $modificar_numero_carton, $esta_deshabilitado)
	{
	    $this->modificar_asigna_usuario = $modificar_asigna_usuario;
	    $this->esta_deshabilitado = $esta_deshabilitado;
	    $this->modificar_numero_carton = $modificar_numero_carton;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			//->add('numero_carton') se deshabilita en Form events más abajo
			->add('contiene_libreta_limite_inferior','text',array('read_only'=>true))
			->add('contiene_libreta_limite_superior','text',array('read_only'=>true))
			->add('omite_libreta','text',array('read_only'=>true))
			->add('total_libretas','integer',array('read_only'=>true))
			->add('libretas_asignadas','integer',array('read_only'=>true));
			//->add('juego') //se deshabilita en twig
			//->add('usuario') // se deshabilita en Form events más abajo
			/*$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
		        $product = $event->getData();
		        $form = $event->getForm();

		        if($this->modificar_asigna_usuario == 1){
					
				}
			});*/
			$builder->add('fecha_creacion', 'date', array(
					'label' => 'Fecha creación',
					'read_only'=>true,
					'required' => false,
        			'widget' => 'single_text',
					'attr' => array(
						'class'   => 'fecha',
						//'style' => 'width: 125px;'
					),
				))
			->add('estado','text', array(
					'read_only' => true,
					'attr' => array(
						'size' => 30
					),
				))
			->add('regresar', 'submit');
			$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
		        $product = $event->getData();
		        $form = $event->getForm();

		        if($this->esta_deshabilitado == 1){
		        	$form->add('numero_carton','text', array('read_only' => true));
		        	$form->add('guardar', 'submit', array('disabled' => true));
		        }else{
		        	if($this->modificar_numero_carton == 0){
		        		$form->add('numero_carton','text', array('read_only' => true));
		        		$form->add('guardar', 'submit', array('disabled' => true));
		        	}else{
		        		$form->add('numero_carton');
		        		$form->add('guardar', 'submit');
		        	}
		        }

		        if($this->modificar_asigna_usuario == 1){
		        	$form->add('usuario', 'entity', array(
						'label' => 'Se asigna a',
					    'class' => 'PDBundle:Usuario',
					    'query_builder' => function(EntityRepository $er) {
					      return $er->createQueryBuilder('u')
									->where('u.tipoUsuario IN (:tipoUsuario)')                
				            		->setParameter('tipoUsuario', array('ADMIN','SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY)
					                ->orderBy('u.nombre', 'ASC');
					    },
					));

					$form->add('deshabilitar_caja', 'submit', array(
						'label' => 'Deshabilitar caja',
					));
				}else{
					$form->add('deshabilitar_caja', 'submit', array(
						'label' => 'Deshabilitar caja',
						'disabled' => true,
					));
				}
			});
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
		return 'caja_update_type';
	}
}
