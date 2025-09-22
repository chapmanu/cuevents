#!/bin/bash
set -e  # exit immediately if a command fails

echo "[startup.sh] Starting custom Nginx setup..."

# Paths
CUSTOM_CONF=/home/site/wwwroot/nginx.conf
TARGET_AVAILABLE=/etc/nginx/sites-available/default
TARGET_ENABLED=/etc/nginx/sites-enabled/default

# Verify custom config exists
if [ ! -f "$CUSTOM_CONF" ]; then
  echo "[startup.sh] ERROR: $CUSTOM_CONF not found"
  exit 1
fi

# Backup existing config (just in case)
cp $TARGET_AVAILABLE ${TARGET_AVAILABLE}.bak || true
cp $TARGET_ENABLED ${TARGET_ENABLED}.bak || true

# Copy our custom config into place
cp $CUSTOM_CONF $TARGET_AVAILABLE
cp $CUSTOM_CONF $TARGET_ENABLED

echo "[startup.sh] Custom Nginx config copied."

# Reload Nginx to apply changes
service nginx reload

echo "[startup.sh] Nginx reloaded successfully."
