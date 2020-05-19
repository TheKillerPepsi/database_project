import requests
import json
import mysql.connector
import time
import sys

# establish api query
url = "https://api.exchangeratesapi.io/latest"
response = requests.get(url)
data = response.text
parsed = json.loads(data)
rates = parsed["rates"]

# wait 5 seconds until the sql socket is up
time.sleep(5)

# establish database connection
db = mysql.connector.connect (host = "sql", user = "root", passwd = "1234", db = "db.project")
mycursor = db.cursor()

#check, if database is empty
sql_check_exist = ("SELECT * FROM tb_devisen limit 1;")
mycursor.execute(sql_check_exist)
result = mycursor.fetchall()

#if the table is empty, python enter the data
if not result:
    for (key, value) in rates.items():
        add_data = ("INSERT INTO tb_devisen "
              "(id, waehrung_iso, kurs) "
                "VALUES (DEFAULT, %s, %s)")
        key_value_data = (key, value)
        mycursor.execute(add_data, key_value_data)
        db.commit()
        print("Data added")
    
#if not, python udates the data
else:
    for (key, value) in rates.items():
        insert_query = ("Update tb_devisen SET kurs = %s WHERE waehrung_iso = %s")
        key_value_data = (value, key)
        mycursor.execute(insert_query, key_value_data)
        db.commit()
        print("Data updated")

#checks, if euro is vorhanden
sql_check_euro = ("SELECT * FROM tb_devisen WHERE waehrung_iso = 'EUR';");
mycursor.execute(sql_check_euro)
result_euro = mycursor.fetchall()
if not result_euro:
   print("Euro nicht vorhanden")
   add_euro = ("INSERT INTO tb_devisen (id, waehrung_iso, kurs) VALUES (DEFAULT, 'EUR', 1)")
   mycursor.execute(add_euro)
   db.commit()
   print("Euro updated")
else:
    print("Euro vorhanden")


    #terminates the skript, so you dont need to update the data again
#    sys.exit()
