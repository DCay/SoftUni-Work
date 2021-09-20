using System;
using System.Collections.Generic;
using System.Linq;

namespace Exam.MobileX
{
    public class VehicleRepository : IVehicleRepository
    {
        private Dictionary<string, Vehicle> vehiclesById;

        private Dictionary<string, Dictionary<string, Vehicle>> vehiclesBySeller;

        private Dictionary<string, Dictionary<string, Vehicle>> vehiclesByBrand;

        private Dictionary<string, string> sellerByVehicleId;

        public VehicleRepository()
        {
            this.vehiclesById = new Dictionary<string, Vehicle>();
            this.vehiclesBySeller = new Dictionary<string, Dictionary<string, Vehicle>>();
            this.sellerByVehicleId = new Dictionary<string, string>();
            this.vehiclesByBrand = new Dictionary<string, Dictionary<string, Vehicle>>();
        }

        public void AddVehicleForSale(Vehicle vehicle, string sellerName)
        {
            this.vehiclesById.Add(vehicle.Id, vehicle);
            this.sellerByVehicleId.Add(vehicle.Id, sellerName);

            if (!this.vehiclesBySeller.ContainsKey(sellerName))
            {
                this.vehiclesBySeller[sellerName] = new Dictionary<string, Vehicle>();
            }

            if (!this.vehiclesByBrand.ContainsKey(vehicle.Brand))
            {
                this.vehiclesByBrand[vehicle.Brand] = new Dictionary<string, Vehicle>();
            }

            this.vehiclesByBrand[vehicle.Brand][vehicle.Id] = vehicle;
            this.vehiclesBySeller[sellerName][vehicle.Id] = vehicle;
        }

        public void RemoveVehicle(string vehicleId)
        {
            if(!this.vehiclesById.ContainsKey(vehicleId))
            {
                throw new ArgumentException();
            }

            this.vehiclesBySeller[this.sellerByVehicleId[vehicleId]].Remove(vehicleId);
            this.sellerByVehicleId.Remove(vehicleId);
            this.vehiclesByBrand[this.vehiclesById[vehicleId].Brand].Remove(vehicleId);
            this.vehiclesById.Remove(vehicleId);
        }

        public int Count
        {
            get
            {
                return this.vehiclesById.Count;
            }
        }

        public bool Contains(Vehicle vehicle)
        {
            return this.vehiclesById.ContainsKey(vehicle.Id);
        }

        // Get All Vehicles Ordered By Price (VIP first) by keyword
        public IEnumerable<Vehicle> GetVehicles(List<string> keywords)
        {
            return this.vehiclesById.Values
                .Where(vehicle => keywords.Contains(vehicle.Brand)
                || keywords.Contains(vehicle.Model)
                || keywords.Contains(vehicle.Location)
                || keywords.Contains(vehicle.Color))
                .OrderBy(vehicle => !vehicle.IsVIP)
                .ThenBy(vehicle => vehicle.Price);
        }

        public IEnumerable<Vehicle> GetVehiclesBySeller(string sellerName)
        {
            if(!this.vehiclesBySeller.ContainsKey(sellerName))
            {
                throw new ArgumentException();
            }

            return this.vehiclesBySeller[sellerName].Values;
        }

        public IEnumerable<Vehicle> GetVehiclesInPriceRange(double lowerBound, double upperBound)
        {
            return this.vehiclesById
                .Values
                .Where(vehicle => vehicle.Price >= lowerBound && vehicle.Price <= upperBound)
                .OrderByDescending(vehicle => vehicle.Horsepower);
        }
        
        public Dictionary<string, List<Vehicle>> GetAllVehiclesGroupedByBrand()
        {
            if(this.Count == 0)
            {
                throw new ArgumentException();
            }

            return this.vehiclesByBrand
                .ToDictionary(
                vehicleEntry => vehicleEntry.Key,
                vehicleEntry => vehicleEntry.Value.Values.OrderBy(vehicle => vehicle.Price).ToList());
        }

        public IEnumerable<Vehicle> GetAllVehiclesOrderedByHorsepowerDescendingThenByPriceThenBySellerName()
        {
            return this.vehiclesById
                .Values
                .OrderByDescending(vehicle => vehicle.Horsepower)
                .ThenBy(vehicle => vehicle.Price)
                .ThenBy(vehicle => this.sellerByVehicleId[vehicle.Id]);
        }

        public Vehicle BuyCheapestFromSeller(string sellerName)
        {
            if(!this.vehiclesBySeller.ContainsKey(sellerName))
            {
                throw new ArgumentException();
            }

            Vehicle cheapestVehicle = this.vehiclesBySeller[sellerName].Values
                .OrderBy(vehicle => vehicle.Price)
                .FirstOrDefault();

            this.RemoveVehicle(cheapestVehicle.Id);

            return cheapestVehicle;
        }
    }
}
