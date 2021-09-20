package core;

import models.Track;

import java.util.*;
import java.util.stream.Collectors;

public class RePlayerImpl implements RePlayer {
    private Map<String, Track> tracksById;

    private Map<String, String> tracksWithIdAndAlbumName;

    private Map<String, LinkedHashMap<String, List<Track>>> tracksByAlbumByArtist;

    private Map<String, LinkedList<String>> tracksByArtist;

    private Map<String, LinkedHashMap<String, Track>> albumsWithTracksByTitle;

    private LinkedList<Track> trackQueue;

    public RePlayerImpl()
    {
        this.tracksById = new LinkedHashMap<String, Track>();
        this.albumsWithTracksByTitle = new LinkedHashMap<String, LinkedHashMap<String, Track>>();
        this.tracksWithIdAndAlbumName = new LinkedHashMap<String, String>();
        this.tracksByAlbumByArtist = new LinkedHashMap<String, LinkedHashMap<String, List<Track>>>();
        this.tracksByArtist = new LinkedHashMap<String, LinkedList<String>>();

        this.trackQueue = new LinkedList<Track>();
    }

    @Override
    public void addTrack(Track track, String album) {
        this.tracksById.put(track.getId(), track);
        this.tracksWithIdAndAlbumName.put(track.getId(), album);

        if (!this.albumsWithTracksByTitle.containsKey(album))
        {
            this.albumsWithTracksByTitle.put(album, new LinkedHashMap<String, Track>());
        }

        if(!this.tracksByAlbumByArtist.containsKey(track.getArtist()))
        {
            this.tracksByAlbumByArtist.put(track.getArtist(), new LinkedHashMap<String, List<Track>>());
            this.tracksByArtist.put(track.getArtist(), new LinkedList<String>());
        }

        if(!this.tracksByAlbumByArtist.get(track.getArtist()).containsKey(album))
        {
            this.tracksByAlbumByArtist.get(track.getArtist()).put(album, new ArrayList<Track>());
        }

        this.albumsWithTracksByTitle.get(album).put(track.getTitle(), track);
        this.tracksByAlbumByArtist.get(track.getArtist()).get(album).add(track);
        this.tracksByArtist.get(track.getArtist()).addLast(track.getId());
    }

    @Override
    public void removeTrack(String trackTitle, String albumName) {
        if (!this.albumsWithTracksByTitle.containsKey(albumName)
                || !this.albumsWithTracksByTitle.get(albumName).containsKey(trackTitle))
        {
            throw new IllegalArgumentException();
        }

        Track trackToRemove = this.albumsWithTracksByTitle.get(albumName).get(trackTitle);

        this.tracksByAlbumByArtist.get(trackToRemove.getArtist()).get(albumName).remove(trackToRemove);
        this.tracksByArtist.get(trackToRemove.getArtist()).remove(trackToRemove.getId());
        this.tracksById.remove(trackToRemove.getId());
        this.tracksWithIdAndAlbumName.remove(trackToRemove.getId());
        this.trackQueue.remove(trackToRemove);
        this.albumsWithTracksByTitle.get(albumName).remove(trackTitle);
    }

    @Override
    public boolean contains(Track track) {
        return this.tracksById.containsKey(track.getId());
    }

    @Override
    public int size() {
        return this.tracksById.size();
    }

    @Override
    public Track getTrack(String title, String albumName) {
        if(!this.albumsWithTracksByTitle.containsKey(albumName)
                || !this.albumsWithTracksByTitle.get(albumName).containsKey(title))
        {
            throw new IllegalArgumentException();
        }

        return this.albumsWithTracksByTitle.get(albumName).get(title);
    }

    @Override
    public Iterable<Track> getAlbum(String albumName) {
        if(!this.albumsWithTracksByTitle.containsKey(albumName))
        {
            throw new IllegalArgumentException();
        }

        return this.albumsWithTracksByTitle.get(albumName).values()
                .stream()
                .sorted((firstTrack, secondTrack) -> Integer.compare(secondTrack.getPlays(), firstTrack.getPlays()))
                .collect(Collectors.toList());
    }

    @Override
    public void addToQueue(String trackName, String albumName) {
        if(!this.albumsWithTracksByTitle.containsKey(albumName)
                || !this.albumsWithTracksByTitle.get(albumName).containsKey(trackName))
        {
            throw new IllegalArgumentException();
        }

        this.trackQueue.addLast(this.albumsWithTracksByTitle.get(albumName).get(trackName));
    }

    @Override
    public Track play() {
        if(this.trackQueue.size() == 0) {
            throw new IllegalArgumentException();
        }

        Track trackToPlay = this.trackQueue.getFirst();
        trackToPlay.setPlays(trackToPlay.getPlays() + 1);
        this.trackQueue.removeFirst();
        return trackToPlay;
    }

    @Override
    public Iterable<Track> getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(int lowerBound, int upperBound) {
        return this.tracksById
                .values()
                .stream()
                .filter(track -> track.getDurationInSeconds() >= lowerBound && track.getDurationInSeconds() <= upperBound)
                .sorted((firstTrack, secondTrack) -> {
                    int result = Integer.compare(firstTrack.getDurationInSeconds(), secondTrack.getDurationInSeconds());

                    if(result == 0) {
                        result = Integer.compare(secondTrack.getPlays(), firstTrack.getPlays());
                    }

                    return result;
                })
                .collect(Collectors.toList());
    }

    @Override
    public Iterable<Track> getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending() {
        return this.tracksById
                .values()
                .stream()
                .sorted((firstTrack, secondTrack) -> {
                    int result = this.tracksWithIdAndAlbumName.get(firstTrack.getId()).compareTo(this.tracksWithIdAndAlbumName.get(secondTrack.getId()));

                    if(result == 0) {
                        result = Integer.compare(secondTrack.getPlays(), firstTrack.getPlays());
                    }

                    if(result == 0) {
                        result = Integer.compare(secondTrack.getDurationInSeconds(), firstTrack.getDurationInSeconds());
                    }

                    return result;
                })
                .collect(Collectors.toList());
    }

    @Override
    public Map<String, List<Track>> getDiscography(String artistName) {
        if(!this.tracksByAlbumByArtist.containsKey(artistName) || this.tracksByArtist.get(artistName).size() == 0) {
            throw new IllegalArgumentException();
        }

        return this.tracksByAlbumByArtist.get(artistName);
    }
}
