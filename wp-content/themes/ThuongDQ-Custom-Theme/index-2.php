<?php
   $lines = file_get_contents('http://www.alexa.com/siteinfo/wordpress.com');
   
   # lệnh này sẽ đọc toàn bộ nội dung index.htm.
   // echo $lines;

   $subject = "abcdef";
	$pattern = '/^def/';
	preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
	print_r($matches);




	$url='dantri.com.vn';
	$xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url='.$url);
	$rank_global=isset($xml->SD[1]->POPULARITY)?$xml->SD[1]->POPULARITY->attributes()->TEXT:0;
	$rank_country = isset($xml->SD[1]->COUNTRY )?$xml->SD[1]->COUNTRY->attributes()->RANK:0; 
	$web=(string)$xml->SD[0]->attributes()->HOST;
	echo $web." has Alexa Rank :<br>"."Rank Global: ".$rank_global."<br> Rank Country: ".$rank_country;
	echo $xml;	
?>