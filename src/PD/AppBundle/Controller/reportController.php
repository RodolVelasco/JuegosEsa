<?php

namespace PD\AppBundle\Controller;

use PD\AppBundle\Entity\Juego;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\MassAction;

//use Doctrine\ORM\Query\ResultSetMappingBuilder;
//use Doctrine\ORM\Query\ResultSetMapping;

class reportController extends Controller
{
	public function canjeEfectivoAction(Request $peticion)
	{
		$data = array();
    	$formulario = $this->createFormBuilder($data)
            ->add('fecha_inicio','text', array(
            		'required' => false,
            		'attr' => array(
								'class' => 'form-control fecha',
                         	)
            		))
            ->add('fecha_fin','text', array(
            		'required' => false,
            		'attr' => array(
								'class' => 'form-control fecha',
                         	)
            		))
            ->add('generar', 'submit', array('label' => 'Generar reporte','attr' => array('class' => 'btn btn-primary',)))
            ->add('regresar', 'submit', array('label' => 'Regresar','attr' => array('class' => 'btn btn-danger',)))
            ->getForm();

        $formulario->handleRequest($peticion);
        if ($formulario->isValid()) {
        	//exit(\Doctrine\Common\Util\Debug::dump($usuario->getSupervisados()));
        	//exit(\Doctrine\Common\Util\Debug::dump($data['asignados']));
        	//exit(\Doctrine\Common\Util\Debug::dump($data));

			if($formulario->get('generar')->isClicked()) {
				$data = $formulario->getData();
				//$fecha_inicio = strtotime($data['fecha_inicio']);
				//$fecha_fin = strtotime($data['fecha_fin']);
				$fecha_inicio 	= $data['fecha_inicio'];
				$fecha_fin 		= $data['fecha_fin'];
				
				//exit(\Doctrine\Common\Util\Debug::dump(date('d/M/Y H:i:s', $fecha_inicio)));
				
				$response = $this->generaExcel($fecha_inicio, $fecha_fin);
			
		        return $response;
			}
		}
		return $this->render('PDBundle:Reporte:canjeEfectivo.html.twig', array('formulario' => $formulario->createView()));
	}

