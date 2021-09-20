import core.*;

import models.Track;
import org.junit.Before;
import org.junit.Test;

import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.UUID;
import java.util.stream.Collectors;
import java.util.stream.StreamSupport;

import static org.junit.Assert.*;

public class RePlayerTests {
    private interface InternalTest {
        void execute();
    }

    private RePlayer rePlayer;

    private Track getRandomTrack() {
        return new Track(
                UUID.randomUUID().toString(),
                UUID.randomUUID().toString(),
                UUID.randomUUID().toString(),
                (int) Math.min(1, Math.random() * 1_000_000_000),
                (int) Math.min(10, Math.random() * 10_000));
    }

    @Before
    public void setup() {
        this.rePlayer = new RePlayerImpl();
    }

    public void performCorrectnessTesting(InternalTest[] methods) {
        Arrays.stream(methods)
                .forEach(method -> {
                    this.rePlayer = new RePlayerImpl();

                    try {
                        method.execute();
                    } catch (IllegalArgumentException ignored) { }
                });

        this.rePlayer = new RePlayerImpl();
    }

    // Correctness Tests

    @Test
    public void testAddTrack_WithExistentAlbum_ShouldSuccessfullyaddTrack() {
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");

        assertEquals(2, this.rePlayer.size());
    }

    @Test
    public void testAddTrack_WithNonexistentAlbum_ShouldSuccessfullyaddTrack() {
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");

        assertEquals(1, this.rePlayer.size());
    }

    @Test
    public void testContains_WithExistentTrack_ShouldReturnTrue() {
        Track randomTrack = this.getRandomTrack();

        this.rePlayer.addTrack(randomTrack, "randomAlbum");

        assertTrue(this.rePlayer.contains(randomTrack));
    }

    @Test
    public void testContains_WithNonexistentTrack_ShouldReturnFalse() {
        Track randomTrack = this.getRandomTrack();

        this.rePlayer.addTrack(randomTrack, "randomAlbum");

        assertFalse(this.rePlayer.contains(this.getRandomTrack()));
    }

    @Test
    public void testCount_With5Tracks_ShouldReturn5() {
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum1");

        assertEquals(5, this.rePlayer.size());
    }

    @Test
    public void testCount_WithEmpty_ShouldReturnZero()
    {
        assertEquals(0, this.rePlayer.size());
    }

