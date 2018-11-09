<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('execute_upload'))
{
  /**
   * Fungsi execute_upload
   *
   * @access	public
   * @param	
   		$file_name = nama input file dari form
		$path = tempat menaruh file
		$thumnail = ukuran image terkecil
   * @return string
   */
	function execute_upload($file_name,$path,$thumnail=90,$medium=200,$folderDate=false,$crop=false)
	{
		$CI =& get_instance();
		
		// using folder date 2010.09.16
		if ($folderDate){
			$isFolderDate = $folderDate."/";
			if(!is_dir($path."main/".$isFolderDate)){
				mkdir($path."main/".$isFolderDate, 0755);
			}
			if(!is_dir($path."thumbnail/".$isFolderDate)){
				mkdir($path."thumbnail/".$isFolderDate, 0755);
			}				
		} else {
			$isFolderDate = "";
		}		
		
		$config['upload_path'] = $path.'main/'.$isFolderDate;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = '1000';
		$config['max_size']	= '2500';
		$config['max_width'] = '3000';
		$config['encrypt_name'] = FALSE;
		$CI->load->library('upload', $config);
		$CI->upload->initialize($config);
		if ($CI->upload->do_upload($file_name)){
			$data = $CI->upload->data(); 
			/* PATH */
			
			$source             = $path."main/".$isFolderDate.$data['file_name'] ;
			$destination_thumb	= $path."thumbnail/".$isFolderDate;
			$destination_medium	= $path."main/".$isFolderDate;
	
			// Permission Configuration
			@chmod($source, 0777) ;
	
			/* Resizing Processing */
			// Configuration Of Image Manipulation :: Static
			$CI->load->library('image_lib') ;
			$img['image_library'] = 'GD2';
			$img['create_thumb']  = TRUE;
			$img['maintain_ratio']= TRUE;
	
			/// Limit Width Resize
			$limit_medium   = $medium;
			$limit_thumb    = $thumnail;
	
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
	
			// Percentase Resize
			if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
				$percent_medium = $limit_medium/$limit_use ;
				$percent_thumb  = $limit_thumb/$limit_use ;
			}
		
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
			$img['new_image']    = $destination_medium ;
	
			// Do Resizing
			$CI->image_lib->initialize($img);
			$CI->image_lib->resize();
			$CI->image_lib->clear() ;
			
			

			//// Making THUMBNAIL ///////
			# jika gambar tinggi (lebar > tinggi), maka gunakan tinggi sebagai patokan crop. 
			# ex. 1024 x 683
			$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_height'] : $data['image_width'] ;
			// echo 683
			if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
				$percent_medium = $limit_medium/$limit_use ;
				$percent_thumb  = $limit_thumb/$limit_use ;
			}
			
			$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_height'] ;
			$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_width'] ;
		
	        if ($data['image_width']>$data['image_height']){
	        	$img['master_dim']='height';
				$patokan = "Lebar";
			}
	        if ($data['image_width']<=$data['image_height']){
	        	$img['master_dim']='width';
				$patokan = "Tinggi";
			}
			
			
			
			// Configuration Of Image Manipulation :: Dynamic
			//$img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
			$img['thumb_marker'] = '';
			$img['quality']      = '100%' ;
			$img['source_image'] = $source ;
			$img['new_image']    = $destination_thumb ;
	
			// Do Resizing
			$CI->image_lib->initialize($img);
			$CI->image_lib->resize();
			$CI->image_lib->clear() ;
			
			//exit;
			
			//$imageName = $this->image_lib->explode_name($item->item_data['file_name']);
			//print_r($imageName);
												
	
			
			crop($path."thumbnail/".$isFolderDate.$data['file_name'], $thumnail);
			
			
			
			return array('upload_data'=>$CI->upload->data());
		} else {
			return array('upload_data'=>array('error_msg'=>$CI->upload->display_errors(), 'is_error'=>true));
		}
	}
	
	
	function crop($img_path_real, $thumb_sizes){
		$CI =& get_instance();
		
		$img_path = $img_path_real;
		$img_thumb = $img_path_real;
	
		$config['image_library'] = 'gd2';
		$config['source_image'] = $img_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
	
		$img = imagecreatefromjpeg($img_path);
		
		$_width = imagesx($img);
		$_height = imagesy($img);
	
		$img_type = '';
		$thumb_size = $thumb_sizes;
	
		if ($_width > $_height)
		{
			// wide image
			$config['width'] = intval(($_width / $_height) * $thumb_size);
			if ($config['width'] % 2 != 0)
			{
				$config['width']++;
			}
			$config['height'] = $thumb_size;
			$img_type = 'wide';
		}
		else if ($_width < $_height)
		{
			// landscape image
			$config['width'] = $thumb_size;
			$config['height'] = intval(($_height / $_width) * $thumb_size);
			if ($config['height'] % 2 != 0)
			{
				$config['height']++;
			}
			$img_type = 'landscape';
		}
		else
		{
			// square image
			$config['width'] = $thumb_size;
			$config['height'] = $thumb_size;
			$img_type = 'square';
		}
	
		$CI->load->library('image_lib');
		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
	
		// reconfigure the image lib for cropping
		$conf_new = array(
			'image_library' => 'gd2',
			'source_image' => $img_thumb,
			'create_thumb' => FALSE,
			'maintain_ratio' => FALSE,
			'width' => $thumb_size,
			'height' => $thumb_size
		);
	
		if ($img_type == 'wide')
		{
			$conf_new['x_axis'] = ($config['width'] - $thumb_size) / 2 ;
			$conf_new['y_axis'] = 0;
		}
		else if($img_type == 'landscape')
		{
			$conf_new['x_axis'] = 0;
			$conf_new['y_axis'] = ($config['height'] - $thumb_size) / 2;
		}
		else
		{
			$conf_new['x_axis'] = 0;
			$conf_new['y_axis'] = 0;
		}
	
		$CI->image_lib->initialize($conf_new);
	
		$CI->image_lib->crop();
	}
}

