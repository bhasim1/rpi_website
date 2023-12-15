import sqlite3

con = sqlite3.connect('/var/www/html/tankendatabase/database.db')

cur = con.cursor()

cur.execute("DROP TABLE tanken")
#("CREATE TABLE temp (datetime INTEGER,templennox INTEGER, tempgarten INTEGER")
con.commit()

con.close()

