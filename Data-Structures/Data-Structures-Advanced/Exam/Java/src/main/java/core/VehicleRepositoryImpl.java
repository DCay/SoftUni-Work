package core;

import models.Vehicle;

import java.util.Comparator;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

public class VehicleRepositoryImpl implements VehicleRepository {
    private Map<String, Vehicle> vehiclesById;

    private Map<String, LinkedHashMap<String, Vehicle>> vehiclesBySeller;

    private Map<String, LinkedHashMap<String, Vehicle>> vehiclesByBrand;

    private Map<String, String> sellerByVehicleId;

    public VehicleRepositoryImpl() {
        this.vehiclesById = new LinkedHashMap<String, Vehicle>();
        this.vehiclesBySeller = new LinkedHashMap<String, LinkedHashMap<String, Vehicle>>();
        this.sellerByVehicleId = new LinkedHashMap<String, String>();
        this.vehiclesByBrand = new LinkedHashMap<String, LinkedHashMap<String, Vehicle>>();
    }

    @Override
    public void addVehicleForSale(Vehicle vehicle, String sellerName) {
        this.vehiclesById.put(vehicle.getId(), vehicle);
        this.sellerByVehicleId.put(vehicle.getId(), sellerName);

        if (!this.vehiclesBySeller.containsKey(sellerName)) {
            this.vehiclesBySeller.put(sellerName, new LinkedHashMap<String, Vehicle>());
        }

        if (!this.vehiclesByBrand.containsKey(vehicle.getBrand())) {
            this.vehiclesByBrand.put(vehicle.getBrand(), new LinkedHashMap<String, Vehicle>());
        }

        this.vehiclesByBrand.get(vehicle.getBrand()).put(vehicle.getId(), vehicle);
        this.vehiclesBySeller.get(sellerName).put(vehicle.getId(), vehicle);
    }

    @Override
    public void removeVehicle(String vehicleId) {
        if (!this.vehiclesById.containsKey(vehicleId)) {
            throw new IllegalArgumentException();
        }

        this.vehiclesBySeller.get(this.sellerByVehicleId.get(vehicleId)).remove(vehicleId);
        this.sellerByVehicleId.remove(vehicleId);
        this.vehiclesByBrand.get(this.vehiclesById.get(vehicleId).getBrand()).remove(vehicleId);
        this.vehiclesById.remove(vehicleId);
    }

    @Override
    public int size() {
        return this.vehiclesById.size();
    }

    @Override
    public boolean contains(Vehicle vehicle) {
        return this.vehiclesById.containsKey(vehicle.getId());
    }

    @Override
    public Iterable<Vehicle> getVehicles(List<String> keywords) {
        return this.vehiclesById.values()
                .stream()
                .filter(vehicle -> keywords.contains(vehicle.getBrand())
                        || keywords.contains(vehicle.getModel())
                        || keywords.contains(vehicle.getLocation())
                        || keywords.contains(vehicle.getColor()))
                .sorted((firstVehicle, secondVehicle) -> {
                    int result = Boolean.compare(!firstVehicle.getIsVIP(), !secondVehicle.getIsVIP());

                    if (result == 0) {
                        result = Double.compare(firstVehicle.getPrice(), secondVehicle.getPrice());
                    }

                    return result;
                })
                .collect(Collectors.toList());
    }

    @Override
    public Iterable<Vehicle> getVehiclesBySeller(String sellerName) {
        if (!this.vehiclesBySeller.containsKey(sellerName)) {
            throw new IllegalArgumentException();
        }

        return this.vehiclesBySeller.get(sellerName).values();
    }

    @Override
    public Iterable<Vehicle> getVehiclesInPriceRange(double lowerBound, double upperBound) {
        return this.vehiclesById
                .values()
                .stream()
                .filter(vehicle -> vehicle.getPrice() >= lowerBound && vehicle.getPrice() <= upperBound)
                .sorted((firstVehicle, secondVehicle) -> Integer.compare(secondVehicle.getHorsepower(), firstVehicle.getHorsepower()))
                .collect(Collectors.toList());
    }

    @Override
    public Map<String, List<Vehicle>> getAllVehiclesGroupedByBrand() {
        if (this.size() == 0) {
            throw new IllegalArgumentException();
        }

        return this.vehiclesByBrand
                .entrySet()
                .stream()
                .collect(Collectors.toMap(
                        Map.Entry::getKey,
                        (entry) -> entry.getValue().values()
                                .stream()
                                .sorted(Comparator.comparingDouble(Vehicle::getPrice))
                                .collect(Collectors.toList())
                ));
    }

    @Override
    public Iterable<Vehicle> getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName() {
        return this.vehiclesById
                .values()
                .stream()
                .sorted((firstVehicle, secondVehicle) -> {
                    int result = Integer.compare(secondVehicle.getHorsepower(), firstVehicle.getHorsepower());

                    if (result == 0) {
                        result = Double.compare(firstVehicle.getPrice(), secondVehicle.getPrice());
                    }

                    if (result == 0) {
                        result = this.sellerByVehicleId.get(firstVehicle.getId()).compareTo(this.sellerByVehicleId.get(secondVehicle.getId()));
                    }

                    return result;
                })
                .collect(Collectors.toList());
    }

    @Override
    public Vehicle buyCheapestFromSeller(String sellerName) {
        if(!this.vehiclesBySeller.containsKey(sellerName))
        {
            throw new IllegalArgumentException();
        }

        Vehicle cheapestVehicle = this.vehiclesBySeller.get(sellerName).values()
                .stream()
                .min(Comparator.comparingDouble(Vehicle::getPrice))
                .orElse(null);

        this.removeVehicle(cheapestVehicle.getId());

        return cheapestVehicle;
    }
}
