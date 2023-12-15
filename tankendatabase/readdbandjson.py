from operator import index
import sqlite3
from datetime import datetime as d
import json 


timebackday = 7

index = 0

listofrows = []

now = d.now()
hour = now.strftime("%H")
day = now.strftime("%d")
dayofyear = now.strftime("%j")
month = now.strftime("%m")
year = now.strftime("%Y")



file = open("/var/www/html/tankendatabase/prices.json", "r")
print("json:")
print(file.read())
file.close()

con = sqlite3.connect('/var/www/html/tankendatabase/database.db')

cur = con.cursor()

print("all from db:")
for row in cur.execute(f"SELECT * FROM tanken"):
    print(row)

for row in cur.execute(f"SELECT * FROM tanken WHERE dayofyear > {int(dayofyear) - timebackday} AND year = {year}"):
    index + 1
    listofrows.append(row)

print(json.dumps(listofrows))
con.commit()

con.close()