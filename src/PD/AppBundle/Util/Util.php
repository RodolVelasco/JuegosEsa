<?php

namespace PD\AppBundle\Util;

class Util
{
	static public function getSlug($cadena, $separador = '-')
	{
		// Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
		$slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
		$slug = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $slug);
		$slug = strtolower(trim($slug, $separador));
		$slug = preg_replace("/[\/_|+ -]+/", $separador, $slug);
		
		return $slug;
	}
	
	static public function getRandMd5($length) {
		$max = ceil($length / 32);
		$random = '';
		for ($i = 0; $i < $max; $i ++) {
			$random .= md5(microtime(true).mt_rand(10000,90000));
		}
	  	return substr($random, 0, $length);
	}
}
