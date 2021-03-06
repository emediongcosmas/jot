<?php

class request
{
    static $url = "http://localhost/jot/";

	public static function base() {
		return self::$url;
	}
    
    public static function secureTxt($txt) {
        $txt = htmlentities($txt);
        $txt = stripslashes($txt);
        return $txt;
    }

    public static function securePwd($pwd, $rounds = 9) {

    	$salt = "";
    	$saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    	for ($i=0; $i < 22; $i++) {
    		$salt .= $saltChars[array_rand($saltChars)];
    	}
    	return crypt($pwd, sprintf('$2y$%02d$', $rounds) . $salt);

    }

    public static function hashString($string) {
        $string = sha1($string);
        $string = htmlentities($string);
        $string = stripslashes($string);
        return $string;
    }

    public static function trim($string) {
        return trim(preg_replace('/\s+/', ' ', $string));
    }

    public static function randomString() {
        $rand = rand(100000, 999999);
        return self::hashString($rand);
    }

    public static function slug($text) {
        // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }

    public static function timeago($time_ago) {

        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds  = $time_elapsed ;
        $minutes  = round($time_elapsed / 60 );
        $hours    = round($time_elapsed / 3600);
        $days     = round($time_elapsed / 86400 );
        $weeks    = round($time_elapsed / 604800);
        $months   = round($time_elapsed / 2600640 );
        $years    = round($time_elapsed / 31207680 );
    // Seconds
        if($seconds <= 60){
            echo "$seconds seconds ago";
        }
    //Minutes
        else if($minutes <=60){
            if($minutes==1){
                echo "one minute ago";
            }
            else{
                echo "$minutes minutes ago";
            }
        }
    //Hours
        else if($hours <=24){
            if($hours==1){
                echo "an hour ago";
            }else{
                echo "$hours hours ago";
            }
        }
    //Days
        else if($days <= 7){
            if($days==1){
                echo "yesterday";
            }else{
                echo "$days days ago";
            }
        }
    //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                echo "a week ago";
            }else{
                echo "$weeks weeks ago";
            }
        }
    //Months
        else if($months <=12){
            if($months==1){
                echo "a month ago";
            }else{
                echo "$months months ago";
            }
        }
    //Years
        else{
            if($years==1){
                echo "one year ago";
            }else{
                echo "$years years ago";
            }
        }

    }// TIME AGO METHOD

    public static function data() {
        $method = $GLOBALS['config']['request']['method'];
        $data = array();
        foreach ($GLOBALS['config']['request']['data'] as $key => $value) {
            $d = array($key => self::secureTxt($value));
            $data += $d;
        }
        $request = array("method" => $method, "request" => $data);
        return $request;
    }

    public static function parameters($data, $required) {

        $isOkay = true;
        foreach ($required as $key => $value) {

            if (!array_key_exists($value, $data)) {
                $isOkay = false;
            }
        }

        if ($isOkay) {
            return true;
        }else {

            return false;

        }

    }

    public static function compress($source, $destination, $quality = 40) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		if (imagejpeg($image, $destination, $quality)) {
		    return true;
		}else {
            return false;
        }

	}
    
    public static function chop_string($string, $length) {
        
        if (strlen($string) < $length)
            return $string;
            
        $string = substr($string,0,$length);
        if ($spc_pos = strrpos($string, " "))
            $string = substr($string,0,$spc_pos);
            
        return $string . " ...";
        
    }
}
