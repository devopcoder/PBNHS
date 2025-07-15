import java.net.URL;
import javax.sound.sampled.*;

public void playBeep() {
    try {
        URL soundURL = getClass().getResource("/beep.wav");
        if (soundURL == null) {
            System.out.println("Beep error: File not found in resources.");
            return;
        }

        AudioInputStream audioStream = AudioSystem.getAudioInputStream(soundURL);
        Clip clip = AudioSystem.getClip();
        clip.open(audioStream);
        clip.start();
    } catch (Exception ex) {
        System.out.println("Beep error: " + ex.getMessage());
    }
}