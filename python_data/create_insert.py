import requests
import json
import mysql.connector
import time

# establish database connection
db = mysql.connector.connect (host = "sql", user = "root", passwd = "1234", db = "db.project")
mycursor = db.cursor()

# establish api query
url = "https://api.exchangeratesapi.io/latest"
response = requests.get(url)
data = response.text
parsed = json.loads(data)
rates = parsed["rates"] 

#create table
#CREATE TABLE `db.project`.`tb_devisen_2` (
#  `id` INT NOT NULL AUTO_INCREMENT,
#  `waehrung_iso` VARCHAR(45) NULL,
#  `kurs` DOUBLE NULL,
#  PRIMARY KEY (`id`));


# Insert into
for (key, value) in rates.items():
    add_data = ("INSERT INTO tb_devisen "
              "(id, waehrung_iso, kurs) "
                "VALUES (DEFAULT, %s, %s)")
    key_value_data = (key, value)
    mycursor.execute(add_data, key_value_data)
    db.commit()

