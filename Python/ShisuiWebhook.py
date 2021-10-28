import requests
import sys

# This is the Shisui Official API Webhook Logger

url = "https://discord.com/api/webhooks/864887737119014923/YqpHzm3XMSrZiklBfoSHqQHxl2hdrrDIc12YBHlhXbH0INsUU-TLp-4r5tpX5DUjcnnD"

data = {
    "username" : 'Akame Official API'
}

data["embeds"] = [
    {
        "description" : "Username: " + sys.argv[1] + "\n Host: " + sys.argv[2] + "\n Port: " + sys.argv[3] + "\n Time: " + sys.argv[4] + "\n Method: " + sys.argv[5],
        "title" : "API Attack Sent!"
    }
]

result = requests.post(url, json = data)

try:
    result.raise_for_status()
except requests.exceptions.HTTPError as err:
    print(err)
else:
    print("Webhook Sent!, Code {}".format(result.status_code))
