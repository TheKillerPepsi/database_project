import requests
import json
import mysql.connector
import time

#wait 10 seconds, until the mysql-socket is up
time.sleep(10)

# establish database connection
db = mysql.connector.connect (host = "sql", user = "root", passwd = "1234", db = "db.project")
mycursor = db.cursor()

# establish api query
url = "https://api.exchangeratesapi.io/latest"
response = requests.get(url)
data = response.text
parsed = json.loads(data)
rates = parsed["rates"]

#Update data
for (key, value) in rates.item():
    insert_query = ("Update tb_devisen SET kurs = %s WHERE waehrung_iso = %s")
    key_value_data = (value, key)
    mycursor.execute()
    db.commit()