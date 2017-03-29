/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package javaapplication5;
import javax.swing.JFrame;
import java.awt.Graphics;
import java.util.Random;



/**
 *
 * @author neil.lemmer
 */
public class JavaApplication5 extends JFrame {
    
    public JavaApplication5(){
        
        setBounds(0, 0, 200, 200);
       setVisible(true);
       
    
    }
    
    public void draw(Graphics canvas){
        
            int i,x,y,x1,y2;
            Random z =  new Random();
            
            for (i=0;i<20;i++){
            
               
                 x   =   z.nextInt(200);
                 y   =   z.nextInt(200);
                 x1  =   z.nextInt(200);
                 y2  =   z.nextInt(200);
                
        
            canvas.drawOval(x, y, x1, y2);
            canvas.fillOval(x, y, x1, y2);
            
           
            
            }
    
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
      
        
        
        
    }
    
}
