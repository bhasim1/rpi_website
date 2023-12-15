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



file = open("/var/www/html/tempdatabase/temps.json", "r")
print("json:")
print(file.read())
file.close()

con = sqlite3.connect('/var/www/html/tempdatabase/database.db')

cur = con.cursor()

print("all from db:")
for row in cur.execute(f"SELECT * FROM tempmain"):
    print(row)

print("------------")
print("last 7 days:")
print("------------")
for row in cur.execute(f"SELECT * FROM tempmain WHERE dayofyear > {int(dayofyear)-timebackday}"):
    index + 1
    listofrows.append(row)
    print(row)

print("----------------------")
print("everything prettified:")
print("----------------------")
print(json.dumps(listofrows, indent=4, sort_keys=True))


con.commit()

con.close()