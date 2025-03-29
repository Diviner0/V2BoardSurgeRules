# xboardSurgeRules
For Xboard Panel Surge Subscription use

---
1. Use the command to determine the Xboard container id.
```
docker ps
```
2. Replace Surge.php file
```
docker cp /path/on/host {container_id}:/www/app/Protocols/Surge.php
```
3. Create a custom.surge.conf file
```
docker cp /path/on/host {container_id}:/www/resources/rules/custom.surge.conf
```
