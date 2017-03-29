/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function autoRefresh(){
                setTimeout( function (){
                window.location.reload();        
                            },40000);
           }
     
     
     function currentTime (){
         var time = new Date();
         document.getElementById('timestamp').innerHTML=time;
        
         
     }
           
    
