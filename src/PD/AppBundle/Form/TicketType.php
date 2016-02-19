<?php
namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TicketType extends AbstractType
{
	private $juegoId;

	
	public function __construct($juegoId)
	{
	    $this->juegoId = $juegoId;
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
				//->add('libreta')
				->add('numeroTicket')
				//->add('numeroAleatorio')
				->add('fechaRecibido', 'date', array(
					'required' => true,
        			'widget' => 'single_text',
					'attr' => array(
						'class'   => 'fecha',
						//'style' => 'width: 125px;'
					),
				))
				->add('estado', 'choice', array(
				    'choices'   => array('EN_RUTA' => 'En ruta', 'EN_SALA_VENTAS' => 'En sala de ventas', 'VENDIDO' => 'Vendido', 'PREMIADO' => 'Premiado'),
				    //'empty_value' => 'Elija una opción',
				    'required'  => true,
				    'multiple'  => false,
				    'attr' => array(
								'class' => 'cambio_estado',
						      	//'style'   => 'width: 100px;',
						      	//'maxlength' => '12',
							  ),
				));
				$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
		        	$product = $event->getData();
		        	$form = $event->getForm();

		        	if($this->juegoId == 1){
						//$form->add('premio');
						$form->add('premio', 'choice', array(
						    'choices'   => array('RASPABLE_GRATIS' => 'Raspable gratis', '1' => '$1', '3' => '$3', '5' => '$5', '100' => '$100', '2500' => '$2500'),
						    'empty_value' => '-- Sin premio --',
						    'required'  => false,
						    'multiple'  => false,
						    'attr' => array(
								'class' => 'cambio_premio',
						      	//'style'   => 'width: 100px;',
						      	//'maxlength' => '12',
							  ),
						));
					}else if($this->juegoId == 2){
						$form->add('premio', 'choice', array(
						    'choices'   => array('RASPABLE_GRATIS' => 'Raspable gratis', '2' => '$2', '5' => '$5', '10' => '$10', '20' => '$20', '100' => '$100', '7000' => '$7000'),
						    'empty_value' => '-- Sin premio --',
						    'required'  => false,
						    'multiple'  => false,
						    'attr' => array(
								'class' => 'cambio_premio',
						      	//'style'   => 'width: 100px;',
						      	//'maxlength' => '12',
							  ),
						));
					}
				});
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
            'data_class' => 'PD\AppBundle\Entity\Ticket',
        ));
	}
	
	public function getName()
	{
		//return 'pd_appbundle_juegotype';
		return 'ticket_type';
	}
}