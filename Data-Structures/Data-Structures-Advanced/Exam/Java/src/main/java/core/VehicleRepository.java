package core;

import models.Vehicle;

import java.util.List;
import java.util.Map;

public interface VehicleRepository {
    void addVehicleForSale(Vehicle vehicle, String sellerName);

    void removeVehicle(String vehicleId);

    int size();

    boolean contains(Vehicle vehicle);

    Iterable<Vehicle> getVehicles(List<String> keywords);

    Iterable<Vehicle> getVehiclesBySeller(String sellerName);

    Iterable<Vehicle> getVehiclesInPriceRange(double lowerBound, double upperBound);

    Map<String, List<Vehicle>> getAllVehiclesGroupedByBrand();

    Iterable<Vehicle> getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName();

    Vehicle buyCheapestFromSeller(String sellerName);
}
