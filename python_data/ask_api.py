#requests to connect url
#json to parse json
import requests
import json
import mysql.connector
import time
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
print("Deeebuuuuuug!!!!!!!!")

time.sleep(10)
db = mysql.connector.connect (host = "sql", user = "root", passwd = "example", db = "db.project")
print(db)
#x = 0
#while (db == False or x < 5):
 #   x += 1
  #  db = mysql.connector.connect (host = "sql", user = "root", passwd = "1234", db = "db.project")
   # print("Database connection wont work")