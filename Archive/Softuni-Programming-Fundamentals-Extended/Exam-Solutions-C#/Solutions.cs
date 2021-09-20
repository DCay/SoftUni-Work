namespace Solutions
{
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Text.RegularExpressions;

    public class Solutions
    {
        public static void Main()
        {
            //Raindrops();
            //Rainer();
            //Raincast();
            //RainAir();
        }

        public static void Raindrops()
        {
            int n = int.Parse(Console.ReadLine());
            decimal density = decimal.Parse(Console.ReadLine());

            Console.WriteLine("{0:F3}",
                Enumerable.Range(0, n)
                    .Select(x => Console.ReadLine().Split())
                    .Select(x => new KeyValuePair<long, int>(long.Parse(x[0]), int.Parse(x[1])))
                    .Select(x => (x.Key / (decimal)x.Value))
                    .Sum()
                    .ToString()
                    .Split()
                    .Where(x => x.Length > 0)
                    .Select(x => density != 0 ? decimal.Parse(x) / density : decimal.Parse(x))
                    .First());
        }

        public static void Rainer()
        {
            int[] inputNumbers = Console.ReadLine()
                .Split()
                .Select(int.Parse)
                .ToArray();

            int[] initialRaindropStates = inputNumbers.Take(inputNumbers.Length - 1).ToArray();
            int[] currentRaindropStates = initialRaindropStates.ToArray();

            int currentIndex = inputNumbers.Last();

            int steps = 0;

            while (true)
            {
                bool hasGottenWet =
                    (currentRaindropStates = currentRaindropStates
                        .Select(x => x - 1)
                        .ToArray()
                        .Where((x, y) => x == 0 && y == currentIndex)
                        .Any()
                        ? currentRaindropStates
                        .Select(x => x - 1)
                        .ToArray()
                        : currentRaindropStates
                            .Select(x => x - 1)
                            .Select((x, y) => x == 0 ? initialRaindropStates[y] : x)
                            .ToArray())
                    .Where((x, y) => x == 0 && y == currentIndex)
                    .Any();

                if (hasGottenWet) break;

                currentIndex = int.Parse(Console.ReadLine());
                steps++;
            }

            Console.WriteLine($"{string.Join(" ", currentRaindropStates)}\r\n{steps}");
        }

        public static void Raincast()
        {
            string[] patterns = new string[]
            {
                "^Type: (Normal|Warning|Danger)$",
                "^Source: ([a-zA-Z0-9]+)$",
                "^Forecast: ([^!.,?]+)$"
            };

            int currentPattern = 0;

            List<string> inputLines = new List<string>();
            while (!inputLines.Any() || inputLines[inputLines.Count - 1] != "Davai Emo") inputLines.Add(Console.ReadLine());

            List<string> currentRaincast = new List<string>();

            inputLines
                .Take(inputLines.Count - 1)
                .Where(x => Regex.IsMatch(x, patterns[0])
                            || Regex.IsMatch(x, patterns[1])
                            || Regex.IsMatch(x, patterns[2]))
                .ToList()
                .ForEach(x =>
                {
                    if (Regex.IsMatch(x, patterns[currentPattern % 3]))
                    {
                        currentRaincast.Add(Regex.Match(x, patterns[currentPattern++ % 3]).Groups[1].Value);

                        if ((currentPattern - 1) > 0 && (currentPattern - 1) % 3 == 2)
                        {
                            Console.WriteLine("({0}) {1} ~ {2}"
                                , currentRaincast[currentPattern - 3]
                                , currentRaincast[currentPattern - 1]
                                , currentRaincast[currentPattern - 2]);
                        }
                    }
                });
        }

        public static void RainAir()
        {
            Dictionary<string, List<int>> flightsByCustomerName = new Dictionary<string, List<int>>();

            List<string> inputLines = new List<string>();
            while (!inputLines.Any() || inputLines[inputLines.Count - 1] != "I believe I can fly!") inputLines.Add(Console.ReadLine());

            inputLines
                .Take(inputLines.Count - 1)
                .ToList()
                .ForEach(x =>
                {
                    if (!x.Contains("="))
                        if (!flightsByCustomerName.ContainsKey(x.Split(new[] { ' ', '=' }
                            , StringSplitOptions.RemoveEmptyEntries)[0]))
                            flightsByCustomerName.Add(x.Split(new[] { ' ', '=' }
                                    , StringSplitOptions.RemoveEmptyEntries)[0],
                                x.Split(new[] { ' ', '=' }
                                    , StringSplitOptions.RemoveEmptyEntries).Skip(1).Select(int.Parse).ToList());
                        else
                            flightsByCustomerName[x.Split(new[] { ' ', '=' }
                                    , StringSplitOptions.RemoveEmptyEntries)[0]].AddRange(
                                x.Split(new[] { ' ', '=' }
                                    , StringSplitOptions.RemoveEmptyEntries).Skip(1).Select(int.Parse).ToList());
                    else
                        flightsByCustomerName[x.Split(new[] { ' ', '=' }
                                , StringSplitOptions.RemoveEmptyEntries)[0]]
                            = flightsByCustomerName[x.Split(new[] { ' ', '=' }
                                , StringSplitOptions.RemoveEmptyEntries)[1]].ToList();
                });

            flightsByCustomerName
                .OrderByDescending(x => x.Value.Count)
                .ThenBy(x => x.Key)
                .ToDictionary(x => x.Key, x => x.Value)
                .ToList()
                .ForEach(x => Console.WriteLine($"#{x.Key} ::: {string.Join(", ", x.Value.OrderBy(y => y))}"));
        }
    }
}