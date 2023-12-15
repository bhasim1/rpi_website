from requests_html import HTMLSession
import math
import sqlite3
from datetime import datetime as d

timebackday = 7

index = 0

listofrows = []

now = d.now()

hour = now.strftime("%H")
day = now.strftime("%d")
dayofyear = now.strftime("%j")
month = now.strftime("%m")
year = now.strftime("%Y")

url = "https://www.globus-baumarkt.de/info/markt/wittlich/tankstelle/"

listofrows = []

session = HTMLSession()
response = session.get(url)
test = response.html.find(".gas-prices-list", first=True)

for row in test.text.split():
    row = row.replace(",", ".")
    listofrows.append(row)

url = "http://www.fastenergy.de/module/syndicate.htm?modul=preis&amp;plz=54518"


session = HTMLSession()
response = session.get(url)
test = response.html.text

finalprice = test[0] + test[1] + test[2] + test[4] + test[5] + "0"
print(finalprice)

con = sqlite3.connect('/var/www/html/tankendatabase/database.db')

print(listofrows)

cur = con.cursor()

print(f"INSERT INTO tanken VALUES ({float(listofrows[1])*1000}, {float(listofrows[4])*1000}, {float(listofrows[6])*1000}, {float(listofrows[9])*1000},{hour},{day}, {dayofyear},{month}, {year}, {year+month+day+hour})")
cur.execute(f"INSERT INTO tanken VALUES ({float(listofrows[1])*1000}, {float(listofrows[4])*1000}, {float(listofrows[6])*1000}, {float(listofrows[9])*1000}, {finalprice},{hour},{day}, {dayofyear},{month}, {year}, {year+month+day+hour})")

con.commit()

con.close()