import core.*;

import models.Vehicle;
import core.VehicleRepository;
import org.junit.Before;
import org.junit.Test;

import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;
import java.util.stream.StreamSupport;

import static org.junit.Assert.*;

public class VehicleRepositoryTests {
    private interface InternalTest {
        void execute();
    }

    private VehicleRepository vehicleRepository;

    @Before
    public void setup() {
        this.vehicleRepository = new VehicleRepositoryImpl();
    }

    public void performCorrectnessTesting(InternalTest[] methods) {
        Arrays.stream(methods)
                .forEach(method -> {
                    this.vehicleRepository = new VehicleRepositoryImpl();

                    try {
                        method.execute();
                    } catch (IllegalArgumentException ignored) { }
                });

        this.vehicleRepository = new VehicleRepositoryImpl();
    }

    // Correctness Tests

    @Test
    public void testAddVehicle_WithCorrectData_ShouldCorrectlyAddVehicle() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        assertTrue(this.vehicleRepository.contains(vehicle));
    }

    @Test
    public void testAddVehicle_WithCorrectData_ShouldCorrectlyIncrementCount() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        assertEquals(1, this.vehicleRepository.size());
    }

    @Test
    public void testContains_WithExistentVehicle_ShouldReturnTrue() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        assertTrue(this.vehicleRepository.contains(vehicle));
    }

    @Test
    public void testContains_WithNonexistentVehicle_ShouldReturnFalse() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        assertFalse(this.vehicleRepository.contains(vehicle2));
    }

    @Test
    public void testGetVehiclesBySeller_WithExistentSeller_ShouldReturnCorrectData() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.addVehicleForSale(vehicle2, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        List<Vehicle> sellerVehicles = StreamSupport.stream(this.vehicleRepository.getVehiclesBySeller("George").spliterator(), false)
                .collect(Collectors.toList());

        assertEquals(2, sellerVehicles.size());
        assertEquals(vehicle2, sellerVehicles.get(0));
        assertEquals(vehicle, sellerVehicles.get(1));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetVehiclesBySeller_WithNonexistentSeller_ShouldThrowException() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.addVehicleForSale(vehicle2, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        this.vehicleRepository.getVehiclesBySeller("JohnDoe");
    }

    @Test
    public void testGetVehiclesInRange_WithVehiclesInRange_ShouldReturnCorrectlyOrderedData() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "BMW3", "X523", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.addVehicleForSale(vehicle3, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "George");

        List<Vehicle> vehiclesInRange = StreamSupport.stream(this.vehicleRepository.getVehiclesInPriceRange(50001, 70000).spliterator(), false)
                .collect(Collectors.toList());

        assertEquals(2, vehiclesInRange.size());
        assertEquals(vehicle2, vehiclesInRange.get(0));
        assertEquals(vehicle3, vehiclesInRange.get(1));
    }

    @Test
    public void testGetVehiclesInRange_WithNoVehiclesInRange_ShouldReturnEmptyCollection() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "BMW3", "X523", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.addVehicleForSale(vehicle3, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "George");

        List<Vehicle> vehiclesInRange = StreamSupport.stream(this.vehicleRepository.getVehiclesInPriceRange(505001, 705000).spliterator(), false)
                .collect(Collectors.toList());

        assertEquals(0, vehiclesInRange.size());
    }

    @Test
    public void testGetVehiclesByBrand_WithVehicles_ShouldReturnCorrectlyOrderedData() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.addVehicleForSale(vehicle3, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        Map<String, List<Vehicle>> vehiclesByBrand = this.vehicleRepository.getAllVehiclesGroupedByBrand();

        assertEquals(2, vehiclesByBrand.size());

        List<Vehicle> bmws = vehiclesByBrand.get("BMW");
        List<Vehicle> audis = vehiclesByBrand.get("Audi");

        assertEquals(vehicle, bmws.get(0));
        assertEquals(vehicle2, bmws.get(1));
        assertEquals(vehicle3, audis.get(0));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetVehiclesByBrand_WithNoVehicles_ShouldThrowException() {
        this.vehicleRepository.getAllVehiclesGroupedByBrand();
    }

    @Test
    public void testRemoveVehicle_WithExistentVehicle_ShouldCorrectlyRemoveVehicle() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.addVehicleForSale(vehicle3, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        this.vehicleRepository.removeVehicle(1 + "");

        assertEquals(2, this.vehicleRepository.size());

        assertFalse(this.vehicleRepository.contains(vehicle));

        assertEquals(2, StreamSupport.stream(this.vehicleRepository.getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().spliterator(), false).count());
        assertEquals(2, StreamSupport.stream(this.vehicleRepository.getVehiclesBySeller("George").spliterator(), false).count());
        assertEquals(0, StreamSupport.stream(this.vehicleRepository.getVehiclesInPriceRange(45000, 55000).spliterator(), false).count());
        assertEquals(1, this.vehicleRepository.getAllVehiclesGroupedByBrand().get("BMW").size());
    }

    @Test(expected = IllegalArgumentException.class)
    public void testRemoveVehicle_WithNonexistentVehicle_ShouldThrowException() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.addVehicleForSale(vehicle3, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "George");
        this.vehicleRepository.addVehicleForSale(vehicle, "George");

        this.vehicleRepository.removeVehicle("non-existent");
    }

    @Test
    public void testGetVehiclesOrdered_WithExistentVehicles_ShouldCorrectlyOrderedVehicles() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Sofia3", "Blue3", 500, 88000, false);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Sofia3", "Blue3", 500, 61000, false);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle3, "Phill");
        this.vehicleRepository.addVehicleForSale(vehicle4, "Isacc");
        this.vehicleRepository.addVehicleForSale(vehicle5, "Igor");

        List<Vehicle> orderedVehicles = StreamSupport.stream(this.vehicleRepository.getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().spliterator(), false)
                .collect(Collectors.toList());

        assertEquals(5, orderedVehicles.size());

        assertEquals(vehicle5, orderedVehicles.get(0));
        assertEquals(vehicle2, orderedVehicles.get(1));
        assertEquals(vehicle4, orderedVehicles.get(2));
        assertEquals(vehicle, orderedVehicles.get(3));
        assertEquals(vehicle3, orderedVehicles.get(4));
    }

    @Test
    public void testGetVehiclesOrdered_WithNoVehicles_ShouldReturnEmptyCollection() {
        assertEquals(0, StreamSupport.stream(this.vehicleRepository.getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().spliterator(), false)
                .count());
    }

    @Test
    public void testGetVehicles_WithExistentVehicles_ShouldCorrectlyOrderedVehicles() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        Vehicle vehicle7 = new Vehicle(7 + "", "Mercedes-Benz", "C220", "Plovdiv", "Black", 600, 100000, true);
        Vehicle vehicle8 = new Vehicle(8 + "", "Ford", "Mustang", "Plovdiv", "Black", 600, 110000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle3, "Phill");
        this.vehicleRepository.addVehicleForSale(vehicle4, "Isacc");
        this.vehicleRepository.addVehicleForSale(vehicle5, "Igor");
        this.vehicleRepository.addVehicleForSale(vehicle6, "Donald");
        this.vehicleRepository.addVehicleForSale(vehicle7, "John");
        this.vehicleRepository.addVehicleForSale(vehicle8, "Jerry");

        List<Vehicle> vehicles =
                StreamSupport.stream(this.vehicleRepository.getVehicles(List.of("BMW", "Cayenne", "Ruse", "Magenta")).spliterator(), false)
                        .collect(Collectors.toList());

        assertEquals(6, vehicles.size());

        assertEquals(vehicle6, vehicles.get(0));
        assertEquals(vehicle4, vehicles.get(1));
        assertEquals(vehicle, vehicles.get(2));
        assertEquals(vehicle5, vehicles.get(3));
        assertEquals(vehicle2, vehicles.get(4));
        assertEquals(vehicle3, vehicles.get(5));
    }

    @Test
    public void testGetVehicles_WithNoVehicles_ShouldReturnEmptyCollection() {
        assertEquals(0, StreamSupport.stream(this.vehicleRepository.getVehicles(List.of("BMW", "Cayenne", "Ruse", "Magenta")).spliterator(), false)
                .count());
    }

    @Test
    public void testBuyCheapest_WithVehicles_ShouldReturnCorrectVehicle() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 150000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle4, "George");
        this.vehicleRepository.addVehicleForSale(vehicle5, "George");
        this.vehicleRepository.addVehicleForSale(vehicle6, "George");

        Vehicle boughtVehicle = this.vehicleRepository.buyCheapestFromSeller("Jack");

        assertEquals(vehicle3, boughtVehicle);
    }

    @Test
    public void testBuyCheapest_WithVehicles_ShouldCorrectlyRemoveVehicle() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 150000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle4, "George");
        this.vehicleRepository.addVehicleForSale(vehicle5, "George");
        this.vehicleRepository.addVehicleForSale(vehicle6, "George");

        Vehicle boughtVehicle = this.vehicleRepository.buyCheapestFromSeller("Jack");

        assertEquals(5, this.vehicleRepository.size());

        assertFalse(this.vehicleRepository.contains(vehicle3));

        assertEquals(5, StreamSupport.stream(this.vehicleRepository.getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().spliterator(), false)
                .count());
        assertEquals(1, StreamSupport.stream(this.vehicleRepository.getVehiclesBySeller("Jack").spliterator(), false)
                .count());
        assertEquals(0, StreamSupport.stream(this.vehicleRepository.getVehiclesInPriceRange(65000, 70000).spliterator(), false)
                .count());
        assertEquals(2, this.vehicleRepository.getAllVehiclesGroupedByBrand().get("Audi").size());
    }

    @Test(expected = IllegalArgumentException.class)
    public void testBuyCheapest_WithNoVehicle_ShouldThrowException() {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.addVehicleForSale(vehicle, "George");
        this.vehicleRepository.addVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.addVehicleForSale(vehicle4, "George");
        this.vehicleRepository.addVehicleForSale(vehicle5, "George");
        this.vehicleRepository.addVehicleForSale(vehicle6, "George");

        this.vehicleRepository.buyCheapestFromSeller("Donald");
    }

    // Performance Tests

    @Test
    public void testAddVehicle_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testAddVehicle_WithCorrectData_ShouldCorrectlyAddVehicle,
            this::testAddVehicle_WithCorrectData_ShouldCorrectlyIncrementCount
        });

        int count = 100000;

        long start = System.currentTimeMillis();

        for (int i = 0; i < count; i++) {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 300);
    }

    @Test
    public void testContains_With100000Vehicles_ShouldPassInstantly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testContains_WithExistentVehicle_ShouldReturnTrue,
            this::testContains_WithNonexistentVehicle_ShouldReturnFalse
        });

        int count = 100000;

        Vehicle vehicleToContain = null;

        for (int i = 0; i < count; i++) {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);

            if (i == 80000) {
                vehicleToContain = vehicle;
            }

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long start = System.currentTimeMillis();

        this.vehicleRepository.contains(vehicleToContain);

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 1);
    }

    @Test
    public void testGetVehicles_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testGetVehicles_WithExistentVehicles_ShouldCorrectlyOrderedVehicles,
            this::testGetVehicles_WithNoVehicles_ShouldReturnEmptyCollection
        });

        int count = 100000;

        for (int i = count; i >= 0; i--) {
            boolean isVIP = false;

            if (i <= 500) {
                isVIP = true;
            }

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, isVIP);

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long start = System.currentTimeMillis();

        Iterable<Vehicle> vehicles = this.vehicleRepository.getVehicles(List.of("Audi", "A3", "Plovdiv", "Blue"));

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 150);
    }

    @Test
    public void testGetVehiclesBySellerName_With100000Vehicles_ShouldPassNearlyInstantly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testGetVehiclesBySeller_WithExistentSeller_ShouldReturnCorrectData,
            this::testGetVehiclesBySeller_WithNonexistentSeller_ShouldThrowException,
        });

        int count = 100000;

        for (int i = count; i >= 0; i--) {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, true);

            String sellerName = "randomSeller";

            if (i <= 10000) {
                sellerName = "randomSeller10";
            }

            this.vehicleRepository.addVehicleForSale(vehicle, sellerName);
        }

        long start = System.currentTimeMillis();

        Iterable<Vehicle> vehicles = this.vehicleRepository.getVehiclesBySeller("randomSeller");

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 1);
    }

    @Test
    public void testGetVehiclesInRange_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testGetVehiclesInRange_WithVehiclesInRange_ShouldReturnCorrectlyOrderedData,
            this::testGetVehiclesInRange_WithNoVehiclesInRange_ShouldReturnEmptyCollection
        });

        int count = 100000;

        for (int i = count; i >= 0; i--) {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long start = System.currentTimeMillis();
        Iterable<Vehicle> vehicles = this.vehicleRepository.getVehiclesInPriceRange(500000, 750000);

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 50);
    }

    @Test
    public void testGetVehiclesGroupedByBrand_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
                this::testGetVehiclesByBrand_WithVehicles_ShouldReturnCorrectlyOrderedData,
                this::testGetVehiclesByBrand_WithNoVehicles_ShouldThrowException
        });

        int count = 100000;

        for (int i = count; i >= 0; i--) {
            String brand = "BMW";

            if (i <= 10000) {
                brand = "Audi";
            } else if (i <= 30000) {
                brand = "Mercedes";
            } else if (i <= 50000) {
                brand = "Porsche";
            }

            Vehicle vehicle = new Vehicle(i + "", brand, "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long start = System.currentTimeMillis();
        Map<String, List<Vehicle>> resultVehicles = this.vehicleRepository.getAllVehiclesGroupedByBrand();

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 75);
    }

    @Test
    public void TestRemoveVehicle_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testRemoveVehicle_WithExistentVehicle_ShouldCorrectlyRemoveVehicle,
            this::testRemoveVehicle_WithNonexistentVehicle_ShouldThrowException
        });

        int count = 100000;

        for (int i = count; i >= 0; i--) {
            String brand = "BMW";

            if (i <= 10000) {
                brand = "Audi";
            } else if (i <= 30000) {
                brand = "Mercedes";
            } else if (i <= 50000) {
                brand = "Porsche";
            }

            Vehicle vehicle = new Vehicle(i + "", brand, "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.addVehicleForSale(vehicle, "randomSeller");
        }

        long start = System.currentTimeMillis();
        for (int i = count; i >= 0; i--) {
            this.vehicleRepository.removeVehicle(i + "");
        }

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 125);
    }

    @Test
    public void testGetVehiclesOrdered_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
                this::testGetVehiclesOrdered_WithExistentVehicles_ShouldCorrectlyOrderedVehicles,
                this::testGetVehiclesOrdered_WithNoVehicles_ShouldReturnEmptyCollection
        });

        int count = 100000;

        for (int i = count, j = 0; i >= 0 && j <= count; i--, j++) {
            int horsepower = j * 1000;
            double price = i * 10;
            String sellerName = "George";

            if (i <= 5000) {
                horsepower = 1367;
                price = 7631;
            }

            if (i <= 1000) {
                sellerName = "Jack";
            } else if (i <= 3000) {
                sellerName = "Donald";
            } else if (i <= 5000) {
                sellerName = "Tony";
            }

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", horsepower, price, true);

            this.vehicleRepository.addVehicleForSale(vehicle, sellerName);
        }

        long start = System.currentTimeMillis();

        Iterable<Vehicle> vehicles = this.vehicleRepository.getAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName();

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 75);
    }

    @Test
    public void testBuyCheapest_With100000Vehicles_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[]{
            this::testBuyCheapest_WithVehicles_ShouldReturnCorrectVehicle,
            this::testBuyCheapest_WithVehicles_ShouldCorrectlyRemoveVehicle,
            this::testBuyCheapest_WithNoVehicle_ShouldThrowException
        });

        int count = 100000;

        for (int i = count, j = 0; i >= 0 && j <= count; i--, j++) {
            String sellerName = "George";

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", i * 10, i, true);

            this.vehicleRepository.addVehicleForSale(vehicle, sellerName);
        }

        long start = System.currentTimeMillis();

        this.vehicleRepository.buyCheapestFromSeller("George");

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 50);
    }
}
