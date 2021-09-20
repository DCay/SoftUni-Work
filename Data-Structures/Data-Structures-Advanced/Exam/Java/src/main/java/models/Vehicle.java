package models;

public class Vehicle {

    private String id;

    private String brand;

    private String model;

    private String location;

    private String color;

    private int horsepower;

    private double price;

    private boolean isVIP;

    public Vehicle(String id, String brand, String model, String location, String color, int horsepower, double price, boolean isVIP) {
        this.id = id;
        this.brand = brand;
        this.model = model;
        this.location = location;
        this.color = color;
        this.horsepower = horsepower;
        this.price = price;
        this.isVIP = isVIP;
    }

    public String getId() {
        return this.id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getBrand() {
        return this.brand;
    }

    public void setBrand(String brand) {
        this.brand = brand;
    }

    public String getModel() {
        return this.model;
    }

    public void setModel(String model) {
        this.model = model;
    }

    public String getLocation() {
        return this.location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public String getColor() {
        return this.color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public int getHorsepower() {
        return this.horsepower;
    }

    public void setHorsepower(int horsepower) {
        this.horsepower = horsepower;
    }

    public double getPrice() {
        return this.price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public boolean getIsVIP() {
        return this.isVIP;
    }

    public void setIsVIP(boolean VIP) {
        this.isVIP = VIP;
    }
}
