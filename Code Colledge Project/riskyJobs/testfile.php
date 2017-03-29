<?php 


    class phoneNumber {
        
        private $phoneno;
        
            function __construct($phoneno) {
                $this->phoneno = $phoneno;
            }
        
            
     function phoneNumberValidation(){
         
         $rexex = '/^\(?[0-9]\d{2}\)?[\W]\d{4}?[\W]\d{3}$/';
         $results = preg_match($rexex, $this->phoneno);
         return $results;
         
     }
    }

    $test = new phoneNumber('(083)-3820-99');
    $resluts = $test->phoneNumberValidation();
    
    echo $resluts;



?>
