package oopcogrammer;

public class Teacher {

    //  Declaring of class variables with an privata access modifyier.
    private String name;
    private String surname;
    private String teachingSubject;
    private int age;
    private int yearsOfService;

    // Defining user defined constructor.
    public Teacher(String name, String surname, String teachingSubject, int age, int yearsOfService) {
        this.name = name;
        this.surname = surname;
        this.teachingSubject = teachingSubject;
        this.age = age;
        this.yearsOfService = yearsOfService;
    }

    // Defining the getter.
    public String getName() {
        return name;
    }

    public String getSurname() {
        return surname;
    }

    public String getTeachingSubject() {
        return teachingSubject;
    }

    public int getAge() {
        return age;
    }

    public int getYearsOfService() {
        return yearsOfService;
    }

    // Overiding the toString Method.
    @Override
    public String toString() {
        return "Teacher \n name : " + name + "\n surname : " + surname + "\n teachingSubject : " + teachingSubject + "\n age : "
                + age + "\n yearsOfService : " + yearsOfService + "\n";
    }
}
