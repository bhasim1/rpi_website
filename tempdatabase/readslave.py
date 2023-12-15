from calendar import month
import sqlite3
from datetime import datetime as d

#("CREATE TABLE temp (datetime INTEGER,templennox INTEGER, tempgarten INTEGER)"

file = open("/sys/devices/w1_bus_master1/10-000802d784f9/w1_slave", "r")
read = file.read()
templennox = read.split("=")
templennox = templennox[2]
file.close()

file = open("/sys/devices/w1_bus_master1/28-38db0d1e64ff/w1_slave", "r")
read = file.read()
tempgarten = read.split("=")
tempgarten = tempgarten[2]
file.close()

now = d.now()

hour = now.strftime("%H")
day = now.strftime("%d")
dayofyear = now.strftime("%j")
month = now.strftime("%m")
year = now.strftime("%Y")

"""if int(now.strftime("%j")) < 100:
    day = int(day) + 1
    day = str(day)"""

con = sqlite3.connect('/var/www/html/tempdatabase/database.db')

cur = con.cursor()

cur.execute(f"INSERT INTO tempmain VALUES ({year + month + day + hour},{year},{month}, {dayofyear},{templennox}, {tempgarten})")

for row in cur.execute('SELECT * FROM tempmain ORDER BY timestamp DESC'):
        print(row)

con.commit()

con.close()