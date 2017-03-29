<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of library
 *
 * @author neil
 */
//require_once '../appvars.php';

class password {
    
    private $password;
    
    function    __construct($password) {
        $this->password =   $password;
        
    }
    function passwordValidation () {
        
        $pattern    =   '$\S*(?=\S{10,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\w])(?=\S*[\W])\S*$';
        
        if (!preg_match($pattern, $this->password)) {
            
        }
        else {
            
            $testpassword   =   $this->password;
            return $testpassword;
        
        }
    }
}

class phone {
    
    private $phone;
    private $replace;
    private $pattern;
    
    function    __construct($pattern,$replace,$phone) {
        $this->phone    =   $phone;
        $this->replace  =   $replace;
        $this->pattern  =   $pattern;
        
    }
    function phoneValidation () {
        
        $pattern    =   '/^\(?[0-9]\d{2}\)?[\W]\d{4}?[\W]\d{3}$/';
        
        if (!preg_match($pattern, $this->phone)) {
            
        }
        else {
            
            $testphone   = preg_replace($this->pattern, $this->replace, $this->phone);
            return $testphone;
        
        }
    }
}
 class captchaPassPhrase {
     
     
     
     function passphrase(){
        
        session_start();
        define('CAPVAR', '8');
        $passphrase ="";
            for ($i = 0;$i<CAPVAR;$i++) {
                $passphrase .= chr(rand(97, 122));
            
            }
            
            
         $_SESSION['pass_phrase'] =   $passphrase;
         $width       =   150   ;
         $height      =   25;
         $red         =   rand(0, 85);
         $green       =   rand(86, 171);
         $blue        =   rand(172, 255);
         
         
            // Setting font file path remeber to change when ever you use it again
            
            $font ='../riskyJobs/Albertsthal Typewriter.ttf';
         
            
            // Create image file
            $image    = imagecreatetruecolor($width, $height);
            
            
            // Creating the random colors for the back ground color text color and graphic control
            
            $bgcolor        =   imagecolorallocate($image, $green, $green, $green);
            $textcolor      =   imagecolorallocate($image, $blue, $red,$green);
            $graphiccollor  =   imagecolorallocate($image, $red, $green, $blue);
            
            // Coloring in of the back ground color
            
            imagefilledrectangle($image, 0, 0, $width, $height, $bgcolor);
            
            // Drawing random lines in the Captha image
                
                for ($i =   0;  $i  <  5;  $i++    ){
                        imageline($image, 0, rand()%$height, $width, rand()%$height, $graphiccollor);
                        
                }
     
            // Drawing pixels threw Captha Image    
                
                for ($i =   0;  $i  < 50;  $i++    ) {
                        imagesetpixel($image, rand()%$width, rand()%$height, $graphiccollor);
                }
        
            // Drwaing the passphrase into the image file  
                        imagettftext($image, 18, 0, 5, $height-5, $textcolor,$font,$passphrase);
                
            // Output image file to temp.png

                        imagepng($image,"../riskyJobs/temp.png");
                        imagedestroy($image);
                        
                       
                       
        } 
    }
       
    
    class draw_Data_Bar_Graph {
            
        private  $width;
        private  $height;
        private  $data;
        private  $max_value;
        private  $filename;
      
//        Setting up the constructor method to accept agruments
        
        function __construct($width, $height, $data, $max_value, $filename) {
            
            $this->width        =   $width;
            $this->height       =   $height;
            $this->data         =   $data;
            $this->max_value    =   $max_value;
            $this->filename     =   $filename;
            
        }
                
        
        function drawGraph(){
            
//          Creating random colors for data bar graph  
            
            $red    =   rand(0,85);
            $green  =   rand(86,171);
            $blue   =   rand(172,255);
            
//          Creating the image where the graph will appear;  
            
            $image = imagecreatetruecolor($this->width, $this->height);
            
//          Setting the back ground color, text color, bar color and border color
            
            $bgcolor            =   imagecolorallocate($image, $green, $blue, $red);
            $textcolor          =   imagecolorallocate($image, $red, $blue, $green);  
            $barcolor           =   imagecolorallocate($image, $blue, $red, $green);
            $bordercolor        =   imagecolorallocate($image, $blue, $red, $green);
            
//            Coloring in the back ground with the random color.
            
            imagefilledrectangle($image, 0, 0, $this->width - 1, $this->height - 1, $bgcolor);
            
//           Draw bars
//             $data  =   6;
             $bar_width = $this->width / (count($this->data)   *   2)  -   1;
             
             for ($i = 0; $i < count($this->data); $i++) {
                imagefilledrectangle($image, ($i * $bar_width * 2) + $bar_width, $this->height,
                    ($i * $bar_width * 2) + ($bar_width * 2), $this->height - (($this->height / $this->max_value) * $this->data[$i][1]), $barcolor);
                        imagestringup($image, 5, ($i * $bar_width * 2) + ($bar_width), $this->height - 5, $this->data[$i][0], $textcolor);
                    }
             
//           Draing Border 
              
            imagerectangle($image, 0, 0, $this->width -1, $this->height - 1, $bordercolor);
        
            
            for ($i = 1; $i <= $this->max_value; $i++) {
              imagestring($image, 5, 0, $this->height - ($i * ($this->height / $this->max_value)), $i, $barcolor);
                }
            
                
                imagepng($image, $this->filename, 5);
                imagedestroy($image);

        }
    }
?>

