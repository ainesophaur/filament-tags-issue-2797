# Setup
- `docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v $(pwd):/var/www/html \
  -w /var/www/html \
  laravelsail/php81-composer:latest \
  composer install --ignore-platform-reqs`
- `php artisan migrate --seed`
- `npm install`
- `npm run dev`

# Instructions

1. Visit http://localhost
2. Add or remove a tag from the user
3. Submit the form (verify submission with the presence of `Result: Updated` in the UI)
4. Note how the tag state is the original state
5. Refresh the page
