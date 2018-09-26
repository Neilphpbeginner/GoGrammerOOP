package oopcogrammer;

public class Secretary {

    //  Declaring of class variables with an privata access modifyier.
    private String name;
    private String surname;
    private int age;
    private int yearsOfService;
    private String bestSkill;

    // Defining user defined constructor.
    public Secretary(String name, String surname, int age, int yearsOfService, String bestSkill) {
        this.name = name;
        this.surname = surname;
        this.age = age;
        this.yearsOfService = yearsOfService;
        this.bestSkill = bestSkill;
    }

    // Defining the getter.
    public String getName() {
        return name;
    }

    public String getSurname() {
        return surname;
    }

    public int getAge() {
        return age;
    }

    public int getYearsOfService() {
        return yearsOfService;
    }

    public String getBestSkill() {
        return bestSkill;
    }

    // Overiding the toString Method.
    @Override
    public String toString() {
        return "Secretary \n name : " + name + "\n surname : " + surname + "\n age : " + age + "\n yearsOfService : "
                + yearsOfService + "\n bestSkill : " + bestSkill + "\n";
    }
}
