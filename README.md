## Administration App for Fuddie

### Up and running in 1 hour

Assumptions:
* Git installed and configured on host
* Docker installed and configured on host

Steps:
* ```git clone git@github.com:pontifex/fuddie_admin.git```
* ```cd fuddie_admin```
* ```docker-compose up```
* ```docker exec -i container_phpfpm_fuddie_admin composer install```

After those steps app should be available on ```http://localhost```
