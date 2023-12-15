import sqlite3
from datetime import datetime as d
import json 

timebackday = 31

index = 0

listofrows = []

now = d.now()

hour = now.strftime("%H")
day = now.strftime("%d")
dayofyear = now.strftime("%j")
month = now.strftime("%m")
year = now.strftime("%Y")

con = sqlite3.connect('/var/www/html/tankendatabase/database.db')

cur = con.cursor()

cur.execute("SELECT * FROM tanken ORDER BY timestamp DESC;")

file = open("/var/www/html/tankendatabase/prices.json", "w")

for row in cur.execute(f"SELECT * FROM tanken WHERE dayofyear > {int(dayofyear) - timebackday} AND year = {year}"):
    index + 1
    listofrows.append(row)

print(listofrows)

file.write(json.dumps(listofrows))
file.close()

con.commit()

con.close()