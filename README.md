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

# Instructions for issue #2797

1. Visit http://localhost
2. Add or remove a tag from the user
3. Submit the form (verify submission with the presence of `Result: Updated` in the UI)
4. Note how the tag state is the original state
5. Refresh the page

# Instructions for issue #2250
1. Visit non-searchable UI http://localhost/dep-test
2. Note the options for publishers
3. Select a user
4. Note how publisher select options are updated, filtered to publishers that the user has a `BelongsToMany` relationship with Publisher
5. Visit searchable UI http://localhost/dep-test?searchable=1
6. Note the options for publishers
7. Select a user
8. Note how the options for publisher are the original options 
