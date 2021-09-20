using Exam.RePlay;
using NUnit.Framework;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

public class RePlayerTests
{
    private IRePlayer rePlayer;

    private Track GetRandomTrack()
    {
        Random random = new Random();

        return new Track(
            Guid.NewGuid().ToString(),
            Guid.NewGuid().ToString(),
            Guid.NewGuid().ToString(),
            random.Next(1, 1_000_000_000),
            random.Next(10, 1000));
    }

    [SetUp]
    public void Setup()
    {
        this.rePlayer = new RePlayer();
    }

    private void PerformCorrectnessTesting(List<Action> correctnessTests)
    {
        correctnessTests.ForEach(test =>
        {
            this.rePlayer = new RePlayer();

            try { test.Invoke(); } catch(ArgumentException) { }
        });

        this.rePlayer = new RePlayer();
    }
    
    // Correctness Tests

    [Test]
    [Category("Correctness")]
    public void TestAddTrack_WithExistentAlbum_ShouldSuccessfullyAddTrack()
    {
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");

        Assert.AreEqual(2, this.rePlayer.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestAddTrack_WithNonexistentAlbum_ShouldSuccessfullyAddTrack()
    {
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");

        Assert.AreEqual(1, this.rePlayer.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestContains_WithExistentTrack_ShouldReturnTrue()
    {
        Track randomTrack = this.GetRandomTrack();

        this.rePlayer.AddTrack(randomTrack, "randomAlbum");

        Assert.IsTrue(this.rePlayer.Contains(randomTrack));
    }

    [Test]
    [Category("Correctness")]
    public void TestContains_WithNonexistentTrack_ShouldReturnFalse()
    {
        Track randomTrack = this.GetRandomTrack();

        this.rePlayer.AddTrack(randomTrack, "randomAlbum");

        Assert.IsFalse(this.rePlayer.Contains(this.GetRandomTrack()));
    }

    [Test]
    [Category("Correctness")]
    public void TestCount_With5Tracks_ShouldReturn5()
    {
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum1");

        Assert.AreEqual(5, this.rePlayer.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestCount_WithEmpty_ShouldReturnZero()
    {
        Assert.AreEqual(0, this.rePlayer.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetAlbum_WithCorrectAlbum_ShouldReturnCorrectTracks()
    {
        Track track = new Track("asd", "bsd", "csd", 4000, 200);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 200);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 200);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum");
        this.rePlayer.AddTrack(track3, "randomAlbum2");

        List<Track> album = new List<Track>(this.rePlayer.GetAlbum("randomAlbum"));

        Assert.AreEqual(2, album.Count);
        Assert.AreEqual(track2, album[0]);
        Assert.AreEqual(track, album[1]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetAlbum_WithNonexistentAlbum_ShouldThrowException()
    {
        Track randomTrack = this.GetRandomTrack();
        Track track = this.GetRandomTrack();
        Track track3 = this.GetRandomTrack();

        this.rePlayer.AddTrack(randomTrack, "randomAlbum");
        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track3, "randomAlbum2");

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetAlbum("randomAlbum3"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetDiscography_WithNonExistentArtist_ShouldThrowException()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.RemoveTrack(track.Title, "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetDiscography("George"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetDiscography_WithNoTracks_ShouldThrowException()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.RemoveTrack(track.Title, "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetDiscography("Donald"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetDiscography_WithTracks_ShouldReturnCorrectlyGroupedData()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "fsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Jack", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        Dictionary<string, List<Track>> discography = this.rePlayer.GetDiscography("Donald");

        Assert.AreEqual(2, discography.Count);

        List<Track> randomAlbum = discography["randomAlbum"];
        List<Track> randomAlbum2 = discography["randomAlbum2"];

        Assert.AreEqual(1, randomAlbum.Count);
        Assert.AreEqual(2, randomAlbum2.Count);
        Assert.AreEqual(track, randomAlbum[0]);
        Assert.AreEqual(track2, randomAlbum2[0]);
        Assert.AreEqual(track3, randomAlbum2[1]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTrack_WithCorrectData_ShouldReturnTrackCorrectly()
    {
        Track randomTrack = this.GetRandomTrack();
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(randomTrack, "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");

        Assert.AreEqual(randomTrack, this.rePlayer.GetTrack(randomTrack.Title, "randomAlbum"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTrack_WithMissingAlbum_ShouldThrowException()
    {
        Track track = this.GetRandomTrack();
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetTrack(track.Title, "randomAlbum3"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTrack_WithMissingTrackTitle_ShouldThrowException()
    {
        Track randomTrack = this.GetRandomTrack();
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");
        this.rePlayer.AddTrack(randomTrack, "randomAlbum");
        this.rePlayer.AddTrack(this.GetRandomTrack(), "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetTrack("randomTitle", "randomAlbum"));
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTracksInDurationRange_WithCorrectData_ShouldReturnCorrectResults()
    {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 6500, 600);
        Track track5 = new Track("nsd", "osd", "psd", 1500, 100);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum3");
        this.rePlayer.AddTrack(track5, "randomAlbum4");

        List<Track> list = new List<Track>(this.rePlayer.GetTracksInDurationRangeOrderedByDurationThenByPlaysDescending(100, 500));

        Assert.AreEqual(4, list.Count);
        Assert.AreEqual(track5, list[0]);
        Assert.AreEqual(track2, list[1]);
        Assert.AreEqual(track, list[2]);
        Assert.AreEqual(track3, list[3]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTracksInDurationRange_WithNonMatching_ShouldReturnEmptyCollection()
    {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 6500, 600);
        Track track5 = new Track("nsd", "osd", "psd", 1500, 100);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum3");
        this.rePlayer.AddTrack(track5, "randomAlbum4");

        List<Track> list = new List<Track>(this.rePlayer.GetTracksInDurationRangeOrderedByDurationThenByPlaysDescending(601, 1000));

        Assert.AreEqual(0, list.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTracksOrderedByMultiCriteria_WithCorrectData_ShouldReturnCorrectResults()
    {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 5000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 5000, 600);
        Track track5 = new Track("nsd", "osd", "psd", 6000, 100);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "bandomAlbum");
        this.rePlayer.AddTrack(track3, "aandomAlbum2");
        this.rePlayer.AddTrack(track4, "aandomAlbum2");
        this.rePlayer.AddTrack(track5, "aandomAlbum2");

        List<Track> list = new List<Track>(this.rePlayer.GetTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending());

        Assert.AreEqual(5, list.Count);
        Assert.AreEqual(track5, list[0]);
        Assert.AreEqual(track4, list[1]);
        Assert.AreEqual(track3, list[2]);
        Assert.AreEqual(track2, list[3]);
        Assert.AreEqual(track, list[4]);
    }

    [Test]
    [Category("Correctness")]
    public void TestGetTracksOrderedByMultiCriteria_WithNoTracks_ShouldReturnEmptyCollection()
    {
        List<Track> list = new List<Track>(this.rePlayer.GetTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending());


        Assert.AreEqual(0, list.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestListeningQueue_WithCorrectData_ShouldPlaySuccessfully()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        this.rePlayer.AddToQueue("bsd", "randomAlbum");
        this.rePlayer.AddToQueue("bsd", "randomAlbum2");

        Assert.AreEqual(track, this.rePlayer.Play());
        Assert.AreEqual(track3, this.rePlayer.Play());
    }

    [Test]
    [Category("Correctness")]
    public void TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        this.rePlayer.AddToQueue("bsd", "randomAlbum");
        this.rePlayer.Play();

        Assert.AreEqual(4001, this.rePlayer.GetTrack("bsd", "randomAlbum").Plays);
    }

    [Test]
    [Category("Correctness")]
    public void TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");
        this.rePlayer.AddToQueue("bsd", "randomAlbum");

        this.rePlayer.Play();

        Assert.IsTrue(this.rePlayer.Contains(track));
    }

    [Test]
    [Category("Correctness")]
    public void TestListeningQueue_WithEmptyQueue_ShouldThrowException()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.Play());

        this.rePlayer.AddToQueue("bsd", "randomAlbum");
        this.rePlayer.AddToQueue("bsd", "randomAlbum2");
        this.rePlayer.Play();
        this.rePlayer.Play();

        Assert.Throws<ArgumentException>(() => this.rePlayer.Play());
    }

    [Test]
    [Category("Correctness")]
    public void TestListeningQueue_WithNonexistentSongOrAlbum_ShouldThrowException()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.AddToQueue("non-existent", "randomAlbum"));
        Assert.Throws<ArgumentException>(() => this.rePlayer.AddToQueue("bsd", "non-existent"));
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveTrack_WithCorrectData_ShouldDecrementCount()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");
        this.rePlayer.RemoveTrack("bsd", "randomAlbum");

        Assert.AreEqual(3, this.rePlayer.Count);
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        this.rePlayer.RemoveTrack("bsd", "randomAlbum");

        Assert.IsFalse(this.rePlayer.Contains(track));
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "fsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Jack", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        this.rePlayer.RemoveTrack(track2.Title, "randomAlbum2");

        Assert.IsFalse(this.rePlayer.GetDiscography("Donald")["randomAlbum2"].Contains(track2));
        Assert.IsFalse(this.rePlayer.GetAlbum("randomAlbum2").Contains(track2));
        Assert.IsFalse(this.rePlayer.GetTracksInDurationRangeOrderedByDurationThenByPlaysDescending(0, 100000).Contains(track2));
        Assert.IsFalse(this.rePlayer.GetTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending().Contains(track2));

        Assert.Throws<ArgumentException>(() => this.rePlayer.GetTrack(track2.Title, "randomAlbum2"));
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        this.rePlayer.AddToQueue("bsd", "randomAlbum");
        this.rePlayer.AddToQueue("dsd", "randomAlbum2");
        this.rePlayer.AddToQueue("bsd", "randomAlbum2");
        this.rePlayer.RemoveTrack("dsd", "randomAlbum2");

        Assert.AreEqual(track, this.rePlayer.Play());
        Assert.AreEqual(track3, this.rePlayer.Play());
    }

    [Test]
    [Category("Correctness")]
    public void TestRemoveTrack_WithNonexistentTrack_ShouldThrowException()
    {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.AddTrack(track, "randomAlbum");
        this.rePlayer.AddTrack(track2, "randomAlbum2");
        this.rePlayer.AddTrack(track3, "randomAlbum2");
        this.rePlayer.AddTrack(track4, "randomAlbum");

        Assert.Throws<ArgumentException>(() => this.rePlayer.RemoveTrack("non-existent", "randomAlbum"));
        Assert.Throws<ArgumentException>(() => this.rePlayer.RemoveTrack("asd", "non-existent"));
    }
    
    // Performance Tests
    
    [Test]
    [Category("Performance")]
    public void TestAddToQueue_With100000Results_ShouldAddNearlyInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfully,
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays,
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs,
            this.TestListeningQueue_WithEmptyQueue_ShouldThrowException,
            this.TestListeningQueue_WithNonexistentSongOrAlbum_ShouldThrowException
        }));

        int count = 100000;
        Stopwatch stopwatch = new Stopwatch();
        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.AddTrack(track, "randomAlbum");
        }

        stopwatch.Start();

        for (int i = 0; i < count; i++)
        {
            this.rePlayer.AddToQueue("Title" + i, "randomAlbum");
        }

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 100);
    }

    [Test]
    [Category("Performance")]
    public void TestAddTrack_With10000Results_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestAddTrack_WithExistentAlbum_ShouldSuccessfullyAddTrack,
            this.TestAddTrack_WithNonexistentAlbum_ShouldSuccessfullyAddTrack
        }));


        int num = 10000;

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        for (int i = 0; i < 10000; i++)
        {
            this.rePlayer.AddTrack(new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10), "randomAlbum");
        }

        stopwatch.Stop();

        Assert.IsTrue((bool)(stopwatch.ElapsedMilliseconds < 100));
    }

    [Test]
    [Category("Performance")]
    public void TestContains_With100000Results_ShouldPassInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestContains_WithExistentTrack_ShouldReturnTrue,
            this.TestContains_WithNonexistentTrack_ShouldReturnFalse
        }));

