#!/bin/bash
set -e

LOG_FILE=/home/LogFiles/startup.log
CUSTOM_CONF=/home/site/wwwroot/_scripts/nginx.conf

echo "[startup.sh] Starting custom Nginx setup..." >> $LOG_FILE

# Verify custom config exists
if [ ! -f "$CUSTOM_CONF" ]; then
  echo "[startup.sh] ERROR: $CUSTOM_CONF not found" >> $LOG_FILE
  exit 1
fi

# Backup and replace possible default config locations
for TARGET in \
    /etc/nginx/sites-available/default \
    /etc/nginx/sites-enabled/default \
    /etc/nginx/conf.d/default.conf
do
  if [ -f "$TARGET" ]; then
    cp $TARGET ${TARGET}.bak || true
    cp $CUSTOM_CONF $TARGET
    echo "[startup.sh] Replaced $TARGET" >> $LOG_FILE
  else
    echo "[startup.sh] Skipped missing $TARGET" >> $LOG_FILE
  fi
done

# Reload nginx
service nginx reload || (echo "[startup.sh] ERROR: Failed to reload nginx" >> $LOG_FILE; exit 1)

echo "[startup.sh] Nginx reloaded successfully." >> $LOG_FILE
