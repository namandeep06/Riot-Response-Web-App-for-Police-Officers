import numpy as np
import audioread
import librosa

def get_audio_details(audio_file):
    with audioread.audio_open(audio_file) as f:
        # Get the sample rate
        sample_rate = f.samplerate

        # Calculate the duration of the audio
        duration = f.duration

    # Load the audio file using librosa
    y, _ = librosa.load(audio_file, sr=sample_rate)

    # Compute the amplitude
    amplitude = np.max(np.abs(y))

    # Compute the frequency
    # Using librosa to extract pitch
    pitches, magnitudes = librosa.piptrack(y=y, sr=sample_rate)
    # Get the average pitch
    pitch = np.mean(pitches[np.nonzero(pitches)])

    # Compute the decibels
    # Assume 16-bit PCM audio
    max_amplitude = 2 ** 15
    rms = np.sqrt(np.mean(y ** 2))
    decibels = 20 * np.log10(rms / max_amplitude)

    return {
        "duration": duration,
        "amplitude": amplitude,
        "frequency": pitch,
        "decibels": decibels
    }

if __name__ == "__main__":
    audio_file = "aaja.wav"
    audio_details = get_audio_details(audio_file)
    print("Audio Details:")
    print(f"Duration: {audio_details['duration']} seconds")
    print(f"Amplitude: {audio_details['amplitude']}")
    print(f"Frequency: {audio_details['frequency']} Hz")
    print(f"Decibels: {audio_details['decibels']} dB")
