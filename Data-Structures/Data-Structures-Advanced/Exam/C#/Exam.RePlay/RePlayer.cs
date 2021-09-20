using System;
using System.Collections.Generic;
using System.Linq;

namespace Exam.RePlay
{
    public class RePlayer : IRePlayer
    {
        private Dictionary<string, Track> tracksById;

        private Dictionary<string, string> tracksWithIdAndAlbumName;

        private Dictionary<string, Dictionary<string, List<Track>>> tracksByAlbumByArtist;

        private Dictionary<string, LinkedList<string>> tracksByArtist;

        private Dictionary<string, Dictionary<string, Track>> albumsWithTracksByTitle;

        private LinkedList<Track> trackQueue;

        public RePlayer()
        {
            this.tracksById = new Dictionary<string, Track>();
            this.albumsWithTracksByTitle = new Dictionary<string, Dictionary<string, Track>>();
            this.tracksWithIdAndAlbumName = new Dictionary<string, string>();
            this.tracksByAlbumByArtist = new Dictionary<string, Dictionary<string, List<Track>>>();
            this.tracksByArtist = new Dictionary<string, LinkedList<string>>();

            this.trackQueue = new LinkedList<Track>();
        }

        public void AddTrack(Track track, string album)
        {
            this.tracksById.Add(track.Id, track);
            this.tracksWithIdAndAlbumName.Add(track.Id, album);

            if (!this.albumsWithTracksByTitle.ContainsKey(album))
            {
                this.albumsWithTracksByTitle.Add(album, new Dictionary<string, Track>());
            }

            if(!this.tracksByAlbumByArtist.ContainsKey(track.Artist))
            {
                this.tracksByAlbumByArtist.Add(track.Artist, new Dictionary<string, List<Track>>());
                this.tracksByArtist[track.Artist] = new LinkedList<string>();
            }

            if(!this.tracksByAlbumByArtist[track.Artist].ContainsKey(album))
            {
                this.tracksByAlbumByArtist[track.Artist][album] = new List<Track>();
            }

            this.albumsWithTracksByTitle[album][track.Title] = track;
            this.tracksByAlbumByArtist[track.Artist][album].Add(track);
            this.tracksByArtist[track.Artist].AddLast(track.Id);
        }

        public void RemoveTrack(string trackTitle, string albumName)
        {
            if (!this.albumsWithTracksByTitle.ContainsKey(albumName)
                || !this.albumsWithTracksByTitle[albumName].ContainsKey(trackTitle))
            {
                throw new ArgumentException();
            }

            this.tracksByAlbumByArtist[this.albumsWithTracksByTitle[albumName][trackTitle].Artist][albumName].Remove(this.albumsWithTracksByTitle[albumName][trackTitle]);
            this.tracksByArtist[this.albumsWithTracksByTitle[albumName][trackTitle].Artist].Remove(this.albumsWithTracksByTitle[albumName][trackTitle].Id);
            this.tracksById.Remove(this.albumsWithTracksByTitle[albumName][trackTitle].Id);
            this.tracksWithIdAndAlbumName.Remove(this.albumsWithTracksByTitle[albumName][trackTitle].Id);
            this.trackQueue.Remove(this.albumsWithTracksByTitle[albumName][trackTitle]);
            this.albumsWithTracksByTitle[albumName].Remove(trackTitle);
        }

        public bool Contains(Track track)
        {
            return this.tracksById.ContainsKey(track.Id);
        }

        public int Count
        {
            get
            {
                return this.tracksById.Count;
            }
        }

        public Track GetTrack(string title, string albumName)
        {
            if(!this.albumsWithTracksByTitle.ContainsKey(albumName) 
                || !this.albumsWithTracksByTitle[albumName].ContainsKey(title))
            {
                throw new ArgumentException();
            }

            return this.albumsWithTracksByTitle[albumName][title];
        }

        public IEnumerable<Track> GetAlbum(string albumName)
        {
            if(!this.albumsWithTracksByTitle.ContainsKey(albumName))
            {
                throw new ArgumentException();
            }

            return this.albumsWithTracksByTitle[albumName].Values
                .OrderByDescending(track => track.Plays);
        }

        public void AddToQueue(string trackName, string albumName)
        {
            if(!this.albumsWithTracksByTitle.ContainsKey(albumName) 
                || !this.albumsWithTracksByTitle[albumName].ContainsKey(trackName))
            {
                throw new ArgumentException();
            }

            this.trackQueue.AddLast(this.albumsWithTracksByTitle[albumName][trackName]);
        }

        public Track Play()
        {
            if(this.trackQueue.Count == 0) {
                throw new ArgumentException();
            }
            
            Track trackToPlay = this.trackQueue.First.Value;
            trackToPlay.Plays++;
            this.trackQueue.RemoveFirst();
            return trackToPlay;
        }

        public IEnumerable<Track> GetTracksInDurationRangeOrderedByDurationThenByPlaysDescending(int lowerBound, int upperBound)
        {
            return this.tracksById
                .Values
                .Where(track => track.DurationInSeconds >= lowerBound
                && track.DurationInSeconds <= upperBound)
                .OrderBy(track => track.DurationInSeconds)
                .ThenByDescending(track => track.Plays);
        }

        public IEnumerable<Track> GetTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending()
        {
            return this.tracksById
                .Values
                .OrderBy(track => this.tracksWithIdAndAlbumName[track.Id])
                .ThenByDescending(track => track.Plays)
                .ThenByDescending(track => track.DurationInSeconds);
        }

        public Dictionary<string, List<Track>> GetDiscography(string artistName)
        {
            if(!this.tracksByAlbumByArtist.ContainsKey(artistName) || this.tracksByArtist[artistName].Count == 0) {
                throw new ArgumentException();
            }

            return this.tracksByAlbumByArtist[artistName]
                .ToDictionary(album => album.Key, album => album.Value);
        }
    }
}
