package models;

public class Track {
    private String id;

    private String title;

    private String artist;

    private int plays;

    private int durationInSeconds;

    public Track(String id, String title, String artist, int plays, int durationInSeconds) {
        this.id = id;
        this.title = title;
        this.artist = artist;
        this.plays = plays;
        this.durationInSeconds = durationInSeconds;
    }

    public String getId() {
        return this.id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getTitle() {
        return this.title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getArtist() {
        return this.artist;
    }

    public void setArtist(String artist) {
        this.artist = artist;
    }

    public int getPlays() {
        return this.plays;
    }

    public void setPlays(int plays) {
        this.plays = plays;
    }

    public int getDurationInSeconds() {
        return this.durationInSeconds;
    }

    public void setDurationInSeconds(int durationInSeconds) {
        this.durationInSeconds = durationInSeconds;
    }
}
