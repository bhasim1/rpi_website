import sqlite3

con = sqlite3.connect('/var/www/html/tankendatabase/database.db')

cur = con.cursor()

cur.execute("CREATE TABLE tanken (diesel INTEGER, super10 INTEGER, super INTEGER, superplus INTEGER, heizöl INTEGER,hour INTEGER,day INTEGER, dayofyear Integer, month INTEGER, year INTEGER, timestamp INTEGER)")
#("CREATE TABLE temp (datetime INTEGER,templennox INTEGER, tempgarten INTEGER")
con.commit()

con.close()

