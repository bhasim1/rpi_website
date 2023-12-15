import sqlite3

con = sqlite3.connect('/var/www/html/tempdatabase/database.db')

cur = con.cursor()

cur.execute("CREATE TABLE tempmain (timestamp INTEGER,year INTEGER,month INTEGER, dayofyear INTEGER,templennox INTEGER, tempgarten INTEGER)")
#("CREATE TABLE temp (datetime INTEGER,templennox INTEGER, tempgarten INTEGER")
con.commit()

con.close()