        int count = 100000;

        Stopwatch stopwatch = new Stopwatch();

        Track trackToContain = null;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.AddTrack(track, "randomAlbum");

            if (i == 80000)
            {
                trackToContain = track;
            }
        }

        stopwatch.Start();

        this.rePlayer.Contains(trackToContain);

        stopwatch.Stop();
        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 1);
    }

    [Test]
    [Category("Performance")]
    public void TestGetAlbum_With100000Results_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestGetAlbum_WithCorrectAlbum_ShouldReturnCorrectTracks,
            this.TestGetAlbum_WithNonexistentAlbum_ShouldThrowException
        }));

        int count = 100000;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.AddTrack(track, "randomAlbum");
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        List<Track> enumerable = new List<Track>(this.rePlayer.GetAlbum("randomAlbum"));

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 50);
    }

    [Test]
    [Category("Performance")]
    public void TestGetDiscography_With10000Results_ShouldPassNearlyInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestGetDiscography_WithTracks_ShouldReturnCorrectlyGroupedData,
            this.TestGetDiscography_WithNoTracks_ShouldThrowException,
            this.TestGetDiscography_WithNonExistentArtist_ShouldThrowException
        }));

        int count = 10000;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "GenericArtist", i * 1000, i * 100);

            string album = null;

            if (i <= 5000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 3000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.AddTrack(track, album);
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        Dictionary<string, List<Track>> discography = this.rePlayer.GetDiscography("GenericArtist");

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 10);
    }

    [Test]
    [Category("Performance")]
    public void TestGetTrack_With100000Results_ShouldPassInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestGetTrack_WithCorrectData_ShouldReturnTrackCorrectly,
            this.TestGetTrack_WithMissingAlbum_ShouldThrowException,
            this.TestGetTrack_WithMissingTrackTitle_ShouldThrowException
        }));

        int count = 100000;

        Track trackToGet = null;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            if (i == 80000)
            {
                trackToGet = track;
            }

            this.rePlayer.AddTrack(track, "randomAlbum");
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        this.rePlayer.GetTrack(trackToGet.Title, "randomAlbum");

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 5);
    }

    [Test]
    [Category("Performance")]
    public void TestGetTracksInRange_With100000Results_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestGetTracksInDurationRange_WithCorrectData_ShouldReturnCorrectResults,
            this.TestGetTracksInDurationRange_WithNonMatching_ShouldReturnEmptyCollection
        }));

        int count = 100000;

        for (int i = count; i >= 0; i--)
        {
            int plays = 0;
            int durationInSeconds = 0;

            if (i > 1000)
            {
                plays = 10000;
                durationInSeconds = 1000;
            }
            else
            {
                plays = i * 1000;
                durationInSeconds = i * 100;
            }

            Track track = new Track(i + "", "Title" + i, "Artist" + i, plays, durationInSeconds);
            this.rePlayer.AddTrack(track, "randomAlbum");
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        List<Track> tracks = new List<Track>(this.rePlayer.GetTracksInDurationRangeOrderedByDurationThenByPlaysDescending(100, 100000));

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 75);
    }

    [Test]
    [Category("Performance")]
    public void TestGetTracksOrdered_With10000Results_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestGetTracksOrderedByMultiCriteria_WithCorrectData_ShouldReturnCorrectResults,
            this.TestGetTracksOrderedByMultiCriteria_WithNoTracks_ShouldReturnEmptyCollection
        }));

        int count = 10000;

        for (int i = count; i >= 0; i--)
        {
            int plays = 0;
            int durationInSeconds = 0;

            if (i > 2500)
            {
                plays = 10000;
                durationInSeconds = 1000;
            }
            else
            {
                plays = i * 1000;
                durationInSeconds = i * 100;
            }

            Track track = new Track(i + "", "Title" + i, "Artist" + i, plays, durationInSeconds);
            this.rePlayer.AddTrack(track, "randomAlbum" + i);
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        List<Track> enumerable = new List<Track>(this.rePlayer.GetTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending());

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 50);
    }

    [Test]
    [Category("Performance")]
    public void TestPlay_With100000Results_ShouldPlayNearlyInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfully,
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays,
            this.TestListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs,
            this.TestListeningQueue_WithEmptyQueue_ShouldThrowException,
            this.TestListeningQueue_WithNonexistentSongOrAlbum_ShouldThrowException
        }));

        int count = 100000;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.AddTrack(track, "randomAlbum");
            this.rePlayer.AddToQueue(track.Title, "randomAlbum");
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        for (int i = 0; i < count; i++)
        {
            this.rePlayer.Play();
        }

        stopwatch.Stop();
        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 25);
    }

    [Test]
    [Category("Performance")]
    public void TestRemoveTrack_With100000Results_ShouldPassNearlyInstantly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestRemoveTrack_WithCorrectData_ShouldDecrementCount,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue,
            this.TestRemoveTrack_WithNonexistentTrack_ShouldThrowException
        }));

        int count = 100000;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 1000, i * 100);

            string album = null;

            if (i <= 50000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 30000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.AddTrack(track, album);
        }

        Stopwatch stopwatch = new Stopwatch();
        stopwatch.Start();

        this.rePlayer.RemoveTrack("Title50000", "randomAlbum5");

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 10);
    }

    [Test]
    [Category("Performance")]
    public void TestRemoveTrack_With100000ResultsAndQueue_ShouldPassQuickly()
    {
        this.PerformCorrectnessTesting(new List<Action>(new Action[]{
            this.TestRemoveTrack_WithCorrectData_ShouldDecrementCount,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere,
            this.TestRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue,
            this.TestRemoveTrack_WithNonexistentTrack_ShouldThrowException
        }));

        int count = 100000;

        Track actual = null;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 1000, i * 100);

            string album = null;

            if (i <= 50000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 30000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.AddTrack(track, album);

            if (i == 50000)
            {
                actual = track;
            }

            if (i <= 75000 && i >= 25000)
            {
                this.rePlayer.AddToQueue(track.Title, album);
            }
        }

        Stopwatch stopwatch = new Stopwatch();

        stopwatch.Start();

        this.rePlayer.RemoveTrack(actual.Title, "randomAlbum5");

        stopwatch.Stop();

        Assert.IsTrue(stopwatch.ElapsedMilliseconds <= 10, "Should happen faster than " + stopwatch.ElapsedMilliseconds + "ms");

        while (true)
        {
            try
            {
                Assert.AreNotEqual(this.rePlayer.Play(), actual);
            }
            catch (ArgumentException)
            {
                break;
            }
        }
    }
}