<?php

namespace PD\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use PD\AppBundle\Entity\Juego;
use PD\AppBundle\Form\JuegoType;
use PD\AppBundle\Entity\Sucursal;
use PD\AppBundle\Form\SucursalType;
use PD\AppBundle\Entity\Usuario;
use PD\AppBundle\Form\UsuarioType;
use PD\AppBundle\Entity\Caja;
use PD\AppBundle\Form\CajaType;
use PD\AppBundle\Form\CajaUpdateType;
use PD\AppBundle\Entity\Libreta;
use PD\AppBundle\Form\LibretaType;
use PD\AppBundle\Form\TicketCompositeType;
use PD\AppBundle\Form\TicketType;
use PD\AppBundle\Entity\Ticket;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Source\Entity;


class SuperAdminController extends Controller
{
	public function mainJuegoAction(Request $peticion)
	{
		$source = new Entity('PDBundle:Juego');
		$grid = $this->get('grid');
		$grid->setSource($source);

		$grid->hideColumns('id');
		$grid->hideColumns('fecha_ingreso_sistema');

		$rowAction = new RowAction('Ver juego', 'super_admin_update_juego');
		$rowAction->setRouteParameters(array('id'));
		$rowAction->setRouteParametersMapping(array('id' => 'juegoId'));
		$grid->addRowAction($rowAction);

		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$grid->isReadyForRedirect();
		

		return $grid->getGridResponse('PDBundle:SuperAdmin:superAdminJuegoMain.html.twig', array(
           	'grid' => $grid,
        ));
	}
	
	public function addJuegoAction(Request $peticion)
	{
		//setlocale(LC_MONETARY, 'en_US');
			
		$em = $this->getDoctrine()->getManager();
		
		$juego = new Juego();
		$formulario = $this->createForm(new JuegoType(), $juego);
		
		
		
		$formulario->handleRequest($peticion);
		if($formulario->isValid()){
			$em->persist($juego);
            $em->flush();
		}
		
		return $this->render(
					'PDBundle:SuperAdmin:superAdminJuegoAdd.html.twig',
					array('formulario' => $formulario->createView())
			   );
	}

	public function updateJuegoAction(Request $peticion, $juegoId)
	{
		$em = $this->getDoctrine()->getManager();

		$juego = $em->getRepository('PDBundle:Juego')->find($juegoId);

		if (!$juego) {
            throw $this->createNotFoundException('El juego indicado no está disponible');
        }

        $formulario = $this->createForm(new JuegoType(), $juego);
		
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
        	$em->persist($juego);
        	$em->flush();

        	return $this->redirect($this->generateUrl('super_admin_main_juego'));
        }

