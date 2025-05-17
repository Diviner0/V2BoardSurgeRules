# V2BoardSurgeRules
For V2Board Panel (including NewV2Board/Xboard) Surge Subscription use

---
1. Use the command to determine the Xboard container ID.
```
docker ps
```
2. Replace the Surge.php file
```
docker cp /path/on/host {container_id}:/www/app/Protocols/Surge.php
```
3. Create a custom.surge.conf file
```
docker cp /path/on/host {container_id}:/www/resources/rules/custom.surge.conf
```
