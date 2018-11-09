<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('dateIna'))
{
    function dateIna($data, $simple=false, $getMonth=false)
    {
		// day
		$hari = date("D", strtotime($data));
		$haris = array(
					'Mon'=>'Senin',
					'Tue'=>'Selasa',
					'Wed'=>'Rabu',
					'Thu'=>'Kamis',
					'Fri'=>'Jumat',
					'Sat'=>'Sabtu',
					'Sun'=>'Minggu',
				);		
		
        $bulan = substr($data,5,2);
		$bulans = array(
					'01'=>'Januari',
					'02'=>'Februari',
					'03'=>'Maret',
					'04'=>'April',
					'05'=>'Mei',
					'06'=>'Juni',
					'07'=>'Juli',
					'08'=>'Agustus',
					'09'=>'September',
					'10'=>'Oktober',
					'11'=>'November',
					'12'=>'Desember',
		);
		if ($simple){
        	return substr($data,8,2)." ".$bulans[$bulan]." ".substr($data,0,4);
		} elseif ($getMonth){
			return substr($bulans[$bulan], 0, 3);
		} else{
			return $haris[$hari].", ".substr($data,8,2)." ".$bulans[$bulan]." ".substr($data,0,4)." ".substr($data,11,5)." WIB";
		}
    }
}
