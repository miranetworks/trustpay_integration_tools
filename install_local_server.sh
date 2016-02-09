service apache2 stop

sudo rm -R /var/www/html/*
sudo cp -R /home/ubuntu/trustpay_developer_docs/current/* /var/www/html/
sudo cp -R /home/ubuntu/trustpay_integration_tools/current/* /var/www/html/web/demo/

mkdir /var/www/html/app/cache/
mkdir /var/www/html/app/logs/
chmod 0777 /var/www/html/app/cache/
chmod 0777 /var/www/html/app/logs/

sudo chown -R www-data:www-data /var/www/html

echo "www-data chowns all files"

cd /var/www/html/ && php composer.phar install

echo "composer.phar install done"

php /var/www/html/app/console doctrine:schema:update --force --env=prod

echo "schema:update done"

cd /var/www/html/app/cache && rm -rf prod/ dev/

echo "rm done"

echo "Application Done, Restarting Apache"

service apache2 start

