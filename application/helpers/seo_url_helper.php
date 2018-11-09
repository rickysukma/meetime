<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('seo_url'))
{
  /**
   * Fungsi seo_url
   *
   * @access	public
   * @param	
   * $string = nama input string yang akan di buat SEO URL
   * @return string
   */
	function seo_url($string)
	{
		$and = array('&');
		$res = str_replace($and, 'and', trim($string));
		$c = array(' ','-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','*','=','?','+');
		$string1 = strtolower(str_replace($c, '-', $res));
		return $string1; 
	}
}