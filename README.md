RC App V2
========

Gestion des agences de location des voitures

## Create tables
```
php bin/console doc:sch:upd --force
```

## Lancement des fixtures
```
php bin/console hautelook:fixtures:load -b CoreBundle -b CustomerBundle -b CarBundle -b AppBundle --no-interaction
```

## assets:install
```
php bin/console assets:install
```
