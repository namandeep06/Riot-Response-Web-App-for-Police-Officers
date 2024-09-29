import pyaudio
import time
from math import log10
import audioop  
import requests

# ML
def get_from_thingspeak():
    try:
        # Construct the URL for fetching data
        url = "https://api.thingspeak.com/channels/2472958/fields/2/last.json?api_key=8A9REPRTD4IP4G6L"

        # Make a GET request to fetch the data
        response = requests.get(url)

        # Check if the request was successful (status code 200)
        if response.status_code == 200:
            data = response.json()  # Convert the response to JSON format
       
            field2_value = data.get('field2')

            print("Value of 'field2':", field2_value)
            return field2_value
    
        else:
            print("Failed to fetch data from ThingSpeak")
            return None
    except Exception as e:
        print("Exception:", e)
        return None
    
# Fetch data from ThingSpeak
riots_check = get_from_thingspeak()
print(riots_check)



# NOISE DETECTION
p = pyaudio.PyAudio()
WIDTH = 2
RATE = int(p.get_default_input_device_info()['defaultSampleRate'])
DEVICE = p.get_default_input_device_info()['index']
ref_level = 32767  # Reference level for full scale in 16-bit audio
print(p.get_default_input_device_info())

 # Initialize rms globally
rms = 0 


# Define your ThingSpeak parameters
api_key = "8A9REPRTD4IP4G6L"
channel_id = 2472958
field_number = 1

def callback(in_data, frame_count, time_info, status):
    global rms
    rms = audioop.rms(in_data, WIDTH)
    return in_data, pyaudio.paContinue

stream = p.open(format=p.get_format_from_width(WIDTH),
                input_device_index=DEVICE,
                channels=1,
                rate=RATE,
                input=True,
                output=False,
                stream_callback=callback)

stream.start_stream()

while stream.is_active(): 
    if rms > 0:  # Ensure rms is positive to avoid math domain error
        # db = 20 * log10(rms / ref_level)
        print(f"RMS: {rms}")
        if rms > 500 and riots_check == "1":

            value_to_insert = 1  
        
            # Construct the API endpoint URL
            url = f"https://api.thingspeak.com/update?api_key={api_key}&field{field_number}={value_to_insert}"

            # Make a GET request to the ThingSpeak API
            response = requests.get(url)
           
        else:
            value_to_insert = 0
            # Construct the API endpoint URL
            url = f"https://api.thingspeak.com/update?api_key={api_key}&field{field_number}={value_to_insert}"
            response = requests.get(url)


    else:
        print(f"RMS: {rms} (Below threshold)")
    # refresh every 20 seconds 
    time.sleep(10)

stream.stop_stream()
stream.close()


