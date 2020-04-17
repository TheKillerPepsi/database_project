#requests to connect url
#json to parse json
import requests
import json
import mysql.connector

##### API query ##########

#url = "https://api.exchangeratesapi.io/latest"
#response = requests.get(url)
#data = response.text
#print (data)
#parsed = json.loads(data)
#print(json.dumps(parsed, indent=4))
#date = parsed["date"]
#print (date)
#usd_rates = parsed["rates"]["USD"]
#gbp_rate = parsed["rates"]["USD"]
#print (usd_rates) 
#print("On "+ date +" EUR equals " + str(gbp_rate)+ " GBP")
#rates = parsed["rates"]	
#for currency, rate in rates.items():
#    print("EUR =",currency, rate)
 

####### database work ######



db = mysql.connector.connect (host = "sql", user = "root", passwd = "1234", db = "db.project")
print(connection)