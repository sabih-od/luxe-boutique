Steps to get this project running
- Extract `project/vendor` folder from `files.zip` placed on the root.
- Upload `install/database/database.sql`.
- Change `.env` values under `project\vendor\markury\src\.env`
- Inside `project` folder run `php artisan migrate`.
- Inside `project` folder run `php artisan db:seed`.

###Optional
run `php artisan vendor:publish --provider="DevDojo\Chatter\ChatterServiceProvider"` inside project directory.

### Optional if packages are not working
Create a subscription plan named `Free` for a new user to signup without verification.
