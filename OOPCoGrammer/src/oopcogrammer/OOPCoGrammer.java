/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package oopcogrammer;

public class OOPCoGrammer {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
//  Creating a intstance of the class Secretary
        Secretary secretary = new Secretary("Sally", "Wally", 35, 4, "Typing");
//  Creating a intstance of the class Teacher
        Teacher teacher = new Teacher("Neil", "Lemmer", "Java", 36, 1);

//  Prining of the of toString method on all Objects
        System.out.println(secretary.toString());
        System.out.println(teacher.toString());

    }

}