	public function generaExcel($fecha_inicio, $fecha_fin)
	{
		
		list($myTable, $myTablePremioGallina, $myTablePremioMina) = $this->generaTablaA($fecha_inicio, $fecha_fin);

		//exit(\Doctrine\Common\Util\Debug::dump(array($myTable, $myTablePremioGallina, $myTablePremioMina)));
		
		
		/*echo '<pre>';
			\Doctrine\Common\Util\Debug::dump(array($myTable, $myTablePremioGallina, $myTablePremioMina), 5);
		echo '</pre>';
		exit(var_dump($myTable));*/
		

		// ask the service for a Excel5
		$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

		$phpExcelObject->getProperties()->setCreator("Juegos El Salvador")
		   ->setLastModifiedBy("Juegos El Salvador")
		   ->setTitle("Título")
		   ->setSubject("Tema")
		   ->setDescription("Descripción")
		   ->setKeywords("office 2005 openxml php")
		   ->setCategory("Categoría");

		//$fecha = date("D M d, Y G:i");

		if($fecha_inicio == "" AND $fecha_fin == ""){
			$del_fechaInicio_al_fechaFin = 'De todos los tiempos';
		}else{
			$del_fechaInicio_al_fechaFin = 'Del '.$fecha_inicio.' al '.$fecha_fin;
		}


		$phpExcelObject->setActiveSheetIndex(0)
					   ->setCellValue('E1', 'CANJE Y EFECTIVO')
           			   ->setCellValue('E2', $del_fechaInicio_al_fechaFin)
           			   ->setCellValue('A3', 'DETALLE DE CANJE Y EFECTIVO')
					   ->setCellValue('B4', 'TOTAL DE PREMIOS')
           			   ->setCellValue('C4', 'TOTAL DE EFECTIVO')
           			   ->setCellValue('D4', 'TOTAL DE LIBRETAS');
    	$phpExcelObject->setActiveSheetIndex(0)->mergeCells('A3:D3');

    	$phpExcelObject->setActiveSheetIndex(0)
           			   ->setCellValue('F3', 'LIBRETA DE GALLINA')
           			   ->setCellValue('F4', 'CANTIDAD')
					   ->setCellValue('G4', 'VALOR')
           			   ->setCellValue('H4', 'TOTAL');
    	$phpExcelObject->setActiveSheetIndex(0)->mergeCells('F3:H3');

    	$phpExcelObject->setActiveSheetIndex(0)
           			   ->setCellValue('J3', 'LIBRETA DE MINA')
           			   ->setCellValue('J4', 'CANTIDAD')
					   ->setCellValue('K4', 'VALOR')
           			   ->setCellValue('L4', 'TOTAL');
    	$phpExcelObject->setActiveSheetIndex(0)->mergeCells('J3:L3');
		//exit(\Doctrine\Common\Util\Debug::dump($cajas));

		// el contador inicia desde 5 ya que desde ahí me interesa comenzar a imprimir los valores
    	$cont = 5;
        foreach($myTable as $key => $row){
			
        	// echo '<pre>'; \Doctrine\Common\Util\Debug::dump($row, 5); echo '</pre>'; exit(var_dump($row));
			
			$phpExcelObject->setActiveSheetIndex(0)
			   			   ->setCellValue('A'.$cont, $row["sucursal_tipoVendedor_juego"])
   			               ->setCellValue('B'.$cont, $row[1])
			               ->setCellValue('C'.$cont, $row[2])
   			               ->setCellValue('D'.$cont, $row[3]);
			$cont ++;
		}
		
		$cont2 = 5;
		//exit(var_dump($myTablePremioGallina));
        foreach($myTablePremioGallina as $key => $row){
        	//echo '<pre>'; \Doctrine\Common\Util\Debug::dump($row, 5); echo '</pre>'; exit(var_dump($row));
			$phpExcelObject->setActiveSheetIndex(0)
			   			   //->setCellValue('A'.$cont, $row["sucursal_tipoVendedor_juego"])
   			               ->setCellValue('F'.$cont2, $row[1])
			               ->setCellValue('G'.$cont2, $row[3])
   			               ->setCellValue('H'.$cont2, $row[2]);
			$cont2++;
		}

		$cont3 = 5;
		//exit(var_dump($myTablePremioGallina));
        foreach($myTablePremioMina as $key => $row){
        	//echo '<pre>'; \Doctrine\Common\Util\Debug::dump($row, 5); echo '</pre>'; exit(var_dump($row));
			$phpExcelObject->setActiveSheetIndex(0)
			   			   //->setCellValue('A'.$cont, $row["sucursal_tipoVendedor_juego"])
   			               ->setCellValue('J'.$cont3, $row[1])
			               ->setCellValue('K'.$cont3, $row[3])
   			               ->setCellValue('L'.$cont3, $row[2]);
			$cont3++;
		}


		$phpExcelObject->getActiveSheet()->setTitle('Hoja 1');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$phpExcelObject->setActiveSheetIndex(0);

		// create the writer
		$writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
		// create the response
		$response = $this->get('phpexcel')->createStreamedResponse($writer);
		// adding headers
		$response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
		$response->headers->set('Content-Disposition', 'attachment;filename=Canje y efectivo.xls');
		$response->headers->set('Pragma', 'public');
		$response->headers->set('Cache-Control', 'maxage=1');

		return $response;
	}

