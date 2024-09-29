import pyaudio
import numpy as np
from scipy.fft import fft
import time

def calculate_decibels(data):
    # Calculate RMS (Root Mean Square) amplitude
    rms = np.sqrt(np.mean(np.square(data)))
    
    # Convert RMS to dB
    dB = 20 * np.log10(rms)
    return dB

def calculate_frequency(data, rate):
    # Perform FFT (Fast Fourier Transform) on the data
    fft_data = fft(data)
    
    # Get the frequencies corresponding to the FFT result
    frequencies = np.fft.fftfreq(len(data)) * rate
    
    # Find the peak frequency
    peak_frequency = frequencies[np.argmax(np.abs(fft_data))]
    
    return peak_frequency

def detect_continuous_sound():
    CHUNK = 1024
    FORMAT = pyaudio.paInt16
    CHANNELS = 1
    RATE = 44100
    
    p = pyaudio.PyAudio()
    
    stream = p.open(format=FORMAT,
                    channels=CHANNELS,
                    rate=RATE,
                    input=True,
                    frames_per_buffer=CHUNK)
    
    print("* Listening...")

    try:
        while True:
            data = stream.read(CHUNK)
            audio_data = np.frombuffer(data, dtype=np.int16)
            
            # Calculate decibels
            decibels = calculate_decibels(audio_data)
            
            # Print decibels every 2 seconds
            print("Decibels:", decibels)
            
            # Calculate frequency
            frequency = calculate_frequency(audio_data, RATE)
            print("Frequency (Hz):", frequency)
            
            # Wait for 5 seconds
            time.sleep(2)
            
    except KeyboardInterrupt:
        print("* Stopped listening...")
        stream.stop_stream()
        stream.close()
        p.terminate()

if __name__ == "__main__":
    detect_continuous_sound()
