import java.util.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import java.util.stream.Collectors;

public class Main {
    public static void main(String[] args) {
//        FirstProblem();
//        SecondProblem();
//        ThirdProblem();
//        FourthProblem();
    }

    public static void FirstProblem() {
        Scanner scanner = new Scanner(System.in);

        String[] inputTime = scanner.nextLine().split("\\:");

        long hours = Long.parseLong(inputTime[0]);
        long minutes = Long.parseLong(inputTime[1]);
        long seconds = Long.parseLong(inputTime[2]);

        long steps = Long.parseLong(scanner.nextLine());
        long timePerStep = Long.parseLong(scanner.nextLine());

        long totalTimeTaken = steps * timePerStep;

        seconds += totalTimeTaken;

        minutes += seconds / 60;
        seconds %= 60;

        hours += minutes / 60;
        minutes %= 60;

        hours %= 24;

        System.out.println(String.format("Time Arrival: %02d:%02d:%02d", hours, minutes, seconds));
    }

    public static void SecondProblem() {
        Scanner scanner = new Scanner(System.in);

        LinkedHashMap<String, ArrayList<String>> performersWithAwards =
                new LinkedHashMap<String, ArrayList<String>>();

        HashSet<String> allowedPerformers = new HashSet<String>(
                Arrays.asList(scanner.nextLine().split("(\\,\\s)"))
        );

        HashSet<String> allowedSongs = new HashSet<String>(
                Arrays.asList(scanner.nextLine().split("(\\,\\s)"))
        );

        String inputLine = "";

        while(!(inputLine = scanner.nextLine()).equals("dawn")){
            String[] inputParameters = inputLine.split("(\\,\\s)");

            String performerName = inputParameters[0];
            String songName = inputParameters[1];
            String awardName = inputParameters[2];

            if(allowedPerformers.contains(performerName)
                    && allowedSongs.contains(songName)) {
                if (!performersWithAwards.containsKey(performerName)) {
                    performersWithAwards.put(performerName, new ArrayList<String>());
                }

                if(!performersWithAwards.get(performerName).contains(awardName)) {
                    performersWithAwards.get(performerName).add(awardName);
                }
            }
        }

        LinkedHashMap<String, ArrayList<String>> sortedPerformers
                = performersWithAwards
                .entrySet()
                .stream()
                .sorted((e1, e2) -> {
                    Integer result = Integer.compare(e2.getValue().size(), e1.getValue().size());

                    if(result == 0) {
                        result = e1.getKey().compareTo(e2.getKey());
                    }

                    return result;
                })
                .collect(Collectors.toMap(
                        Map.Entry::getKey,
                        Map.Entry::getValue,
                        (x,y)-> {throw new AssertionError();},
                        LinkedHashMap::new
                ));

        if(sortedPerformers.size() == 0) {
            System.out.println("No awards");
        } else {
            for (Map.Entry<String, ArrayList<String>> performerEntry : sortedPerformers.entrySet()) {
                System.out.println(performerEntry.getKey() + ": " + performerEntry.getValue().size() + " awards");

                List<String> sortedAwards =
                        performerEntry
                                .getValue()
                                .stream()
                                .sorted((e1, e2) -> e1.compareTo(e2))
                                .collect(Collectors.toList());

                for (String award : sortedAwards) {
                    System.out.println("--" + award);
                }
            }
        }
    }

    public static double[] parseDouble(String[] inputElements) {
        double[] result = new double[inputElements.length];

        for (int i = 0; i < result.length; i++) {
            result[i] = Double.parseDouble(inputElements[i]);
        }

        return result;
    }

    public static Integer[] parseInteger(String[] inputElements) {
        Integer[] result = new Integer[inputElements.length];

        for (int i = 0; i < result.length; i++) {
            result[i] = Integer.parseInt(inputElements[i]);
        }

        return result;
    }

    public static void ThirdProblem() {
        Scanner scanner = new Scanner(System.in);

        String[] participants = scanner.nextLine().split("\\ ");

        double[] zones = parseDouble(scanner.nextLine().split("\\ "));
        HashSet<Integer> checkpoints =
                new HashSet<Integer>(
                        Arrays.asList(parseInteger(scanner.nextLine().split("\\ "))));

        for(String participant : participants) {
            double fuel = (double)((int) participant.charAt(0));

            boolean hasFailed = false;

            for (int i = 0; i < zones.length; i++) {
                if(checkpoints.contains(i)) {
                    fuel += zones[i];
                } else {
                    fuel -= zones[i];
                }

                if(fuel <= 0) {
                    System.out.println(participant + " - reached " + i);
                    hasFailed = true;
                    break;
                }
            }

            if(!hasFailed) {
                System.out.println(participant + " - fuel left " + String.format("%.2f", fuel));
            }
        }
    }

    public static void FourthProblem() {
        Scanner scanner = new Scanner(System.in);

        String text = scanner.nextLine();

        String[] tickets = text.split("(\\s*\\,\\s+)");
        Pattern ticketPattern = Pattern.compile("^(.{20})$");

        String winningTicketRegex = "(\\*{6,})";
        String[] winningSymbols = new String[] {"#", "$", "^", "@"};

        //@@@@@@@^^^^^^^@@@@@@

        for (String ticket : tickets) {
            Matcher ticketMatcher = ticketPattern.matcher(ticket);

            if(ticketMatcher.find()) {
                String validTicket = ticketMatcher.group(0);

                String leftPart = validTicket.substring(0, 10);
                String rightPart = validTicket.substring(10);

                boolean hasFound = false;

                String output = "";

                for (String winningSymbol : winningSymbols) {
                    Pattern winningSymbolPattern =
                                Pattern.compile(winningTicketRegex.replace("*", winningSymbol));

                    Matcher winningTicketMatcherLeftPart = winningSymbolPattern.matcher(leftPart);
                    Matcher winningTicketMatcherRightPart = winningSymbolPattern.matcher(rightPart);

                    if(winningTicketMatcherLeftPart.find()
                            && winningTicketMatcherRightPart.find()) {
                        int length = Math.min(winningTicketMatcherLeftPart.group(0).length(), winningTicketMatcherRightPart.group(0).length());

                        output = "ticket \"" + ticket + "\" - " + length + winningSymbol;

                        if(length == 10) {
                            output += " Jackpot!";
                        }

                        hasFound = true;
                        break;
                    }
                }

                if(hasFound) {
                    System.out.println(output);
                } else {
                    System.out.println("ticket \"" + ticket + "\" - no match");
                }
            } else {
                System.out.println("invalid ticket");
            }
        }
    }
}