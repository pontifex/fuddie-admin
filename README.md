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
* ```docker exec -i container_phpfpm_fuddie_admin php bin/console doctrine:migrations:migrate --em=acl```

After those steps app should be available on ```http://localhost```

### Multi db
Two databases are set up locally, one is `fuddie_local` (port 3305 on your localhost) for original Fuddie content and
second is `fuddie_admin_local` (port 3306 on your localhost) for ACL related stuff. Please overwrite config when 
deploying to staging / production.

### Code checker (symfony rules applied)
Nothing changed in code:

```docker exec -it container_phpfpm_fuddie_admin vendor/bin/php-cs-fixer fix ./src --config=.php_cs.dist -v --dry-run --diff```

Code may be changed:

```docker exec -it container_phpfpm_fuddie_admin vendor/bin/php-cs-fixer fix ./src --config=.php_cs.dist -v --diff```



### Functional tests
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=admin```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=category```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=company```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=miniGame```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=order```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=payment```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=restaurant```
* ```docker exec -i container_phpfpm_fuddie_admin ./bin/phpunit --group=waiter```
