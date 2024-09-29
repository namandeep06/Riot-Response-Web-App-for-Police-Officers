import requests

# Define your ThingSpeak parameters
api_key = "8A9REPRTD4IP4G6L"
channel_id = 2472958
field_number = 1
value_to_insert = 0 # Example value to insert

# Construct the API endpoint URL
url = f"https://api.thingspeak.com/update?api_key={api_key}&field{field_number}={value_to_insert}"

# Make a GET request to the ThingSpeak API
response = requests.get(url)

# Check if the request was successful (status code 200)
if response.status_code == 200:
    print("Data inserted successfully.")
else:
    print(f"Failed to insert data. Status code: {response.status_code}")