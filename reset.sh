php artisan plugin:refresh UnixDevil.Crawler --force
php artisan plugin:refresh Winter.Blog --force
php artisan crawler:clear
echo "Clearing the cache!"
php artisan cache:clear
echo "Clearing the redis!"
redis-cli FLUSHALL
echo "Done!"
