# SBP Validation PHP + MySQL Setup

This website now includes a PHP backend that saves SBP validation submissions into a MySQL database.

## Files added
- `index.php` — main page with form, now submits to PHP.
- `submit.php` — backend handler that validates input and inserts records.
- `db.php` — PDO connection configuration.
- `setup.php` — creates the `nyandarua_sbp` database and `sbp_applications` table.
- `setup.sql` — SQL schema for the database and table.

## Setup instructions

1. Install MySQL and PHP if you do not already have them.
2. Update database credentials if needed:
   - `db.php`
   - `setup.php`

3. Create the database and table using either:
   - `php setup.php`
   - or import `setup.sql` into MySQL.

4. Start the PHP development server from the `sample1` folder:
   ```bash
   php -S localhost:8000
   ```

5. Open the site in your browser:
   `http://localhost:8000/index.php`

## Notes
- The form uses POST to `submit.php`.
- Validation runs in JavaScript first, then PHP saves into MySQL.
- If the database connection fails, update the credentials and run `setup.php` again.
