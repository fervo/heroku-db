## How to use

1. Require this in your project.
2. Add ```"Fervo\\Composer\\HerokuDb\\HerokuDatabase::populateEnvironment",``` to your composer.json post-install-cmd and post-update-cmd **before the Incenteev** handler
3. Add the following to the incenteev-parameters extra section:
```
"env-map": {
    "database_driver": "DATABASE_DRIVER",
    "database_host": "DATABASE_HOST",
    "database_port": "DATABASE_PORT",
    "database_name": "DATABASE_NAME",
    "database_user": "DATABASE_USER",
    "database_password": "DATABASE_PASSWORD"
}
```
