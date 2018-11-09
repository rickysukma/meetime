<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('resize_img'))
{
  /**
   * Fungsi resize_img
   *
   * @access	public
   * @param	
   		$file_name = nama input file dari form
		$path = tempat menaruh file
		$thumnail = ukuran image terkecil
   * @return string
   */
	function resize_img($file_name,$path,$width=100)
	{
		$CI =& get_instance();
		$config['upload_path'] = $path.'/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = '1000';
		$config['max_size']	= '3500';
		$config['max_width'] = '3000';
		$config['encrypt_name'] = TRUE;
		$CI->load->library('upload', $config);
		$CI->upload->initialize($config);
		if ($CI->upload->do_upload($file_name)){
			$data = $CI->upload->data(); 
			/* PATH */
			
			$source             = $path.$data['file_name'] ;
			$destination		= $path;
	
			// Permission Configuration
			@chmod($source, 0777) ;
	
			/* Resizing Processing */
			// Configuration Of Image Manipulation :: Static
			$CI->load->library('image_lib') ;
			$img['image_library'] = 'GD2';
			$img['create_thumb']  = TRUE;
			$img['maintain_ratio']= TRUE;
	
			/// Limit Width Resize
			$limit_medium   = $width;
	
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
	
			// Percentase Resize
			if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
				$percent_medium = $limit_medium/$limit_use ;
			}
	
	
			// Configuration Of Image Manipulation :: Dynamic
			//$img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
			$img['thumb_marker'] = '';
			$img['quality']      = '100%' ;
			$img['source_image'] = $source ;
			$img['new_image']    = $destination;
	
			// Do Resizing
			$CI->image_lib->initialize($img);
			$CI->image_lib->resize();
			$CI->image_lib->clear() ;
	
			////// Making MEDIUM /////////////
			$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
			$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
	        if ($data['image_width']>$data['image_height'])
	        	$img['master_dim']='width';
	        if ($data['image_width']<=$data['image_height'])
	        	$img['master_dim']='height';			
	
			// Configuration Of Image Manipulation :: Dynamic
			//$img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
			$img['thumb_marker'] = '';
			$img['quality']      = '100%' ;
			$img['source_image'] = $source ;
			$img['new_image']    = $destination;
	
			// Do Resizing
			$CI->image_lib->initialize($img);
			$CI->image_lib->resize();
			$CI->image_lib->clear() ;
			return array('upload_data'=>$CI->upload->data());
		} else {
			return array('upload_data'=>array('error_msg'=>$CI->upload->display_errors(), 'is_error'=>true));
		}
	}
}