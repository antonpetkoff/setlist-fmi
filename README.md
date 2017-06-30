## Setlist.FMI

* `tables.sql` is the script which creates all tables used by the application.

* Use `config.php` to configure various parameters of the application like `CONTENT_DIR` and `MAX_VIDEO_SIZE`.

* Create a directory named `content/` (or other name, but it must be configure in `CONTENT_DIR` in `config.php`) along this `README.md` with full access permissions `0777` so that PHP can upload files in that directory.
