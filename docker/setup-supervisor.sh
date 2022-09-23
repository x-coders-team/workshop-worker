#!/bin/sh
set -e

sudo touch /var/run/supervisor.sock
sudo chmod 777 /var/run/supervisor.sock

sudo service supervisor start
if [ $? -eq 0 ]; then
    echo "[OK] start supervisor"
else
    echo "[KO] start supervisor"
fi

sudo supervisorctl reread
if [ $? -eq 0 ]; then
    echo "[OK] reread supervisor"
else
    echo "[KO] reread supervisor"
fi

sudo supervisorctl update
if [ $? -eq 0 ]; then
    echo "[OK] updated supervisor"
else
    echo "[KO] updated supervisor"
fi

sudo supervisorctl start messenger-logging-file:*
if [ $? -eq 0 ]; then
  echo "[OK] start messaging supervisor"
else
  echo "[KO] start messaging supervisor"
fi