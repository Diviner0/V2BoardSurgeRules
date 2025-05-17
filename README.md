# V2BoardSurgeRules
For V2Board Panel (including NewV2Board/Xboard) Surge Subscription use

---
## Docker
1. Use the command to determine the V2Board container ID.
```bash
docker ps
```
2. Replace the Surge.php file
```bash
docker cp /path/on/host {container_id}:/www/app/Protocols/Surge.php
```
3. Create a custom.surge.conf file
```bash
docker cp /path/on/host {container_id}:/www/resources/rules/custom.surge.conf
```

---
## Direct Implementation
1. Go to the folder where you installed the pages:
```bash
cd /var/www/wwwroot/v2board
```
2. Replace the /app/Protocols/Surge.php and /resources/rules/custom.surge.conf under your web folder
3. For any user implemented with the BT Panel, please remember to restart the webman to apply changes
