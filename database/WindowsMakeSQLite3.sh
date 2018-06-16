#This file will automatically create the database for PHPTask when run

sqlite3.exe db.sqlite <<EOF
create table tasks(id INTEGER PRIMARY KEY, description TEXT NOT NULL);
EOF