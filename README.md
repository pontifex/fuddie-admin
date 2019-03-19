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
* ```docker exec -i container_phpfpm_fuddie_admin php bin/console doctrine:migrations:migrate```

After those steps app should be available on ```http://localhost```

### Functional tests
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=admin```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=category```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=company```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=miniGame```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=order```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=payment```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=restaurant```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=waiter```
