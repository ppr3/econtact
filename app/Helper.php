<?php namespace App;

class Helper {
    
    public static function dayslist()
	{
		$days[] = '';;
		for ($i=1; $i < 32; $i++) { 
			if($i <10)
				$days['0'.$i] = '0'.$i;
			else
				$days[''.$i] = ''.$i;
		}
		return $days;
	}

	public static function monthslist()
	{
		$month = array('00'=>'','01'=>"มกราคม",'02'=> "กุมภาพันธ์", '03'=>"มีนาคม", '04'=>"เมษายน", '05'=>"พฤษภาคม", '06'=>"มิถุนายน", '07'=>"กรกฎาคม", '08'=>"สิงหาคม", '09'=>"กันยายน",'10'=> "ตุลาคม",'11'=> "พฤศจิกายน", '12'=>"ธันวาคม");
		//$month = array('0'=>'','1'=>"ม.ค.",'2'=> "ก.พ.", '3'=>"มี.ค.", '4'=>"เม.ย.", '5'=>"พ.ค.", '6'=>"มิ.ย.", '7'=>"ก.ค.", '8'=>"ส.ค.", '9'=>"ก.ย.",'10'=> "ต.ค.",'11'=> "พ.ย.", '12'=>"ธ.ค.");
		return $month;
	}

	public static function yearreportlist(){
		return array('2016'=>'2559','2017' => '2560','2018' => '2561','2019' => '2562');
	}

	public static function yearslist()
	{
		$year[] = '';
		/*
		for ($i=2495; $i < (date('Y')+543)+1; $i++) { 
			$year[$i] = $i;
		}
		*/

		for ($i=2016; $i < date('Y')+5; $i++) { 
			$year[$i] = $i+543;
		}
		return $year;
	}

	public static function createdate($d,$m,$y){
		if(empty($y)==false && empty($m)==false && empty($d)==false) {
			$yeardiff = strval($y-543);
			return date('Y-m-d',strtotime($d.'-'.$m.'-'.$yeardiff));
		}
		else
			return \DB::raw('0000-00-00');
	}

	public static function getdatearray($date){
		if(empty($date)==false){
			$datearray = explode("-", $date);
			if(intval($datearray[0]) <> 0){
				$datearray[0] = intval($datearray[0])+543;
			}
			else{
				$datearray[0] = '';
			}
			return $datearray;
		}
		else
			return explode("-", '0000-00-00');
	}

	public static function getFormatDate($date){
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
	    {
	        //$datenew = date_format(date_create($date), 'd/m/Y');
	        $datenew = Helper::getdatearray($date);
	        return $datenew[2].'/'.$datenew[1].'/'.$datenew[0];
	    }else{
	        return '';
	    }
	}

	public static function getDateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	public static function getFormatCityZenID($cityzen_id){
		return $cityzen_id;
	}

	public static function getMoneyFormat($money){
		return number_format($money , 2);
	}



}