	    return $this->render(
				'PDBundle:SuperAdmin:superAdminJuegoUpdate.html.twig',
				array('formulario' => $formulario->createView())
			);
	}

	public function mainSucursalAction(Request $peticion)
	{
		//exit(\Doctrine\Common\Util\Debug::dump($source));
		
		$source = new Entity('PDBundle:Sucursal');
        $grid = $this->get('grid');
        $grid->setSource($source);

        //Esconder Columna
		$grid->hideColumns('id');
		
        $rowAction = new RowAction('Ver sucursal', 'super_admin_update_sucursal');
		$rowAction->setRouteParameters(array('id'));
		$rowAction->setRouteParametersMapping(array('id' => 'sucursalId'));
		$grid->addRowAction($rowAction);
		
		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$grid->isReadyForRedirect();
		
		return $grid->getGridResponse('PDBundle:SuperAdmin:adminSucursalMain.html.twig', array(
           	'grid' => $grid,
        ));
	}

	public function addSucursalAction(Request $peticion)
	{
		$em = $this->getDoctrine()->getManager();

		$sucursal = new Sucursal();

		$formulario = $this->createForm(new SucursalType(), $sucursal);

		$formulario->handleRequest($peticion);
		if($formulario->isValid()){

			$em->persist($sucursal);
            $em->flush();

			return $this->redirect($this->generateUrl('super_admin_main_sucursal'));			
		}

		return $this->render(
				'PDBundle:SuperAdmin:adminSucursalAdd.html.twig',
					array('formulario' => $formulario->createView())
			);
	}

	public function updateSucursalAction(Request $peticion, $sucursalId)
	{
		$em = $this->getDoctrine()->getManager();

		$sucursal = $em->getRepository('PDBundle:Sucursal')->find($sucursalId);

		if (!$sucursal) {
            throw $this->createNotFoundException('La sucursal indicada no está disponible');
        }

        $formulario = $this->createForm(new SucursalType(), $sucursal);
		
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
        	$em->persist($sucursal);
        	$em->flush();

        	return $this->redirect($this->generateUrl('super_admin_main_sucursal'));
        }

		return $this->render(
				'PDBundle:SuperAdmin:adminSucursalUpdate.html.twig',
				array('formulario' => $formulario->createView())
			);
	}

	public function addUsuarioAction(Request $peticion)
	{
		//antes se usaba así sf 2.1
		//$peticion = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
		
		$rolPaginaFuente = $peticion->query->get('source');

		$usuario = new Usuario();
		//$usuario->setFechaNacimiento(new \DateTime('today - 18 years'));
		
		$usuarioEnSesion = $this->get('security.context')->getToken()->getUser();
		//exit(\Doctrine\Common\Util\Debug::dump($user));
		/*if($user->getTipoUsuario() == 2){
			exit(\Doctrine\Common\Util\Debug::dump($usuarioEnSesion->getTipoUsuario()));
		}*/
		$rol = $usuarioEnSesion->getTipoUsuario();
		
		$formulario = $this->createForm(new UsuarioType($this->get('security.context')), $usuario/*, array('tipoUsuario' => $rol )*/);
		
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
            // Completar las propiedades que el usuario no rellena en el formulario
            $usuario->setSalt(md5(time()));

            $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword(
                $usuario->getPassword(),
                $usuario->getSalt()
            );
            $usuario->setPassword($passwordCodificado);

            // Guardar el nuevo usuario en la base de datos
            $em->persist($usuario);
            $em->flush();

            // Crear un mensaje flash para notificar al usuario que se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info',
                '¡Enhorabuena! Te has registrado correctamente en Cupon'
            );

            // Loguear al usuario automáticamente
            //$token = new UsernamePasswordToken($usuario, null, 'frontend', $usuario->getRoles());
            //$this->container->get('security.context')->setToken($token);

            return $this->redirect($this->generateUrl('super_admin_main_usuario', array('source'=>$rolPaginaFuente)));
        }
		
		/* $formulario = $this->crateFormBuilder($usuario)
						   ->add('nombre')
						   ->add('apellidos')
						   ->add('direccion','text')
						   ->add('fechaNacimiento','date')
					  ->getForm(); */
					  
		return $this->render(
					'PDBundle:SuperAdmin:adminUsuarioAdd.html.twig',
					array('formulario' => $formulario->createView())
			   );
	}

	public function mainUsuarioAction(Request $peticion)
	{
		//exit(\Doctrine\Common\Util\Debug::dump($source));
		//$rolPaginaFuente = $source;
		$usuarioEnSesion = $this->get('security.context')->getToken()->getUser();

		$source = new Entity('PDBundle:Usuario');
        $grid = $this->get('grid');
        $grid->setSource($source);

        /*
        {
		$source = new Entity('PDBundle:Usuario');
        $grid = $this->get('grid');

        $tableAlias = $source->getTableAlias();
        $estaActivo = 'ACTIVO';
        $rolUsuarioEnSesion = $usuarioEnSesion->getTipoUsuario();
     
	    
        if($rolUsuarioEnSesion == 'SUPER_ADMIN'){
        	
        	if($rolPaginaFuente == 'admin'){
        		$source->manipulateQuery(
					    function ($query) use ($tableAlias, $estaActivo)
					    {
					        $query->andWhere($tableAlias . '.estado = :estaActivo')
					              ->andWhere($tableAlias . '.tipoUsuario IN (:rol)')
					              ->setParameter('estaActivo', $estaActivo)
					              ->setParameter('rol', array('ADMIN', 'SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);
					    }
					);
        	}elseif ($rolPaginaFuente == 'supervisor'){
        		$source->manipulateQuery(
					    function ($query) use ($tableAlias, $estaActivo)
					    {
					        $query->andWhere($tableAlias . '.estado = :estaActivo')
					              ->andWhere($tableAlias . '.tipoUsuario IN (:rol)')
					              ->setParameter('estaActivo', $estaActivo)
					              ->setParameter('rol', array('VENDEDOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);
					    }
				);

        	}else{
        		throw $this->createNotFoundException('Opción no disponible como usuario SUPER_ADMIN');
        	}

        }elseif ($usuarioEnSesion->getTipoUsuario() == 'ADMIN'){
				
				if($rolPaginaFuente == 'admin'){
					$rol = 'SUPERVISOR';
					$source->manipulateQuery(
					    function ($query) use ($tableAlias, $rol, $estaActivo)
					    {
					        $query->andWhere($tableAlias . '.estado = :estaActivo')
					              ->andWhere($tableAlias . '.tipoUsuario = :rol')
					              ->setParameter('estaActivo', $estaActivo)
					              ->setParameter('rol', $rol);
					    }
					);

				}elseif ($rolPaginaFuente == 'supervisor'){
					$rol = 'VENDEDOR';
					$source->manipulateQuery(
					    function ($query) use ($tableAlias, $rol, $estaActivo)
					    {
					        $query->andWhere($tableAlias . '.estado = :estaActivo')
					              ->andWhere($tableAlias . '.tipoUsuario = :rol')
					              ->setParameter('estaActivo', $estaActivo)
					              ->setParameter('rol', $rol);
					    }
					);
				}else{
					throw $this->createNotFoundException('Opción no disponible como usuario ADMIN');
				}
				
			}elseif ($usuarioEnSesion->getTipoUsuario() == 'SUPERVISOR'){

				if($rolPaginaFuente == 'admin'){
            			throw $this->createNotFoundException('Opción no disponible como usuario supervisor');
        		}elseif ($rolPaginaFuente == 'supervisor'){

        			$rol = 'VENDEDOR';
        			$source->manipulateQuery(
					    function ($query) use ($tableAlias, $rol, $estaActivo)
					    {
					        $query->andWhere($tableAlias . '.estado = :estaActivo')
					        	  ->andWhere($tableAlias . '.tipoUsuario = :rol')
					              ->setParameter('estaActivo', $estaActivo)
					              ->setParameter('rol', $rol);
					    }
					);
        		}
			}

        $grid->setSource($source);
        }
		*/
        //Esconder Columna
		$grid->hideColumns('id');
		$grid->hideColumns('username');
		$grid->hideColumns('password');
		$grid->hideColumns('salt');
		$grid->hideColumns('fechaAlta');
		$grid->hideColumns('fechaNacimiento');
		$grid->hideColumns('dui');
		$grid->hideColumns('estado');
		$grid->hideColumns('direccion');
		$grid->hideColumns('supervisor.nombre');
		$grid->hideColumns('supervisor.apellidos');
		
		/*
        $rowAction = new RowAction('modificar', 'admin_update_ticket', false, '_self');
        $rowAction->setRouteParameters(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);*/
		
        $rowAction = new RowAction('Ver usuario', 'super_admin_update_usuario');
		//$rowAction->setRouteParameters(array('id','source' => $rolPaginaFuente));
		$rowAction->setRouteParameters(array('id'));
		$rowAction->setRouteParametersMapping(array('id' => 'usuarioId'));
		//$rowAction->setRouteParameters('source');
		//$rowAction->setRouteParametersMapping(array('source' => $rolPaginaFuente));
        $grid->addRowAction($rowAction);
		

        $rowAction_a = new RowAction('Añadir vendedor', 'super_admin_add_supervisor_a_vendedor');
		$rowAction_a->setRouteParameters(array('id'));
		$rowAction_a->setRouteParametersMapping(array('id' => 'supervisorId'));
        
        $rowAction_a->manipulateRender(
		    function ($action, $row)
		    {	
		        //if ($row->getField('estado') != "SUPERVISOR") {$action->setTitle('Sold out');}
		        if ($row->getField('tipoUsuario') != "SUPERVISOR") {
		            return null;
		        }
		        return $action;
		    }
		);
		$grid->addRowAction($rowAction_a);


		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$grid->isReadyForRedirect();
		/*
		//echo '<div style="background-color: black">'. $primeroEnero .'</div>';
		
		$grid->setDefaultFilters(
			array(
				'fechaFin' => array('operator' => 'gte', 'from' => $primeroEnero)
			)
		);*/
		/*return $this->render(
					'PDBundle:Admin:adminUsuarioMain.html.twig'
			   );*/
		return $grid->getGridResponse('PDBundle:SuperAdmin:adminUsuarioMain.html.twig', array(
           	'grid' => $grid,
           	//'rolPaginaFuente' => $rolPaginaFuente,
        ));
	}

	public function updateUsuarioAction(Request $peticion, $usuarioId)
	{
		//$rolPaginaFuente = $peticion->query->get('source');
		$em = $this->getDoctrine()->getManager();

		$usuario = $em->getRepository('PDBundle:Usuario')->find($usuarioId);

		if (!$usuario) {
            throw $this->createNotFoundException('El usuario indicado no está disponible');
        }

        $usuarioEnSesion = $this->get('security.context')->getToken()->getUser();

		$rol = $usuarioEnSesion->getTipoUsuario();
		
		$formulario = $this->createForm(new UsuarioType($this->get('security.context')), $usuario);
		
		$formulario->handleRequest($peticion);

        if ($formulario->isValid()) {
        	// POR COMPLETAR --------

        	return $this->redirect($this->generateUrl('super_admin_main_usuario', array('source' => $rolPaginaFuente)));
        }

        return $this->render(
					'PDBundle:SuperAdmin:adminUsuarioUpdate.html.twig',
					array('formulario' => $formulario->createView())
			   );
        
	}

	public function addSupervisorVendedorAction(Request $peticion, $supervisorId)
	{
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('PDBundle:Usuario')->find($supervisorId);

		if (!$usuario) {
            throw $this->createNotFoundException('El supervisor indicado no está disponible');
        }
        $data = array();
    	$formulario = $this->createFormBuilder($data)
            ->add('asignados', 'entity', array(
            	'class' => 'PDBundle:Usuario', //'property' => 'nombre',
            	'expanded' => true,
            	'multiple' => true,
            	'query_builder' => function (EntityRepository $er) use ($supervisorId) {
			        return $er->createQueryBuilder('u')
			        	->where('u.estado = :activo')
			        	->andWhere('u.tipoUsuario LIKE :vendedor')
			        	->andWhere('u.supervisor = :supervisorId')
			        	->orderBy('u.nombre', 'ASC')
			        	->setParameter('activo','ACTIVO')
			        	->setParameter('vendedor', 'VENDEDOR%')
			        	->setParameter('supervisorId', $supervisorId);
            	}
			))
            ->add('no_asignados', 'entity', array(
            	'class' => 'PDBundle:Usuario', //'property' => 'nombre',
            	'expanded' => true,
            	'multiple' => true,
            	'query_builder' => function (EntityRepository $er) {
			        return $er->createQueryBuilder('u')
			        	->where('u.tipoUsuario like :vendedor')
			        	->andWhere('u.supervisor is NULL')
			        	->orderBy('u.nombre', 'ASC')
			        	->setParameter('vendedor', 'VENDEDOR%');
            	}
			))
            ->add('guardar', 'submit', array('label' => 'Guardar','attr' => array('class' => 'btn btn-primary',)))
            ->add('no_guardar', 'submit', array('label' => 'Regresar sin guardar','attr' => array('class' => 'btn btn-danger',)))
            ->getForm();

        $formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
        	$data = $formulario->getData();

        	if ($formulario->get('no_guardar')->isClicked()) {
				return $this->redirect($this->generateUrl("super_admin_main_usuario"));
			}

        	//exit(\Doctrine\Common\Util\Debug::dump($usuario->getSupervisados()));
        	//exit(\Doctrine\Common\Util\Debug::dump($data['asignados']));
        	//exit(\Doctrine\Common\Util\Debug::dump($data['no_asignados']));
			
			if($formulario->get('guardar')->isClicked()) {
				foreach ($usuario->getSupervisados() as $supervisadoPrePersist){
					$bandera = false;
					foreach ($data['asignados'] as $vendedorAsignado) {
						if($supervisadoPrePersist->getId() == $vendedorAsignado->getId()){
							$bandera = true;
							$usuario->addSupervisado($vendedorAsignado);
						}
					}
					if(!$bandera){
						//le desasignaron el supervisor
						//$usuario->removeSupervisado($supervisadoPrePersist);
						$supervisadoPrePersist->setSupervisor(NULL);
					}
				}

				foreach ($data['no_asignados'] as $vendedorSinAsignar) {
					$usuario->addSupervisado($vendedorSinAsignar);
				}
				$em->persist($usuario);
				$em->flush();
						
				return $this->redirect($this->generateUrl("super_admin_add_supervisor_a_vendedor", array('supervisorId' => $supervisorId)));
			}
        }


		return $this->render(
					'PDBundle:SuperAdmin:adminSupervisorVendedorAdd.html.twig',
					array(
						'supervisor' => $usuario,
						'formulario' => $formulario->createView(),
					)
			   );
	}

	public function addCajaAction(Request $peticion)
	{

		$em = $this->getDoctrine()->getManager();
		$caja = new Caja();
		$formulario = $this->createForm(new CajaType(/*$this->get('security.context')*/), $caja/*, array('tipoUsuario' => $rol )*/);
		$formulario->handleRequest($peticion);
        if ($formulario->isValid()) {

        	if($formulario->get('usuario')->getData() != null){
        		$caja->setEstado("ASIGNADO_A_SUPERVISOR");
        	}else{
        		$caja->setEstado("CREADO");
        	}
        	
			$lim_inf = (int) $formulario->get('contiene_libreta_limite_inferior')->getData();
			$lim_sup = (int) $formulario->get('contiene_libreta_limite_superior')->getData();
			$omi_lib = $formulario->get('omite_libreta')->getData();
			$omi_lib_comma_splitted = explode(',', $omi_lib);
			
			$omi_lib_number_array = array();
			foreach ($omi_lib_comma_splitted as $item){
				$omi_lib_number_array[] = (int) ltrim(ltrim($item), '0');
			}
			
			//exit(\Doctrine\Common\Util\Debug::dump($cont));
			//$str = ltrim($str, '0');
			$array_prueba = array();
			$libreta_conta = 0;
			//exit(\Doctrine\Common\Util\Debug::dump($array_prueba));
			for ($lim_inf; $lim_inf<=$lim_sup; $lim_inf++) {
				$bandera = false;
				foreach ($omi_lib_number_array as $item_aux) {
					if($lim_inf == $item_aux){
						 $bandera = true;
						 break;
					}
					
				}
				if(!$bandera){
					//$array_prueba[] = $lim_inf;
					$libreta = new Libreta();
					$libreta->setCaja($caja);
					$libreta->setCorrelativo(str_pad($lim_inf, 6, "0", STR_PAD_LEFT));
					$libreta->setVendedor(null);
					$libreta->setPrecioAlVendedor(0.0);
					$libreta->setPrecioAcumulado(0.0);
					$libreta->setPremioAcumulado(0.0);
					$libreta->setRaspableGratisAcumulado(0.0);
					$libreta->setFechaAsignacionVendedor(null);
					$libreta->setFechaEstadoFinal(null);
					$libreta_conta++;
					$em->persist($libreta);
				}
			}
			$caja->setTotalLibretas($libreta_conta);
			$caja->setLibretasAsignadas(0);
						
			//exit(\Doctrine\Common\Util\Debug::dump($array_prueba));
			
			$em->persist($caja);
            $em->flush();
        	
        	return $this->redirect($this->generateUrl('super_admin_main_caja'));
		}
		
		return $this->render(
					'PDBundle:SuperAdmin:adminCajaAdd.html.twig', array(
					'formulario' => $formulario->createView()
			   ));
	}
	
	public function mainCajaAction(Request $peticion)
	{
		$usuarioEnSesion = $this->get('security.context')->getToken()->getUser();


		$source = new Entity('PDBundle:Caja');
        $grid = $this->get('grid');
        $tableAlias = $source->getTableAlias();
        $source->manipulateQuery(
		    function ($query) use ($tableAlias)
		    {
		        $query->addOrderBy($tableAlias . '.fecha_creacion', 'desc');
		    }
		);

        $grid->setSource($source);

		
		$grid->hideColumns('id');
		$grid->hideColumns('omite_libreta');
		$grid->hideColumns('total_libretas');
		$grid->hideColumns('libretas_asignadas');
		$grid->hideColumns('contiene_libreta_limite_inferior');
		$grid->hideColumns('contiene_libreta_limite_superior');
		
		/*
		$grid->hideColumns('salt');
		$grid->hideColumns('fechaAlta');
		$grid->hideColumns('fechaNacimiento');
		$grid->hideColumns('dui');
		$grid->hideColumns('estado');
		$grid->hideColumns('direccion');
		*/
		
		/*
        $rowAction = new RowAction('modificar', 'admin_update_ticket', false, '_self');
        $rowAction->setRouteParameters(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);*/
		
        $rowAction = new RowAction('Ver caja', 'super_admin_update_caja');
		$rowAction->setRouteParameters(array('id'));
		$rowAction->setRouteParametersMapping(array('id' => 'cajaId'));
        $grid->addRowAction($rowAction);
		

		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$userColumns = array('sucursal.nombre', 'juego.nombre', 'numero_carton', 'fecha_creacion', 'estado');
		$grid->setColumnsOrder($userColumns);

		$grid->isReadyForRedirect();

		return $grid->getGridResponse('PDBundle:SuperAdmin:adminCajaMain.html.twig', array(
           	'grid' => $grid,
        ));

		/*
		return $this->render(
					'PDBundle:SuperAdmin:adminCajaMain.html.twig'
			   );*/
	}

	public function updateCajaAction(Request $peticion, $cajaId)
	{
		
		$em = $this->getDoctrine()->getManager();
		$caja = $em->getRepository('PDBundle:Caja')->find($cajaId);

		if (!$caja) {
            throw $this->createNotFoundException('La caja indicada no está disponible');
        }


        /* --------------------------------------------------------------------------------------------------
           PROCEDIMIENTO QUE PUEDE SERVIR PARA ARREGLAR EN UN MOMENTO DETERMINADO LOS ESTADOS DE LAS CAJAS FRENTE A LAS LIBRETAS
           ASIGNADAS. 
    	$conta = 0;
    	$numero_libretas = 0;
    	$numero_libretas_asignadas_vendedor = 0;
        foreach ($caja->getLibretas() as $libreta) {
        	$numero_libretas++;
        	if($libreta->getVendedor() == NULL){
        		$conta++;
        	}else{
        		$modificar_numero_carton = 1;
        		$numero_libretas_asignadas_vendedor ++;
        		//exit(\Doctrine\Common\Util\Debug::dump($caja->getEstado()));
        		if($caja->getEstado() == 'ASIGNADO_A_SUPERVISOR'){
        			//exit(\Doctrine\Common\Util\Debug::dump($caja->getEstado()));
	    			$caja->setEstado('ASIGNADO_A_VENDEDOR');
	    			//$em->refresh($caja);
	    			$em->persist($caja);
	    			$em->flush();
	    		}
        	}
        }
    	if($conta == $numero_libretas){
    		//NINGUNA libreta está asignada a vendedores
    		$caja->setLibretasAsignadas(0);
    		$em->persist($caja);
    		$em->flush();
    	}else if($numero_libretas == $numero_libretas_asignadas_vendedor){
    		if($caja->getEstado() == 'ASIGNADO_A_SUPERVISOR' || $caja->getEstado() == 'ASIGNADO_A_VENDEDOR'){
	    			$caja->setEstado('ASIGNADO_COMPLETAMENTE');
	    			$em->persist($caja);
	    			$em->flush();
	    	}
    	}else{
    		$caja->setEstado('ASIGNADO_A_VENDEDOR');
    		$caja->setLibretasAsignadas($numero_libretas_asignadas_vendedor);
    		$em->persist($caja);
    		$em->flush();
    	}
    	------------------------------------------------------------------------ */

    	$modificar_asigna_usuario = 0;
        $modificar_numero_carton = 0;
    	if($caja->getLibretasAsignadas() == 0 && $caja->getEstado() != "DESHABILITADO"){
    		$modificar_asigna_usuario = 1;
    		$modificar_numero_carton = 1;
    	}else if($caja->getTotalLibretas() == $caja->getLibretasAsignadas()){
	    		if($caja->getEstado() == 'ASIGNADO_A_SUPERVISOR' || $caja->getEstado() == 'ASIGNADO_A_VENDEDOR'){
		    			$caja->setEstado('ASIGNADO_COMPLETAMENTE');
		    			$em->persist($caja);
		    			$em->flush();
		    	}
    	}else if($caja->getLibretasAsignadas() > 0){
    		$modificar_asigna_usuario = 0;
    		$modificar_numero_carton = 0;
    	}

    	$esta_deshabilitado = 0;
    	if($caja->getEstado() == 'DESHABILITADO'){
    		$esta_deshabilitado = 1;
    	}
        
		$formulario = $this->createForm(new CajaUpdateType(	$modificar_asigna_usuario,
															$modificar_numero_carton, 
															$esta_deshabilitado), $caja);

		$formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
        	//exit(\Doctrine\Common\Util\Debug::dump("hola"));
        	$caja = $formulario->getData();
        	$em = $this->getDoctrine()->getManager();

        	if($formulario->get('regresar')->isClicked()){
        		return $this->redirect($this->generateUrl('super_admin_main_caja'));
        	}

        	if($formulario->get('guardar')->isClicked()){
        		
            	$em->persist($caja);
            	$em->flush();

            	return $this->redirect($this->generateUrl('super_admin_update_caja', array('cajaId' => $caja->getId())));
        	}
            
            if($formulario->get('deshabilitar_caja')->isClicked()){

				foreach ($caja->getLibretas() as $libreta) {
					$libreta->setCaja(NULL);
                	$em->remove($libreta);
				}
				$em->refresh($caja);
				$caja->setEstado('DESHABILITADO');
	        	$em->persist($caja);
	            $em->flush();

				return $this->redirect($this->generateUrl('super_admin_main_caja'));
				
            }
        }


		return $this->render(
					'PDBundle:SuperAdmin:adminCajaUpdate.html.twig', array(
					'formulario' => $formulario->createView(),
					'modificar_asigna_usuario' => $modificar_asigna_usuario,
			   ));
	}

	public function mainLibretaAction(Request $peticion)
	{
		$source = new Entity('PDBundle:Libreta');
        $grid = $this->get('grid');
        $tableAlias = $source->getTableAlias();
        $source->manipulateQuery(
		    function ($query) use ($tableAlias)
		    {
		        $query->addOrderBy('_caja.fecha_creacion', 'desc');
		    }
		);

        $grid->setSource($source);

        //Esconder Columna
		$grid->hideColumns('id');
		$grid->hideColumns('precio_al_vendedor');
		$grid->hideColumns('precio_acumulado');
		$grid->hideColumns('premio_acumulado');
		$grid->hideColumns('raspable_gratis_acumulado');
		$grid->hideColumns('fecha_asignacion_vendedor');
		$grid->hideColumns('fecha_estado_final');
		
		
		/*
        $rowAction = new RowAction('modificar', 'admin_update_ticket', false, '_self');
        $rowAction->setRouteParameters(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);*/
		
        $rowAction = new RowAction('Ver libreta', 'super_admin_update_libreta');
		$rowAction->setRouteParameters('id');
		$rowAction->setRouteParametersMapping(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);
		
		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$grid->isReadyForRedirect();
		/*
		//echo '<div style="background-color: black">'. $primeroEnero .'</div>';
		
		$grid->setDefaultFilters(
			array(
				'fechaFin' => array('operator' => 'gte', 'from' => $primeroEnero)
			)
		);*/
		// --------------------------------------------------------------------------
		/*
		$em = $this->getDoctrine()->getManager();

        $libretas = $em->getRepository('PDBundle:Libreta')->findAll();

        //exit(\Doctrine\Common\Util\Debug::dump($libretas));

		return $this->render(
				'PDBundle:Admin:adminLibretaMain.html.twig', array(
				'libretas' => $libretas
			));
		*/
		//$grid = $this->prepareGridMainLibretaAction();
        return $grid->getGridResponse('PDBundle:SuperAdmin:adminLibretaMain.html.twig', array(
           	'grid' => $grid,
        ));
	}

	public function updateLibretaAction(Request $peticion, $libretaId)
	{
		//exit(\Doctrine\Common\Util\Debug::dump($libreta));
		$em = $this->getDoctrine()->getManager();

		$libreta = $em->getRepository('PDBundle:Libreta')->find($libretaId);

		if (!$libreta) {
            throw $this->createNotFoundException('La libreta indicada no está disponible');
        }

		$formulario = $this->createForm(new LibretaType(), $libreta);

		$formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
        	$libreta = $formulario->getData();

        	if($formulario->get('no_guardar_ir_menu_principal')->isClicked()){
        		return $this->redirect($this->generateUrl('super_admin_main_libreta'));
        	}

            if($formulario->get('guardar_libreta_y_continuar')->isClicked()){
            	//exit(\Doctrine\Common\Util\Debug::dump($formulario->get('is_vendedor_changed')->getData()));
            	$total_libretas = $libreta->getCaja()->getTotalLibretas();
	        	$libretas_asignadas = $libreta->getCaja()->getLibretasAsignadas();
            	
	        	/* verificando si el valor de vendedor ha cambiado
					1. de null a vendedor ->  +1
					2. de vendedor a vendedor -> no sumo
					3. de vendedor a null -> -1
	        	*/
				// verifica si ha habido un cambio
				if($formulario->get('vendedor')->getData() != $formulario->get('is_vendedor_changed')->getData()){
	            	// 1. de null a vendedor -> +1
	            	if($formulario->get('is_vendedor_changed')->getData() == NULL){
	            		$libreta->setFechaAsignacionVendedor(new \DateTime());
	            		if(($libretas_asignadas + 1) == $total_libretas){
		        			$libreta->getCaja()->setEstado('ASIGNADO_COMPLETAMENTE');
		        		}else{
		        			if($libreta->getCaja()->getEstado() == "ASIGNADO_A_SUPERVISOR"){
		        				$libreta->getCaja()->setEstado('ASIGNADO_A_VENDEDOR');
		        			}
		        		}
		        		$libreta->getCaja()->setLibretasAsignadas($libretas_asignadas+1);
		        		/* estoy diciendo que is_vendedor_changed no es NULL y en el if evaluo que vendedor sea NULL por tanto es el
						   escenario 3.
		        		*/
	            	}else if($formulario->get('vendedor')->getData() == NULL){
							if($libreta->getCaja()->getEstado() == "ASIGNADO_COMPLETAMENTE"){
								$libreta->getCaja()->setEstado('ASIGNADO_A_VENDEDOR');
							}else if($libretas_asignadas == 1){
								$libreta->getCaja()-setEstado('ASIGNADO_A_SUPERVISOR');
							}
							$libreta->getCaja()->setLibretasAsignadas($libretas_asignadas-1);
		        	}
		        }
		        $em->persist($libreta);
		        $em->flush();

            	$posicion = 0;
            	$libreta_siguiente = $this->getDoctrine()
                         ->getRepository('PDBundle:Libreta')
                         ->findByNextLibreta($posicion);

				/* FUNCIONA pero ordenando los ids de manera descendente
				$libreta_siguiente = $this->getDoctrine()
						     ->getRepository('PDBundle:Libreta')
						     ->findOneBy(array('vendedor' => NULL), array('caja' => 'DESC'));*/
				if(!$libreta_siguiente){
					return $this->redirect($this->generateUrl('super_admin_main_libreta'));
				}
				$formulario = $this->createForm(new LibretaType(), $libreta_siguiente);

				return $this->redirect($this->generateUrl('super_admin_update_libreta', array('libretaId' => $libreta_siguiente->getId())));
				
            }
            if($formulario->get('guardar_libreta')->isClicked()){
            	//exit(\Doctrine\Common\Util\Debug::dump($formulario->get('is_vendedor_changed')->getData()));
            	$total_libretas = $libreta->getCaja()->getTotalLibretas();
	        	$libretas_asignadas = $libreta->getCaja()->getLibretasAsignadas();
            	
	        	/* verificando si el valor de vendedor ha cambiado
					1. de null a vendedor ->  +1
					2. de vendedor a vendedor -> no sumo
					3. de vendedor a null -> -1
	        	*/
				// verifica si ha habido un cambio
				if($formulario->get('vendedor')->getData() != $formulario->get('is_vendedor_changed')->getData()){
	            	// 1. de null a vendedor -> +1
	            	if($formulario->get('is_vendedor_changed')->getData() == NULL){
	            		$libreta->setFechaAsignacionVendedor(new \DateTime());
	            		if(($libretas_asignadas + 1) == $total_libretas){
		        			$libreta->getCaja()->setEstado('ASIGNADO_COMPLETAMENTE');
		        		}else{
		        			if($libreta->getCaja()->getEstado() == "ASIGNADO_A_SUPERVISOR"){
		        				$libreta->getCaja()->setEstado('ASIGNADO_A_VENDEDOR');
		        			}
		        		}
		        		$libreta->getCaja()->setLibretasAsignadas($libretas_asignadas+1);
		        		/* estoy diciendo que is_vendedor_changed no es NULL y en el if evaluo que vendedor sea NULL por tanto es el
						   escenario 3.
		        		*/
	            	}else if($formulario->get('vendedor')->getData() == NULL){
							if($libreta->getCaja()->getEstado() == "ASIGNADO_COMPLETAMENTE"){
								$libreta->getCaja()->setEstado('ASIGNADO_A_VENDEDOR');
							}else if($libretas_asignadas == 1){
								$libreta->getCaja()->setEstado('ASIGNADO_A_SUPERVISOR');
							}
							$libreta->getCaja()->setLibretasAsignadas($libretas_asignadas-1);
		        	}
		        }

	        	$em->persist($libreta);
	            $em->flush();

            	return $this->redirect($this->generateUrl('super_admin_main_libreta'));
            }
        }

		return $this->render(
					'PDBundle:SuperAdmin:adminLibretaUpdate.html.twig', array(
					'formulario' => $formulario->createView()
			   ));
	}

	public function mainTicketAction(Request $peticion)
	{
		$source = new Entity('PDBundle:Libreta');
        $grid = $this->get('grid');
        $tableAlias = $source->getTableAlias();
        $source->manipulateQuery(
		    function ($query) use ($tableAlias)
		    {
		    	$query->andWhere($tableAlias.'.vendedor is not NULL');
		        $query->addOrderBy('_caja.fecha_creacion', 'desc');
		    }
		);

        $grid->setSource($source);

        //Esconder Columna
        //$grid->hideColumns('razonSocial');
        /*$grid->hideColumns('id');
		$grid->hideColumns('contratoTipo.nombre');
		$grid->hideColumns('codigoReferencia');
		$grid->hideColumns('monto');*/
		//$grid->hideColumns('vendedor');
		$grid->hideColumns('id');
		$grid->hideColumns('precio_al_vendedor');
		$grid->hideColumns('premio_acumulado');
		$grid->hideColumns('raspable_gratis_acumulado');
		$grid->hideColumns('fecha_asignacion_vendedor');
		$grid->hideColumns('fecha_estado_final');
		
		
		/*
        $rowAction = new RowAction('modificar', 'admin_update_ticket', false, '_self');
        $rowAction->setRouteParameters(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);*/
		
        $rowAction = new RowAction('Ver tickets', 'super_admin_update_ticket');
		$rowAction->setRouteParameters('id');
		$rowAction->setRouteParametersMapping(array('id' => 'libretaId'));
        $grid->addRowAction($rowAction);

		/*$rowAction = new RowAction('listar', 'dacicontratos_controlpago_listCc', false, '_self');
        $grid->addRowAction($rowAction);*/
		
		$grid->setLimits(array(20, 50, 100));
		// Set the default limit
		$grid->setDefaultLimit(100);
		
		$grid->isReadyForRedirect();
		/*
		$anio = date('Y');
		$primeroEnero = $anio."-01-01";
		$ultimoDiciembre = $anio."-12-31";
		//echo '<div style="background-color: black">'. $primeroEnero .'</div>';
		
		$grid->setDefaultFilters(
			array(
				'fechaFin' => array('operator' => 'gte', 'from' => $primeroEnero)
			)
		);*/
		// ----------------------------------------------------------------------------------
		/*
        $repo = $this->getDoctrine()->getRepository('PDBundle:Libreta');
		$libretas = $repo->createQueryBuilder('l')
		    ->where('l.vendedor IS NOT NULL')
		    ->getQuery()->getResult();

        //exit(\Doctrine\Common\Util\Debug::dump($libretas));

		return $this->render(
				'PDBundle:Admin:adminTicketMain.html.twig', array(
				'libretas' => $libretas
			));
		*/
		//$grid = $this->preparegrid();
        return $grid->getGridResponse('PDBundle:SuperAdmin:adminTicketMain.html.twig', array(
            'grid' => $grid,
            /*'libretaId' => $libretaId,*/
        ));
        //return $this->render('PDBundle:Admin:adminTicketMain.html.twig', array('grid' => $grid));
	}

	public function updateTicketAction(Request $peticion, $libretaId)
	{
		$em = $this->getDoctrine()->getManager();

		$libreta = $em->getRepository('PDBundle:Libreta')->find($libretaId);

		if (!$libreta) {
            throw $this->createNotFoundException('La libreta indicada no está disponible');
        }

        $numero_tickets_x_juego = $libreta->getCaja()->getJuego()->getNumeroTickets();
        $precio_x_ticket 		= $libreta->getCaja()->getJuego()->getPrecioXTicket();
        $precio_al_vendedor		= $libreta->getPrecioAlVendedor();


        //exit(\Doctrine\Common\Util\Debug::dump($numero_tickets_juego));

        $originalTickets = array();
        foreach($libreta->getTickets() as $ticket){
        	$originalTickets[] = $ticket;
        }

        $formulario = $this->createForm(new TicketCompositeType($libreta->getCaja()->getJuego()->getId()), $libreta);

        
        $formulario->handleRequest($peticion);
        if($formulario->isValid()){

        	if ($formulario->get('no_guardar_tickets')->isClicked()) {
				return $this->redirect($this->generateUrl("super_admin_main_ticket"));
			}

        	$libreta = $formulario->getData();
        	$em = $this->getDoctrine()->getManager();

        	foreach ($libreta->getTickets() as $ticket){
        		foreach ($originalTickets as $key => $toDel){
        			if ($toDel->getId() === $ticket->getId()){
        				unset($originalTickets[$key]);
        			}
        		}
        	}

        	foreach ($originalTickets as $ticket){
        		$ticket->setLibreta(null);
        		$em->remove($ticket);
        	}

        	/*
        	$i = 0;
        	for ($i=0;$i<=$numero_tickets_x_juego;i++){

        	}*/
        	$acumulador 		= 0;
        	$acumulador_premio 	= 0;
        	$acumulador_raspable_gratis = 0;
        	foreach ($libreta->getTickets() as $ticket){
        		if($ticket->getEstado() == 'VENDIDO'){
        			$acumulador+= 0;
        		}
        		if($ticket->getEstado() == 'EN_RUTA'){
        			$acumulador+= $precio_x_ticket;
        		}
        		if($ticket->getEstado() == 'EN_SALA_VENTAS'){
        			$acumulador+= $precio_x_ticket;
        		}
        		if($ticket->getEstado() == 'PREMIADO'){
        			if($ticket->getPremio() != 'RASPABLE_GRATIS'){
        				$acumulador_premio+= $ticket->getPremio();
        			}else{
        				$acumulador_raspable_gratis+= $precio_x_ticket;
        			}
        		}
        	}

        	//$ganancia_vendedor = ($numero_tickets_x_juego * $precio_x_ticket) - $precio_al_vendedor;
        	$total_de_tickets_en_dinero = $numero_tickets_x_juego * $precio_x_ticket;

        	$tickets_vendidos_efectivos = $total_de_tickets_en_dinero - $acumulador;

        	$libreta->setPrecioAcumulado($tickets_vendidos_efectivos);
        	$libreta->setPremioAcumulado($acumulador_premio);
        	$libreta->setRaspableGratisAcumulado($acumulador_raspable_gratis);

        	if($libreta->getPrecioAcumulado() >= $total_de_tickets_en_dinero){
        		$libreta->setFechaEstadoFinal(new \DateTime());
        	}else{
        		$libreta->setFechaEstadoFinal(NULL);
        	}

        	$em->persist($libreta);
            $em->flush();
			
			if ($formulario->get('guardar_tickets')->isClicked()) {
				return $this->redirect($this->generateUrl("super_admin_update_ticket", array('libretaId' => $libretaId)));
			}else{
				if ($formulario->get('guardar_tickets_y_regresar')->isClicked()) {
					return $this->redirect($this->generateUrl("super_admin_main_ticket"));
				}
			}
        }

		return $this->render(
					'PDBundle:SuperAdmin:adminTicketUpdate.html.twig', array(
					'formulario' => $formulario->createView(),
					'libreta' => $libreta
			   ));
	}
}
	