	public function generaTablaA($fecha_inicio, $fecha_fin)
    {
    	//exit(\Doctrine\Common\Util\Debug::dump("entro a generaTablaA"));
		$em = $this->getDoctrine()->getManager();
		//$cajas = $em->getRepository('PDBundle:Caja')->findAll();
		// 'SELECT J, U, C, S, L
		if($fecha_inicio != "" AND $fecha_fin != ""){
			$query = $em->createQuery(
					    'SELECT J, U, C, S, L
					    FROM PDBundle:Caja C
					    INNER JOIN C.juego J
						INNER JOIN C.sucursal S
						INNER JOIN C.libretas L
						INNER JOIN L.tickets T
						INNER JOIN L.vendedor U
						WHERE C.estado not in (:estado) AND
							  C.fecha_creacion >= :fechaInicio AND
							  C.fecha_creacion <= :fechaFin
						ORDER BY U.tipoUsuario'
					);
			$query->setParameter("estado", array('DESHABILITADO', 'ASIGNADO_A_SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY)
				  /*->setParameter('fechaInicio', new \DateTime($fecha_inicio))
				  ->setParameter('fechaFin', new \DateTime($fecha_fin));*/
				  ->setParameter('fechaInicio', $fecha_inicio)
				  ->setParameter('fechaFin', $fecha_fin);
			$cajas = $query->getResult();
		}else{
			
			$query = $em->createQuery(
						    'SELECT J, U, C, S, L
						    FROM PDBundle:Caja C
						    INNER JOIN C.juego J
							INNER JOIN C.sucursal S
							INNER JOIN C.libretas L
							INNER JOIN L.tickets T
							INNER JOIN L.vendedor U
							WHERE C.estado not in (:estado)
							ORDER BY U.tipoUsuario'
						);
			$query->setParameter("estado", array('DESHABILITADO', 'ASIGNADO_A_SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);
			$cajas = $query->getResult();

		}

		/*$cajas = $em->createQueryBuilder()
				 ->select('C')
				 ->from('PDBundle:Caja','C')
				 ->innerJoin('C.juego','J')
				 ->innerJoin('C.sucursal','S')
				 ->innerJoin('C.libretas','L')
				 ->innerJoin('L.tickets','T')
				 ->innerJoin('L.vendedor','U')
				 ->where('C.estado not in (:estado)')->setParameter("estado", array('DESHABILITADO', 'ASIGNADO_A_SUPERVISOR'), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY)
				 ->orderBy('J.nombre','ASC')
				 ->addOrderBy('U.tipoUsuario','ASC')
				 ->addOrderBy('S.nombre','ASC')
				 ->getQuery()
				 ->getResult();*/

		//exit(\Doctrine\Common\Util\Debug::dump($qb));

		/*
		$conta = 0;
		foreach($cajas as $caja){
			foreach($caja->getLibretas() as $libreta){
				//foreach ($libreta->getTickets() as $ticket) {
					$conta++;
					echo '<pre>';
						\Doctrine\Common\Util\Debug::dump(
							$conta . ') ' .
							$libreta->getCaja()->getSucursal() . ' ' .
							$libreta->getVendedor()->getTipoUsuario() . ' '.
							$libreta->getCaja()->getJuego() . ' ' .
							$libreta->getPremioAcumulado() . ' ' .
							$libreta->getPrecioAcumulado() . ' ' .
							$libreta->getRaspableGratisAcumulado()
						);
					echo '</pre>';
					
				//}
			}
		}
		exit(\Doctrine\Common\Util\Debug::dump($cajas));
		*/

		$acumulador_fila_premios = 0;
		$acumulador_fila_efectivo = 0;
		$acumulador_fila_total_libretas = 0;

		$acumulador_columna_premios = 0;
		$acumulador_columna_efectivo = 0;
		$acumulador_columna_total_libretas = 0;

		$contador_cajas = 0;
		$contador_libretas = 0;
		$tamano_cajas = sizeof($cajas);
		$tamano_libretas = 0;

		//exit(\Doctrine\Common\Util\Debug::dump($cajas));
		//exit(\Doctrine\Common\Util\Debug::dump(array("1"=>"RED","2"=>"GREEN","3"=>"BLUE")));

		$sucursalActual = "";
		$sucursalAnterior = "";

		$juegoActual = "";
		$juegoAnterior = "";

		$tipoUsuarioActual = "";
		$tipoUsuarioAnterior = "";

		// contadores para PREMIOS
		$contador_premios_gallinita_raspable = 	$contador_premios_gallinita_1 = $contador_premios_gallinita_3 = $contador_premios_gallinita_5 =
												$contador_premios_gallinita_100 = $contador_premios_gallinita_2500 = $contador_premios_gallinita_precio_total = 0;

		$contador_premios_mina_raspable = 	$contador_premios_mina_2 = $contador_premios_mina_5 = $contador_premios_mina_10 =
											$contador_premios_mina_20 = $contador_premios_mina_100 = $contador_premios_mina_7000 = $contador_premios_mina_precio_total = 0;

		$myTable = array();
		$myTablePremioGallina = array();
		$myTablePremioMina = array();
		foreach($cajas as $caja){
			//exit(\Doctrine\Common\Util\Debug::dump("entro a cajas"));
			// La gallinita de la suerte ID = 1
			// La mina de los diamantes ID = 2
			//VENDEDORES
			//VENDEDORES_INDEPENDIENTES
			$contador_cajas++;
			
			$sucursalActual 			= $caja->getSucursal();
			$juegoActual    			= $caja->getJuego();
			$juegoActualPrecioPorTicket = $caja->getJuego()->getPrecioXTicket();

			$tamano_libretas = sizeof($caja->getLibretas());
			//exit(\Doctrine\Common\Util\Debug::dump($caja->getLibretas()));
			foreach($caja->getLibretas() as $libreta){
				$contador_libretas++;
				if($libreta->getVendedor() != null){
					/*
					echo '<pre>';
						\Doctrine\Common\Util\Debug::dump($libreta->getCaja()->getSucursal().' - '.
														  $libreta->getVendedor()->getTipoUsuario().' - '.
														  $libreta->getCaja()->getJuego().' - '.
														  $libreta->getCorrelativo().' - '.
														  $libreta->getVendedor()->getNombre() .' - '.
														  $libreta->getPremioAcumulado() . ' - ' .
														  $libreta->getPrecioAcumulado() . ' - ' .
							                              $libreta->getRaspableGratisAcumulado());
					echo '</pre>';
					*/

					$tipo_vendedor_aux = "";
					$comision = 0;
					if($libreta->getVendedor()->getTipoUsuario() == "VENDEDOR_INDEPENDIENTE"){
						$tipo_vendedor_aux = "Billeteros";
						$comision = 5;
					}else if($libreta->getVendedor()->getTipoUsuario() == "VENDEDOR"){
						$tipo_vendedor_aux = "Vendedores";
						$comision = 0;
					}else{
						$tipo_vendedor_aux = $libreta->getVendedor()->getTipoUsuario();
						$comision = 0;
					}

					$juego_aux = "";
					if($libreta->getCaja()->getJuego()->getId() == 1){$juego_aux = "Gallina";}else if($libreta->getCaja()->getJuego()->getId() == 2){$juego_aux = "Mina";}else{$juego_aux = $libreta->getCaja()->getJuego();}

					$rowId = $libreta->getCaja()->getSucursal()->getId().'-'.$tipo_vendedor_aux.'-'.$libreta->getCaja()->getJuego()->getId();
					
					$numeroTicketsPorJuego = ($libreta->getCaja()->getJuego()->getNumeroTickets() * $libreta->getCaja()->getJuego()->getPrecioXTicket()) - $comision;
					
					$labelSucursalTipoUsuarioJuego = 	$libreta->getCaja()->getSucursal() . ' ' . 
														$tipo_vendedor_aux . ' ' . 
														$juego_aux;

					$tipoUsuarioActual  = $libreta->getVendedor()->getTipoUsuario();

					
					if($juegoAnterior == "" && $sucursalAnterior == "" && $tipoUsuarioAnterior == ""){
						//formato a registrar: Sucursal - TipoUsuario(Vendedores o Billeteros) - Juego
						$row = array("sucursal_tipoVendedor_juego"=>$labelSucursalTipoUsuarioJuego, 1=>0, 2=>0, 3=>0);
						$myTable[$rowId] = $row;
						
						$acumulador_fila_premios 	=	$acumulador_fila_premios+$libreta->getPremioAcumulado()+$libreta->getRaspableGratisAcumulado();
						$acumulador_fila_efectivo 	+=	$libreta->getPrecioAcumulado();

						$acumulador_fila_total_libretas = $acumulador_fila_total_libretas + 
														  (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);

						$myTable[$rowId][1] = $acumulador_fila_premios;
						$myTable[$rowId][2] = $acumulador_fila_efectivo;
						$myTable[$rowId][3] = $acumulador_fila_total_libretas;

						$acumulador_columna_premios = $acumulador_columna_premios+$libreta->getPremioAcumulado()+$libreta->getRaspableGratisAcumulado();
						$acumulador_columna_efectivo += $libreta->getPrecioAcumulado();
						//$acumulador_columna_total_libretas = $libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $acumulador_columna_total_libretas;
						$acumulador_columna_total_libretas = $acumulador_columna_total_libretas + 
															 (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);
						/*echo '<pre>';
						\Doctrine\Common\Util\Debug::dump($contador_libretas .') '.$acumulador_fila_total_libretas .' - '. $acumulador_columna_total_libretas);
						echo '</pre>';*/
					}else{
					
						if($sucursalActual != $sucursalAnterior OR $tipoUsuarioActual != $tipoUsuarioAnterior OR $juegoActual != $juegoAnterior){
							$acumulador_fila_premios = 0;
							$acumulador_fila_efectivo = 0;
							$acumulador_fila_total_libretas = 0;
							$row = array("sucursal_tipoVendedor_juego"=>$labelSucursalTipoUsuarioJuego, 1=>0, 2=>0, 3=>0);
							$myTable[$rowId] = $row;
							
							$acumulador_fila_premios 	=	$acumulador_fila_premios + $libreta->getPremioAcumulado() + $libreta->getRaspableGratisAcumulado();
							$acumulador_fila_efectivo 	+=	$libreta->getPrecioAcumulado();
							//$acumulador_fila_total_libretas = ($acumulador_fila_premios + $acumulador_fila_efectivo) / $numeroTicketsPorJuego;
							$acumulador_fila_total_libretas = $acumulador_fila_total_libretas + 
															  (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado()  + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);

							$myTable[$rowId][1] = $acumulador_fila_premios;
							$myTable[$rowId][2] = $acumulador_fila_efectivo;
							$myTable[$rowId][3] = $acumulador_fila_total_libretas;

							$acumulador_columna_premios = $acumulador_columna_premios + $libreta->getPremioAcumulado() + $libreta->getRaspableGratisAcumulado();
							$acumulador_columna_efectivo += $libreta->getPrecioAcumulado();
							//$acumulador_columna_total_libretas = $libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $acumulador_columna_total_libretas;
							$acumulador_columna_total_libretas = $acumulador_columna_total_libretas + 
																 (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);
							/*echo '<pre>';
							\Doctrine\Common\Util\Debug::dump($contador_libretas .') '.$acumulador_fila_total_libretas .' - '. $acumulador_columna_total_libretas);
							echo '</pre>';*/
						}else{

							if($sucursalActual == $sucursalAnterior AND $tipoUsuarioActual == $tipoUsuarioAnterior AND $juegoActual == $juegoAnterior){
								
								$acumulador_fila_premios 	=	$acumulador_fila_premios + $libreta->getPremioAcumulado() + $libreta->getRaspableGratisAcumulado();
								$acumulador_fila_efectivo 	+=	$libreta->getPrecioAcumulado();
								//$acumulador_fila_total_libretas = ($acumulador_fila_premios + $acumulador_fila_efectivo) / $numeroTicketsPorJuego;
								$acumulador_fila_total_libretas = $acumulador_fila_total_libretas + 
																  (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);

								$myTable[$rowId][1] = $acumulador_fila_premios;
								$myTable[$rowId][2] = $acumulador_fila_efectivo;
								$myTable[$rowId][3] = $acumulador_fila_total_libretas;

								$acumulador_columna_premios = $acumulador_columna_premios + $libreta->getPremioAcumulado() + $libreta->getRaspableGratisAcumulado();
								$acumulador_columna_efectivo += $libreta->getPrecioAcumulado();
								//$acumulador_columna_total_libretas = $libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $acumulador_columna_total_libretas;
								$acumulador_columna_total_libretas = $acumulador_columna_total_libretas + 
																	 (($libreta->getPremioAcumulado() + $libreta->getPrecioAcumulado() + $libreta->getRaspableGratisAcumulado()) / $numeroTicketsPorJuego);
								/*echo '<pre>';
								\Doctrine\Common\Util\Debug::dump($contador_libretas .') '.$acumulador_fila_total_libretas .' - '. $acumulador_columna_total_libretas);
								echo '</pre>';*/
								//if($contador_libretas == 2){exit(\Doctrine\Common\Util\Debug::dump($acumulador_columna_total_libretas));}
							}
						}
					}

					//exit(\Doctrine\Common\Util\Debug::dump($myTable));
					//if($contador_libretas == 11){exit(\Doctrine\Common\Util\Debug::dump($acumulador_columna_total_libretas));}

					/* --------------------------------------------------------------------------------------------------- */
					/* --------------------------------------------------------------------------------------------------- */
					/* ---------------------------------- INICIO DETALLE DE PREMIOS -------------------------------------- */
					/* --------------------------------------------------------------------------------------------------- */
					/* --------------------------------------------------------------------------------------------------- */
					foreach($libreta->getTickets() as $ticket){
						/*echo '<pre>';
							\Doctrine\Common\Util\Debug::dump($ticket);
						echo '</pre>';*/
						$i = $ticket->getPremio();
						if($juegoActual == "La gallinita de la suerte"){
							    if($i == "RASPABLE_GRATIS"){
							        $contador_premios_gallinita_raspable++;
							    }else if($i == "1"){
							        $contador_premios_gallinita_1++;
							    }else if($i == "3"){
							        $contador_premios_gallinita_3++;
							    }else if($i == "5"){
							        $contador_premios_gallinita_5++;
							    }else if($i == "100"){
							        $contador_premios_gallinita_100++;
								}else if($i == "2500"){
							        $contador_premios_gallinita_2500++;
							    }
						}else if($juegoActual == "La mina de los diamantes"){
								if($i == "RASPABLE_GRATIS"){
								        $contador_premios_mina_raspable++;
								}else if($i == "2"){
								        $contador_premios_mina_2++;
								}else if($i == "5"){
								        $contador_premios_mina_5++;
								}else if($i == "10"){
								        $contador_premios_mina_10++;
								}else if($i == "20"){
								        $contador_premios_mina_20++;
								}else if($i == "100"){
								        $contador_premios_mina_100++;
								}else if($i == "7000"){
								        $contador_premios_mina_7000++;
								}
						}
					}
					/* ---------------------------------- FIN DETALLE PREMIOS -------------------------------------------- */
				}
				
				$juegoAnterior 			= $libreta->getCaja()->getJuego();
				$tipoUsuarioAnterior 	= $libreta->getVendedor()->getTipoUsuario();
				$sucursalAnterior		= $libreta->getCaja()->getSucursal();
			}//fin foreach libretas
			
			//exit(\Doctrine\Common\Util\Debug::dump($contador_libretas));
			//$juegoAnterior = $caja->getJuego();
		}//fin foreach cajas

		$row = array("sucursal_tipoVendedor_juego"=>"Totales", 1=>0, 2=>0, 3=>0);
		$myTable["Totales"] = $row;
		$myTable["Totales"][1] = $acumulador_columna_premios;
		$myTable["Totales"][2] = $acumulador_columna_efectivo;
		$myTable["Totales"][3] = $acumulador_columna_total_libretas;

		/* --------------------------------------------------------------------------------------------------- */
		/* --------------------------------------------------------------------------------------------------- */
		/* ---------------------------------- INICIO DETALLE DE PREMIOS -------------------------------------- */
		/* --------------------------------------------------------------------------------------------------- */
		/* --------------------------------------------------------------------------------------------------- */
		// PREMIOS GALLINA
		$contador_premios_gallinita_cantidad_total = 	$contador_premios_gallinita_raspable + $contador_premios_gallinita_1  + $contador_premios_gallinita_3 + 
														$contador_premios_gallinita_5 + $contador_premios_gallinita_100 + $contador_premios_gallinita_2500;

		$rowId = "RASPABLE GRATIS";
		// 1 = Cantiddad, 2 = Valor, 3 = Total
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

							
		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_raspable;
		$contador_premios_gallinita_raspable = $contador_premios_gallinita_raspable * 0.5;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_raspable;
		$myTablePremioGallina[$rowId][3] = "RASPABLE GRATIS";

		$rowId = "$1.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_1;
		$contador_premios_gallinita_1 = $contador_premios_gallinita_1;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_1;
		$myTablePremioGallina[$rowId][3] = "$1.00";
		
		$rowId = "$3.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_3;
		$contador_premios_gallinita_3 = $contador_premios_gallinita_3 * 3;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_3;
		$myTablePremioGallina[$rowId][3] = "$3.00";
		
		$rowId = "$5.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_5;
		$contador_premios_gallinita_5 = $contador_premios_gallinita_5 * 5;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_5;
		$myTablePremioGallina[$rowId][3] = "$5.00";

		$rowId = "$100.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_100;
		$contador_premios_gallinita_100 = $contador_premios_gallinita_100 * 100;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_100;
		$myTablePremioGallina[$rowId][3] = "$100.00";

		$rowId = "$2500.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_2500;
		$contador_premios_gallinita_2500 = $contador_premios_gallinita_2500 * 2500;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_2500;
		$myTablePremioGallina[$rowId][3] = "$2500.00";

		$rowId = "Totales";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioGallina[$rowId] = $row;

		$myTablePremioGallina[$rowId][1] = $contador_premios_gallinita_cantidad_total;
		$contador_premios_gallinita_precio_total =	$contador_premios_gallinita_raspable + $contador_premios_gallinita_1 + $contador_premios_gallinita_3 +
													$contador_premios_gallinita_5 + $contador_premios_gallinita_100 + $contador_premios_gallinita_2500;
		$myTablePremioGallina[$rowId][2] = $contador_premios_gallinita_precio_total;
		$myTablePremioGallina[$rowId][3] = "TOTALES";

		// PREMIOS MINA
		$contador_premios_mina_cantidad_total = 	$contador_premios_mina_raspable + $contador_premios_mina_2  + $contador_premios_mina_5 + 
													$contador_premios_mina_10 + $contador_premios_mina_20 + 
													$contador_premios_mina_100 + $contador_premios_mina_7000;

		$rowId = "RASPABLE GRATIS";
		// 1 = Cantiddad, 2 = Valor, 3 = Total
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		
		$myTablePremioMina[$rowId][1] = $contador_premios_mina_raspable;
		$contador_premios_mina_raspable = $contador_premios_mina_raspable;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_raspable;
		$myTablePremioMina[$rowId][3] = "RASPABLE GRATIS";

		$rowId = "$2.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_2;
		$contador_premios_mina_2 = $contador_premios_mina_2 * 2;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_2;
		$myTablePremioMina[$rowId][3] = "$2.00";
		
		$rowId = "$5.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_5;
		$contador_premios_mina_5 = $contador_premios_mina_5 * 5;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_5;
		$myTablePremioMina[$rowId][3] = "$5.00";

		$rowId = "10.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_10;
		$contador_premios_mina_10 = $contador_premios_mina_5 * 10;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_10;
		$myTablePremioMina[$rowId][3] = "$10.00";

		$rowId = "$20.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_20;
		$contador_premios_mina_20 = $contador_premios_mina_100 * 20;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_20;
		$myTablePremioMina[$rowId][3] = "$20.00";

		$rowId = "$100.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_100;
		$contador_premios_mina_100 = $contador_premios_mina_100 * 100;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_100;
		$myTablePremioMina[$rowId][3] = "$100.00";

		$rowId = "$7000.00";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_7000;
		$contador_premios_mina_7000 = $contador_premios_mina_7000 * 7000;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_7000;
		$myTablePremioMina[$rowId][3] = "$7000.00";

		$rowId = "Totales";
		// VALOR array( 2 = Valor, 3 = Total)
		$row = array(1=>0, 2=>0);
		$myTablePremioMina[$rowId] = $row;

		$myTablePremioMina[$rowId][1] = $contador_premios_mina_cantidad_total;
		$contador_premios_mina_precio_total =	$contador_premios_mina_raspable + $contador_premios_mina_2 + $contador_premios_mina_5 +
												$contador_premios_mina_10 + $contador_premios_mina_20 + $contador_premios_mina_100 + $contador_premios_mina_7000;
		$myTablePremioMina[$rowId][2] = $contador_premios_mina_precio_total;
		$myTablePremioMina[$rowId][3] = "TOTALES";
		/* ---------------------------------- FIN DETALLE PREMIOS -------------------------------------------- */

		/*
		echo '<pre>';
			\Doctrine\Common\Util\Debug::dump(array($myTable, $myTablePremioGallina, $myTablePremioMina), 5);
		echo '</pre>';
		
		exit(var_dump($myTablePremioGallina));
		*/

		return array($myTable, $myTablePremioGallina, $myTablePremioMina);
	}


}