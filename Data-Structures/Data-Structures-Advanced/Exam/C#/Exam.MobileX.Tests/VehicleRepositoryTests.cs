using Exam.MobileX;
using NUnit.Framework;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

public class VehicleRepositoryTests
{
    private IVehicleRepository vehicleRepository;

    [SetUp]
    public void Setup()
    {
        this.vehicleRepository = new VehicleRepository();
    }

    private void PerformCorrectnessTesting(List<Action> correctnessTests)
    {
        correctnessTests.ForEach(test =>
        {
            this.vehicleRepository = new VehicleRepository();

            try { test.Invoke(); } catch (ArgumentException) { }
        });

        this.vehicleRepository = new VehicleRepository();
    }

    // Correctness Tests

    [Test]
    [Category("Correctness")]
    public void TestAddVehicle_WithCorrectData_ShouldCorrectlyAddVehicle()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.IsTrue(this.vehicleRepository.Contains(vehicle));
    }

    [Test]
    [Category("Correctness")]
    public void TestAddVehicle_WithCorrectData_ShouldCorrectlyIncrementCount()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.AreEqual(1, this.vehicleRepository.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestContains_WithExistentVehicle_ShouldReturnTrue()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.IsTrue(this.vehicleRepository.Contains(vehicle));
    }

    [Test]
    [Category("Correctness")]
    public void TestContains_WithNonexistentVehicle_ShouldReturnFalse()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.IsFalse(this.vehicleRepository.Contains(vehicle2));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesBySeller_WithExistentSeller_ShouldReturnCorrectData()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        List<Vehicle> sellerVehicles = new List<Vehicle>(this.vehicleRepository.GetVehiclesBySeller("George"));

        Assert.AreEqual(2, sellerVehicles.Count);
        Assert.AreEqual(vehicle2, sellerVehicles[0]);
        Assert.AreEqual(vehicle, sellerVehicles[1]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesBySeller_WithNonexistentSeller_ShouldThrowException()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.Throws<ArgumentException>(() => this.vehicleRepository.GetVehiclesBySeller("JohnDoe"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesInRange_WithVehiclesInRange_ShouldReturnCorrectlyOrderedData()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "BMW3", "X523", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle3, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");

        List<Vehicle> vehiclesInRange = new List<Vehicle>(this.vehicleRepository.GetVehiclesInPriceRange(50001, 70000));

        Assert.AreEqual(2, vehiclesInRange.Count);
        Assert.AreEqual(vehicle2, vehiclesInRange[0]);
        Assert.AreEqual(vehicle3, vehiclesInRange[1]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesInRange_WithNoVehiclesInRange_ShouldReturnEmptyCollection()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW2", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "BMW3", "X523", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle3, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");

        List<Vehicle> vehiclesInRange = new List<Vehicle>(this.vehicleRepository.GetVehiclesInPriceRange(505001, 705000));

        Assert.AreEqual(0, vehiclesInRange.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesByBrand_WithVehicles_ShouldReturnCorrectlyOrderedData()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle3, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Dictionary<string, List<Vehicle>> vehiclesByBrand = this.vehicleRepository.GetAllVehiclesGroupedByBrand();

        Assert.AreEqual(2, vehiclesByBrand.Count);

        List<Vehicle> bmws = vehiclesByBrand["BMW"];
        List<Vehicle> audis = vehiclesByBrand["Audi"];

        Assert.AreEqual(vehicle, bmws[0]);
        Assert.AreEqual(vehicle2, bmws[1]);
        Assert.AreEqual(vehicle3, audis[0]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesByBrand_WithNoVehicles_ShouldThrowException()
    {
        Assert.Throws<ArgumentException>(() => this.vehicleRepository.GetAllVehiclesGroupedByBrand());
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveVehicle_WithExistentVehicle_ShouldCorrectlyRemoveVehicle()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle3, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        this.vehicleRepository.RemoveVehicle(1 + "");

        Assert.AreEqual(2, this.vehicleRepository.Count);

        Assert.IsFalse(this.vehicleRepository.Contains(vehicle));

        Assert.AreEqual(2, this.vehicleRepository.GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().Count());
        Assert.AreEqual(2, this.vehicleRepository.GetVehiclesBySeller("George").Count());
        Assert.AreEqual(0, this.vehicleRepository.GetVehiclesInPriceRange(45000, 55000).Count());
        Assert.AreEqual(1, this.vehicleRepository.GetAllVehiclesGroupedByBrand()["BMW"].Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveVehicle_WithNonexistentVehicle_ShouldThrowException()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 60000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle3, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle, "George");

        Assert.Throws<ArgumentException>(() => this.vehicleRepository.RemoveVehicle("non-existent"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesOrdered_WithExistentVehicles_ShouldCorrectlyOrderedVehicles()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 50000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "BMW", "X52", "Sofia2", "Blue2", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Sofia3", "Blue3", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Sofia3", "Blue3", 500, 88000, false);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Sofia3", "Blue3", 500, 61000, false);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle3, "Phill");
        this.vehicleRepository.AddVehicleForSale(vehicle4, "Isacc");
        this.vehicleRepository.AddVehicleForSale(vehicle5, "Igor");

        List<Vehicle> orderedVehicles = new List<Vehicle>(this.vehicleRepository.GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName());

        Assert.AreEqual(5, orderedVehicles.Count);

        Assert.AreEqual(vehicle5, orderedVehicles[0]);
        Assert.AreEqual(vehicle2, orderedVehicles[1]);
        Assert.AreEqual(vehicle4, orderedVehicles[2]);
        Assert.AreEqual(vehicle, orderedVehicles[3]);
        Assert.AreEqual(vehicle3, orderedVehicles[4]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehiclesOrdered_WithNoVehicles_ShouldReturnEmptyCollection()
    {
        Assert.AreEqual(0, this.vehicleRepository.GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().Count());
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehicles_WithExistentVehicles_ShouldCorrectlyOrderedVehicles()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        Vehicle vehicle7 = new Vehicle(7 + "", "Mercedes-Benz", "C220", "Plovdiv", "Black", 600, 100000, true);
        Vehicle vehicle8 = new Vehicle(8 + "", "Ford", "Mustang", "Plovdiv", "Black", 600, 110000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle3, "Phill");
        this.vehicleRepository.AddVehicleForSale(vehicle4, "Isacc");
        this.vehicleRepository.AddVehicleForSale(vehicle5, "Igor");
        this.vehicleRepository.AddVehicleForSale(vehicle6, "Donald");
        this.vehicleRepository.AddVehicleForSale(vehicle7, "John");
        this.vehicleRepository.AddVehicleForSale(vehicle8, "Jerry");


        List<Vehicle> vehicles = new List<Vehicle>(this.vehicleRepository.GetVehicles(new List<string>(new string[] { "BMW", "Cayenne", "Ruse", "Magenta" })));

        Assert.AreEqual(6, vehicles.Count);

        Assert.AreEqual(vehicle6, vehicles[0]);
        Assert.AreEqual(vehicle4, vehicles[1]);
        Assert.AreEqual(vehicle, vehicles[2]);
        Assert.AreEqual(vehicle5, vehicles[3]);
        Assert.AreEqual(vehicle2, vehicles[4]);
        Assert.AreEqual(vehicle3, vehicles[5]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetVehicles_WithNoVehicles_ShouldReturnEmptyCollection()
    {
        Assert.AreEqual(0, this.vehicleRepository.GetVehicles(new List<string>(new string[] { "BMW", "Cayenne", "Ruse", "Magenta" })).Count());
    }

    [Test]
    [Category("Correctness")]
    public void TestBuyCheapest_WithVehicles_ShouldReturnCorrectVehicle()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 150000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle4, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle5, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle6, "George");

        Vehicle boughtVehicle = this.vehicleRepository.BuyCheapestFromSeller("Jack");

        Assert.AreEqual(vehicle3, boughtVehicle);
    }

    [Test]
    [Category("Correctness")]
    public void TestBuyCheapest_WithVehicles_ShouldCorrectlyRemoveVehicle()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 150000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle4, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle5, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle6, "George");

        Vehicle boughtVehicle = this.vehicleRepository.BuyCheapestFromSeller("Jack");

        Assert.AreEqual(5, this.vehicleRepository.Count);

        Assert.IsFalse(this.vehicleRepository.Contains(vehicle3));

        Assert.AreEqual(5, this.vehicleRepository.GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName().Count());
        Assert.AreEqual(1, this.vehicleRepository.GetVehiclesBySeller("Jack").Count());
        Assert.AreEqual(0, this.vehicleRepository.GetVehiclesInPriceRange(65000, 70000).Count());
        Assert.AreEqual(2, this.vehicleRepository.GetAllVehiclesGroupedByBrand()["Audi"].Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestBuyCheapest_WithNoVehicle_ShouldThrowException()
    {
        Vehicle vehicle = new Vehicle(1 + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);
        Vehicle vehicle2 = new Vehicle(2 + "", "Ford", "Escort", "Plovdiv", "Magenta", 500, 61000, false);
        Vehicle vehicle3 = new Vehicle(3 + "", "Audi", "A3", "Ruse", "Red", 300, 70000, false);
        Vehicle vehicle4 = new Vehicle(4 + "", "Audi", "A3", "Ruse", "Green", 500, 88000, true);
        Vehicle vehicle5 = new Vehicle(5 + "", "Audi", "A3", "Varna", "Magenta", 500, 50000, false);
        Vehicle vehicle6 = new Vehicle(6 + "", "Porsche", "Cayenne", "Plovdiv", "Black", 600, 55000, true);

        this.vehicleRepository.AddVehicleForSale(vehicle, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle2, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle3, "Jack");
        this.vehicleRepository.AddVehicleForSale(vehicle4, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle5, "George");
        this.vehicleRepository.AddVehicleForSale(vehicle6, "George");

        Assert.Throws<ArgumentException>(() => this.vehicleRepository.BuyCheapestFromSeller("Donald"));
    }

    // Performance Tests

    [Test]
    [Category("Performance")]
    public void TestAddVehicle_With100000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestAddVehicle_WithCorrectData_ShouldCorrectlyAddVehicle,
                this.TestAddVehicle_WithCorrectData_ShouldCorrectlyIncrementCount
            }));

        int count = 100000;

        Stopwatch stopwatch = new Stopwatch();

        stopwatch.Start();

        for (int i = 0; i < count; i++)
        {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 150); // barely < 150
    }

    [Test]
    [Category("Performance")]
    public void TestContains_With100000Vehicles_ShouldPassInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestContains_WithExistentVehicle_ShouldReturnTrue,
                this.TestContains_WithNonexistentVehicle_ShouldReturnFalse
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        Vehicle vehicleToContain = null;

        for (int i = 0; i < count; i++)
        {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, 90000, true);

            if (i == 800000)
            {
                vehicleToContain = vehicle;
            }

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Start();

        this.vehicleRepository.Contains(vehicleToContain);

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 1);
    }

    [Test]
    [Category("Performance")]
    public void TestGetVehicles_With100000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestGetVehicles_WithExistentVehicles_ShouldCorrectlyOrderedVehicles,
                this.TestGetVehicles_WithNoVehicles_ShouldReturnEmptyCollection
            }));

        int count = 100000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count; i >= 0; i--)
        {
            bool isVIP = false;

            if (i <= 5000)
            {
                isVIP = true;
            }

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, isVIP);

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Start();

        List<Vehicle> resultVehicles = new List<Vehicle>(this.vehicleRepository.GetVehicles(new List<string>(new string[] { "Audi", "A3", "Plovdiv", "Blue" })));

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 125);
    }

    [Test]
    [Category("Performance")]
    public void TestGetVehiclesBySellerName_With1000000Vehicles_ShouldPassNearlyInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestGetVehiclesBySeller_WithExistentSeller_ShouldReturnCorrectData,
                this.TestGetVehiclesBySeller_WithNonexistentSeller_ShouldThrowException
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count; i >= 0; i--)
        {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, true);

            string sellerName = "randomSeller";

            if (i <= 100000)
            {
                sellerName = "randomSeller10";
            }

            this.vehicleRepository.AddVehicleForSale(vehicle, sellerName);
        }

        stopwatch.Start();

        List<Vehicle> resultVehicles = new List<Vehicle>(this.vehicleRepository.GetVehiclesBySeller("randomSeller"));

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 20);
    }

    [Test]
    [Category("Performance")]
    public void TestGetVehiclesInRange_With1000000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestGetVehiclesInRange_WithVehiclesInRange_ShouldReturnCorrectlyOrderedData,
                this.TestGetVehiclesInRange_WithNoVehiclesInRange_ShouldReturnEmptyCollection
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count; i >= 0; i--)
        {
            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Start();

        List<Vehicle> resultVehicles = new List<Vehicle>(this.vehicleRepository.GetVehiclesInPriceRange(500000, 750000));

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 50);
    }

    [Test]
    [Category("Performance")]
    public void TestGetVehiclesGroupedByBrand_With1000000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestGetVehiclesByBrand_WithVehicles_ShouldReturnCorrectlyOrderedData,
                this.TestGetVehiclesByBrand_WithNoVehicles_ShouldThrowException
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count; i >= 0; i--)
        {
            string brand = "BMW";

            if (i <= 100000)
            {
                brand = "Audi";
            }
            else if (i <= 300000)
            {
                brand = "Mercedes";
            }
            else if (i <= 500000)
            {
                brand = "Porsche";
            }

            Vehicle vehicle = new Vehicle(i + "", brand, "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Start();

        Dictionary<string, List<Vehicle>> resultVehicles = this.vehicleRepository.GetAllVehiclesGroupedByBrand();

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 400);
    }

    [Test]
    [Category("Performance")]
    public void TestRemoveVehicle_With100000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestRemoveVehicle_WithExistentVehicle_ShouldCorrectlyRemoveVehicle,
                this.TestRemoveVehicle_WithNonexistentVehicle_ShouldThrowException
            }));

        int count = 100000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count; i >= 0; i--)
        {
            string brand = "BMW";

            if (i <= 10000)
            {
                brand = "Audi";
            }
            else if (i <= 30000)
            {
                brand = "Mercedes";
            }
            else if (i <= 50000)
            {
                brand = "Porsche";
            }

            Vehicle vehicle = new Vehicle(i + "", brand, "X5", "Sofia", "Blue", 400, i * 10, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, "randomSeller");
        }

        stopwatch.Start();

        for (int i = count; i >= 0; i--)
        {
            this.vehicleRepository.RemoveVehicle(i + "");
        }

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 100);
    }

    [Test]
    [Category("Performance")]
    public void TestGetVehiclesOrdered_With1000000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestGetVehiclesOrdered_WithExistentVehicles_ShouldCorrectlyOrderedVehicles,
                this.TestGetVehiclesOrdered_WithNoVehicles_ShouldReturnEmptyCollection
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count, j = 0; i >= 0 && j <= count; i--, j++)
        {
            int horsepower = j * 1000;
            double price = i * 10;
            string sellerName = "George";

            if (i <= 5000)
            {
                horsepower = 1367;
                price = 7631;
            }

            if (i <= 1000)
            {
                sellerName = "Jack";
            }
            else if (i <= 3000)
            {
                sellerName = "Donald";
            }
            else if (i <= 5000)
            {
                sellerName = "Tony";
            }

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", horsepower, price, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, sellerName);
        }

        stopwatch.Start();

        List<Vehicle> orderedVehicles = new List<Vehicle>(this.vehicleRepository.GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName());

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 500);
    }

    [Test]
    [Category("Performance")]
    public void TestBuyCheapest_With1000000Vehicles_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
                this.TestBuyCheapest_WithVehicles_ShouldReturnCorrectVehicle,
                this.TestBuyCheapest_WithVehicles_ShouldCorrectlyRemoveVehicle,
                this.TestBuyCheapest_WithNoVehicle_ShouldThrowException
            }));

        int count = 1000000;

        Stopwatch stopwatch = new Stopwatch();

        for (int i = count, j = 0; i >= 0 && j <= count; i--, j++)
        {
            string sellerName = "George";

            Vehicle vehicle = new Vehicle(i + "", "BMW", "X5", "Sofia", "Blue", i * 10, i, true);

            this.vehicleRepository.AddVehicleForSale(vehicle, sellerName);
        }

        stopwatch.Start();

        this.vehicleRepository.BuyCheapestFromSeller("George");

        stopwatch.Stop();

        long result = stopwatch.ElapsedMilliseconds;

        Assert.IsTrue(result <= 50); // 60-80
    }
}