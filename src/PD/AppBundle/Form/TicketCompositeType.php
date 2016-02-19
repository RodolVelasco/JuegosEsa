<?php
namespace PD\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TicketCompositeType extends AbstractType
{
    private $juegoId;

    
    public function __construct($juegoId)
    {
        $this->juegoId = $juegoId;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
                $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                            $product = $event->getData();
                            $form = $event->getForm();
                            
                            $form->add('tickets', 'collection', array(
                    				'label' => ' ',
                                	'type' => new TicketType($this->juegoId),
                                	'allow_add' => true,
                                	'allow_delete' => true,
                                	'by_reference' => false,
                    	        	));
                });
                $builder->add('guardar_tickets_y_regresar', 'submit', array(
                                'label' => 'Guardar ticket(s) y regresar',
                                'attr' => array(
                                        'class' => 'btn btn-primary',
                                    )
                        ))
		        ->add('guardar_tickets', 'submit', array(
						'label' => 'Guardar ticket(s)',
						'attr' => array(
								'class' => 'btn btn-primary',
							)
				))
                ->add('no_guardar_tickets', 'submit', array(
                        'label' => 'No guardar cambios',
                        'attr' => array(
                                'class' => 'btn btn-danger',
                            )
                ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PD\AppBundle\Entity\Libreta',
        ));
    }

    public function getName()
    {
        //return 'controlPagoUnidadToCc';
        return 'libreta_to_ticket_type';
    }
}