from operator import index
import sqlite3
from datetime import datetime as d
import json 

timebackday = 7

index = 0

listofrows = []

quick = []

now = d.now()

basepath = "/var/www/html/tempdatabase/"
#/var/www/html/tempdatabase
hour = now.strftime("%H")
day = now.strftime("%d")
dayofyear = now.strftime("%j")
month = now.strftime("%m")
year = now.strftime("%Y")

print(int(year + month + day + hour))

con = sqlite3.connect(f'{basepath}database.db')

cur = con.cursor()

file = open(f"{basepath}temps.json", "w")

if(int(dayofyear) - timebackday < 0):
    x = int(dayofyear) - timebackday
    x = -x
    for row in cur.execute(f"SELECT * FROM tempmain WHERE dayofyear > {x} AND year = {year - 1}"):
        quick.append(row)
        print(row)

for row in cur.execute(f"SELECT * FROM tempmain WHERE dayofyear > {int(dayofyear) - timebackday} AND year = {year}"):
    quick.append(row)
    print(row)

print(json.dumps(quick))

file.write(json.dumps(quick))
file.close()

con.commit()

con.close()