    @Test
    public void testGetAlbum_WithCorrectAlbum_ShouldReturnCorrectTracks() {
        Track track = new Track("asd", "bsd", "csd", 4000, 200);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 200);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 200);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum");
        this.rePlayer.addTrack(track3, "randomAlbum2");

        List<Track> album = StreamSupport.stream(this.rePlayer.getAlbum("randomAlbum").spliterator(), false)
                .collect(Collectors.toList());;

        assertEquals(2, album.size());
        assertEquals(track2, album.get(0));
        assertEquals(track, album.get(1));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetAlbum_WithNonexistentAlbum_ShouldThrowException() {
        Track randomTrack = this.getRandomTrack();
        Track track = this.getRandomTrack();
        Track track3 = this.getRandomTrack();

        this.rePlayer.addTrack(randomTrack, "randomAlbum");
        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track3, "randomAlbum2");

        this.rePlayer.getAlbum("randomAlbum3");
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetDiscography_WithNonExistentArtist_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.removeTrack(track.getTitle(), "randomAlbum");

        this.rePlayer.getDiscography("George");
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetDiscography_WithNoTracks_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.removeTrack(track.getTitle(), "randomAlbum");

        this.rePlayer.getDiscography("Donald");
    }

    @Test
    public void testGetDiscography_WithTracks_ShouldReturnCorrectlyGroupedData() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "fsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Jack", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        Map<String, List<Track>> discography = this.rePlayer.getDiscography("Donald");

        assertEquals(2, discography.size());

        List<Track> randomAlbum = discography.get("randomAlbum");
        List<Track> randomAlbum2 = discography.get("randomAlbum2");

        assertEquals(1, randomAlbum.size());
        assertEquals(2, randomAlbum2.size());
        assertEquals(track, randomAlbum.get(0));
        assertEquals(track2, randomAlbum2.get(0));
        assertEquals(track3, randomAlbum2.get(1));
    }

    @Test
    public void testGetTrack_WithCorrectData_ShouldReturnTrackCorrectly() {
        Track randomTrack = this.getRandomTrack();
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(randomTrack, "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");

        assertEquals(randomTrack, this.rePlayer.getTrack(randomTrack.getTitle(), "randomAlbum"));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetTrack_WithMissingAlbum_ShouldThrowException() {
        Track track = this.getRandomTrack();
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");

        this.rePlayer.getTrack(track.getTitle(), "randomAlbum3");
    }

    @Test(expected = IllegalArgumentException.class)
    public void testGetTrack_WithMissingTrackTitle_ShouldThrowException() {
        Track randomTrack = this.getRandomTrack();
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");
        this.rePlayer.addTrack(randomTrack, "randomAlbum");
        this.rePlayer.addTrack(this.getRandomTrack(), "randomAlbum");

        this.rePlayer.getTrack("randomTitle", "randomAlbum");
    }

    @Test
    public void testGetTracksInDurationRange_WithCorrectData_ShouldReturnCorrectResults() {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 6500, 600);
        Track track5 = new Track("nsd", "osd", "psd", 1500, 100);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum3");
        this.rePlayer.addTrack(track5, "randomAlbum4");

        List<Track> list = StreamSupport.stream(this.rePlayer.getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(100, 500).spliterator(), false)
                .collect(Collectors.toList());

        assertEquals(4, list.size());
        assertEquals(track5, list.get(0));
        assertEquals(track2, list.get(1));
        assertEquals(track, list.get(2));
        assertEquals(track3, list.get(3));
    }

    @Test
    public void testGetTracksInDurationRange_WithNonMatching_ShouldReturnEmptyCollection() {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 3000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 6500, 600);
        Track track5 = new Track("nsd", "osd", "psd", 1500, 100);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum3");
        this.rePlayer.addTrack(track5, "randomAlbum4");

        List<Track> list =
                StreamSupport.stream(this.rePlayer.getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(601, 1000).spliterator(), false)
                        .collect(Collectors.toList());

        assertEquals(0, list.size());
    }

    @Test
    public void testGetTracksOrderedByMultiCriteria_WithCorrectData_ShouldReturnCorrectResults() {
        Track track = new Track("asd", "bsd", "csd", 4000, 400);
        Track track2 = new Track("dsd", "esd", "fsd", 5000, 400);
        Track track3 = new Track("hsd", "isd", "jsd", 5000, 500);
        Track track4 = new Track("ksd", "lsd", "msd", 5000, 600);
        Track track5 = new Track("nsd", "osd", "psd", 6000, 100);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "bandomAlbum");
        this.rePlayer.addTrack(track3, "aandomAlbum2");
        this.rePlayer.addTrack(track4, "aandomAlbum2");
        this.rePlayer.addTrack(track5, "aandomAlbum2");

        List<Track> list =
                StreamSupport.stream(this.rePlayer.getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending().spliterator(), false)
                        .collect(Collectors.toList());

        assertEquals(5, list.size());
        assertEquals(track5, list.get(0));
        assertEquals(track4, list.get(1));
        assertEquals(track3, list.get(2));
        assertEquals(track2, list.get(3));
        assertEquals(track, list.get(4));
    }

    @Test
    public void testGetTracksOrderedByMultiCriteria_WithNoTracks_ShouldReturnEmptyCollection() {
        List<Track> list =
                StreamSupport.stream(this.rePlayer.getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending().spliterator(), false)
                        .collect(Collectors.toList());


        assertEquals(0, list.size());
    }

    @Test
    public void testListeningQueue_WithCorrectData_ShouldPlaySuccessfully() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("bsd", "randomAlbum");
        this.rePlayer.addToQueue("bsd", "randomAlbum2");

        assertEquals(track, this.rePlayer.play());
        assertEquals(track3, this.rePlayer.play());
    }

    @Test
    public void testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("bsd", "randomAlbum");
        this.rePlayer.play();

        assertEquals(4001, this.rePlayer.getTrack("bsd", "randomAlbum").getPlays());
    }

    @Test
    public void testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");
        this.rePlayer.addToQueue("bsd", "randomAlbum");

        this.rePlayer.play();

        assertTrue(this.rePlayer.contains(track));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testListeningQueue_WithEmptyQueue_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("bsd", "randomAlbum");
        this.rePlayer.addToQueue("bsd", "randomAlbum2");
        this.rePlayer.play();
        this.rePlayer.play();

        this.rePlayer.play();
    }

    @Test(expected = IllegalArgumentException.class)
    public void testListeningQueue_WithNonexistentSong_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("non-existent", "randomAlbum");
    }

    @Test(expected = IllegalArgumentException.class)
    public void testListeningQueue_WithNonexistentAlbum_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("bsd", "non-existent");
    }

    @Test
    public void testRemoveTrack_WithCorrectData_ShouldDecrementCount() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");
        this.rePlayer.removeTrack("bsd", "randomAlbum");

        assertEquals(3, this.rePlayer.size());
    }

    @Test
    public void testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.removeTrack("bsd", "randomAlbum");

        assertFalse(this.rePlayer.contains(track));
    }

    @Test(expected = IllegalArgumentException.class)
    public void testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "fsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Jack", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.removeTrack(track2.getTitle(), "randomAlbum2");
        ;
        assertFalse(this.rePlayer.getDiscography("Donald").get("randomAlbum2").contains(track2));
        assertFalse(StreamSupport.stream(this.rePlayer.getAlbum("randomAlbum2").spliterator(), false)
                .collect(Collectors.toList()).contains(track2));
        assertFalse(StreamSupport.stream(this.rePlayer.getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(0, 100000).spliterator(), false)
                .collect(Collectors.toList()).contains(track2));
        assertFalse(StreamSupport.stream(this.rePlayer.getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending().spliterator(), false)
                .collect(Collectors.toList()).contains(track2));
        this.rePlayer.getTrack(track2.getTitle(), "randomAlbum2");
    }

    @Test
    public void testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.addToQueue("bsd", "randomAlbum");
        this.rePlayer.addToQueue("dsd", "randomAlbum2");
        this.rePlayer.addToQueue("bsd", "randomAlbum2");
        this.rePlayer.removeTrack("dsd", "randomAlbum2");

        assertEquals(track, this.rePlayer.play());
        assertEquals(track3, this.rePlayer.play());
    }

    @Test(expected = IllegalArgumentException.class)
    public void testRemoveTrack_WithNonexistentTrack_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.removeTrack("non-existent", "randomAlbum");
        this.rePlayer.removeTrack("asd", "non-existent");
    }

    @Test(expected = IllegalArgumentException.class)
    public void testRemoveTrack_WithNonexistentAlbum_ShouldThrowException() {
        Track track = new Track("asd", "bsd", "Donald", 4000, 400);
        Track track2 = new Track("csd", "dsd", "Donald", 4000, 400);
        Track track3 = new Track("esd", "bsd", "Donald", 4000, 400);
        Track track4 = new Track("hsd", "isd", "Donald", 4000, 400);

        this.rePlayer.addTrack(track, "randomAlbum");
        this.rePlayer.addTrack(track2, "randomAlbum2");
        this.rePlayer.addTrack(track3, "randomAlbum2");
        this.rePlayer.addTrack(track4, "randomAlbum");

        this.rePlayer.removeTrack("asd", "non-existent");
    }

    // Performance Tests

    @Test
    public void testAddToQueue_With100000Results_ShouldAddNearlyInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfully,
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays,
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs,
            this::testListeningQueue_WithEmptyQueue_ShouldThrowException,
            this::testListeningQueue_WithNonexistentSong_ShouldThrowException,
            this::testListeningQueue_WithNonexistentAlbum_ShouldThrowException,
        });

        int count = 100000;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.addTrack(track, "randomAlbum");
        }

        long start = System.currentTimeMillis();

        for (int i = 0; i < count; i++)
        {
            this.rePlayer.addToQueue("Title" + i, "randomAlbum");
        }

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 150);
    }

    @Test
    public void testAddTrack_With100000Results_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testAddTrack_WithExistentAlbum_ShouldSuccessfullyaddTrack,
            this::testAddTrack_WithNonexistentAlbum_ShouldSuccessfullyaddTrack
        });

        int count = 100000;

        long start = System.currentTimeMillis();

        for (int i = 0; i < count; i++)
        {
            this.rePlayer.addTrack(new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10), "randomAlbum");
        }

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime < 450);
    }

    @Test
    public void testContains_With100000Results_ShouldPassInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testContains_WithExistentTrack_ShouldReturnTrue,
            this::testContains_WithNonexistentTrack_ShouldReturnFalse
        });

        int count = 100000;

        Track trackToContain = null;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.addTrack(track, "randomAlbum");

            if (i == 80000)
            {
                trackToContain = track;
            }
        }

        long start = System.currentTimeMillis();

        this.rePlayer.contains(trackToContain);

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 1);
    }

    @Test
    public void testGetAlbum_With100000Results_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testGetAlbum_WithCorrectAlbum_ShouldReturnCorrectTracks,
            this::testGetAlbum_WithNonexistentAlbum_ShouldThrowException
        });

        int count = 100000;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.addTrack(track, "randomAlbum");
        }

        long start = System.currentTimeMillis();

        List<Track> enumerable = StreamSupport.stream(this.rePlayer.getAlbum("randomAlbum").spliterator(), false)
                .collect(Collectors.toList());

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        // Normally takes < 100, but when all tests are ran, it may take more than 200
        assertTrue( stop - start <= 100);
    }

    @Test
    public void testGetDiscography_With100000Results_ShouldPassNearlyInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testGetDiscography_WithTracks_ShouldReturnCorrectlyGroupedData,
            this::testGetDiscography_WithNoTracks_ShouldThrowException,
            this::testGetDiscography_WithNonExistentArtist_ShouldThrowException
        });

        int count = 100000;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "GenericArtist", i * 1000, i * 100);

            String album = null;

            if (i <= 30000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 50000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.addTrack(track, album);
        }

        long start = System.currentTimeMillis();

        Map<String, List<Track>> discography = this.rePlayer.getDiscography("GenericArtist");

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 1);
    }

    @Test
    public void testGetTrack_With100000Results_ShouldPassInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testGetDiscography_WithTracks_ShouldReturnCorrectlyGroupedData,
            this::testGetDiscography_WithNoTracks_ShouldThrowException,
            this::testGetDiscography_WithNonExistentArtist_ShouldThrowException
        });

        int count = 100000;

        Track trackToGet = null;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            if (i == 80000)
            {
                trackToGet = track;
            }

            this.rePlayer.addTrack(track, "randomAlbum");
        }

        long start = System.currentTimeMillis();

        this.rePlayer.getTrack(trackToGet.getTitle(), "randomAlbum");

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 1);
    }

    @Test
    public void testGetTracksInRange_With100000Results_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testGetTracksInDurationRange_WithCorrectData_ShouldReturnCorrectResults,
            this::testGetTracksInDurationRange_WithNonMatching_ShouldReturnEmptyCollection
        });

        int count = 100000;

        for (int i = count; i >= 0; i--)
        {
            int plays = 0;
            int durationInSeconds = 0;

            if (i > 100)
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
            this.rePlayer.addTrack(track, "randomAlbum");
        }

        long start = System.currentTimeMillis();

        List<Track> tracks = StreamSupport.stream(this.rePlayer.getTracksInDurationRangeOrderedByDurationThenByPlaysDescending(100, 100000).spliterator(), false)
                .collect(Collectors.toList());

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        // Normally takes < 100, but when all tests are ran, it may take more than 150
        assertTrue(elapsedTime <= 100);
    }

    @Test
    public void testGetTracksOrdered_With100000Results_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testGetTracksOrderedByMultiCriteria_WithCorrectData_ShouldReturnCorrectResults,
            this::testGetTracksOrderedByMultiCriteria_WithNoTracks_ShouldReturnEmptyCollection
        });

        int count = 100000;

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
            this.rePlayer.addTrack(track, "randomAlbum" + i);
        }

        long start = System.currentTimeMillis();

        List<Track> enumerable = StreamSupport.stream(this.rePlayer.getTracksOrderedByAlbumNameThenByPlaysDescendingThenByDurationDescending().spliterator(), false)
                .collect(Collectors.toList());

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        // Normally takes < 300, but when all tests are ran, it may take more than 350
        assertTrue(elapsedTime <= 200);
    }

    @Test
    public void testPlay_With100000Results_ShouldPlayNearlyInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfully,
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndIncrementPlays,
            this::testListeningQueue_WithCorrectData_ShouldPlaySuccessfullyAndKeepSongs,
            this::testListeningQueue_WithEmptyQueue_ShouldThrowException,
            this::testListeningQueue_WithNonexistentSong_ShouldThrowException,
            this::testListeningQueue_WithNonexistentAlbum_ShouldThrowException
        });

        int count = 100000;

        for (int i = 0; i < count; i++)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 100, i * 10);

            this.rePlayer.addTrack(track, "randomAlbum");
            this.rePlayer.addToQueue(track.getTitle(), "randomAlbum");
        }

        long start = System.currentTimeMillis();

        for (int i = 0; i < count; i++)
        {
            this.rePlayer.play();
        }

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 25);
    }

    @Test
    public void testRemoveTrack_With10000Results_ShouldPassNearlyInstantly() {
        this.performCorrectnessTesting(new InternalTest[] {
            this::testRemoveTrack_WithCorrectData_ShouldDecrementCount,
            this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack,
            this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue,
            this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere,
            this::testRemoveTrack_WithNonexistentTrack_ShouldThrowException,
            this::testRemoveTrack_WithNonexistentAlbum_ShouldThrowException
        });

        int count = 100000;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 1000, i * 100);

            String album = null;

            if (i <= 3000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 5000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.addTrack(track, album);
        }

        long start = System.currentTimeMillis();

        this.rePlayer.removeTrack("Title5000", "randomAlbum3");

        long stop = System.currentTimeMillis();
        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 5);
    }

    @Test
    public void testRemoveTrack_With100000ResultsAndQueue_ShouldPassQuickly() {
        this.performCorrectnessTesting(new InternalTest[] {
                this::testRemoveTrack_WithCorrectData_ShouldDecrementCount,
                this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrack,
                this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromQueue,
                this::testRemoveTrack_WithCorrectData_ShouldSuccessfullyRemoveTrackFromEverywhere,
                this::testRemoveTrack_WithNonexistentTrack_ShouldThrowException,
                this::testRemoveTrack_WithNonexistentAlbum_ShouldThrowException
        });

        int count = 100000;

        Track actual = null;

        for (int i = count; i >= 0; i--)
        {
            Track track = new Track(i + "", "Title" + i, "Artist" + i, i * 1000, i * 100);

            String album = null;

            if (i <= 3000)
            {
                album = "randomAlbum5";
            }
            else if (i <= 5000)
            {
                album = "randomAlbum3";
            }
            else
            {
                album = "randomAlbum";
            }

            this.rePlayer.addTrack(track, album);

            if (i == 50000)
            {
                actual = track;
            }

            if (i <= 75000 && i >= 25000)
            {
                this.rePlayer.addToQueue(track.getTitle(), album);
            }
        }

        long start = System.currentTimeMillis();

        this.rePlayer.removeTrack(actual.getTitle(), "randomAlbum");

        long stop = System.currentTimeMillis();

        long elapsedTime = stop - start;

        assertTrue(elapsedTime <= 5);

        while (true) {
            try {
                assertNotEquals(this.rePlayer.play(), actual);
            }
            catch (IllegalArgumentException e) {
                break;
            }
        }
    }
}
