package core;

import models.Track;

import java.util.List;
import java.util.Map;

public interface RePlayer {
    void addTrack(Track track, String album);

    void removeTrack(String trackTitle, String albumName);

    boolean contains(Track track);

    int size();

    Track getTrack(String title, String albumName);

    Iterable<Track> getAlbum(String albumName);

    void addToQueue(String trackName, String albumName);

    Track play();

    Iterable<Track> getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(int lowerBound, int upperBound);

    Iterable<Track> getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending();

    Map<String, List<Track>> getDiscography(String artistName);
}
