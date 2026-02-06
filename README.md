# tuj-owl-nest

A community platform for clubs, student organizations, academic societies, and any student who wants to organize meetups.

---

# Clone this Git Repository

1. Clone via HTTPS

```console
git clone https://github.com/teddyboy999/tuj-owl-nest.git
```

2. Clone with ssh

```console
git init
git remote add origin https://<YOUR-PERSONAL-ACCESS-TOKEN>@
github.com:teddyboy999/tuj-owl-nest.git
// ex: git remote add origin https://ghp_wejofiwejofijewioewijfi@
github.com:teddyboy999/tuj-owl-nest.git
git checkout -b yourBranchName
// add/modify some files (to test)
git add .
git commit -m "first commit to my branch"
git push origin yourBranchName
```

---

# Running the Project in your Local Environment

1. After successfully cloning the repository, please cd into the folder.

```console
cd tuj-owl-nest/
```

2. Now make a copy of the .env.example file to .env, and add in the necessary details:

```console
cp .env.example .env
```

_(necessary details are to be provided in-person, can't share here)_

3. Now run the necessary, required migrations.

```console
php artisan migrate
```

**Finally to run the project, please open two separate terminals (in the same folder), and type the following commands:**
Backend Server (npm):

```console
npm run dev
```

Frontend Assets (php artisan):

```console
php artisan serve
```

---

# General Project Structure (NEEDS UPDATE)

Note: There's a lot of information to fill out here, I'll need some time, because some topics are complex. For now, the basics are already here, you're good to start coding.

## Main Project Folder

/ <-- Main project Root Folder

## Resources: /resources/

1. **/resources/cs**s <-- all your app's CSS code goes into this folder.
2. **/resources/js** <-- similarly, all your app's JS code goes into this folder.
3. **/resources/views** <-- all blade/HTML views go into this folder

### /resources/views

1. Work with blade + HTML templates.
2. Every new file will be of the format: **app.blade.php**
3. You can write pure HTML code in these files, don't worry.
4. **Brave:** You can also use Blade Directives for extra functionality, but there's really no need to. You can format it as a Pure HTML file.

## Database: /database/

1. **/database/migrations** <-- for all your database migrations

### Migrations

1. More on the database folders later, but Laravel uses something called Migrations to communicate with the database.
2. Migrations work with ANY database, no matter SQL, Postgres, etc. You create models to define how your data is structured and organized. You use migrations to use/modify that data.

## Adding HTML Webpages (For the Frontside and main Website):

**NOTE**: All webpages go in the "_/resources/views"_ folder.

### Project Directory Organization

1. The frontend - main website pages will be added to the _"/resources/views/website"_ folder
2. Ignore the name, it's all HTML, but the naming convention is _"page-name.blade.php"_
3. If you want to access the created page, you have to add the route in _"/routes/web.php"_
4. Here's the general syntax of adding a website route to the laravel routes page (web.php)

```php
Route::get('/page-name', function () {
    return view('folder-name.page-name');
});
```

5. Notice how you don't have to include the full page name, you can just call it by the first name: **"contact" instead of "contact.blade.php"**

### Git Hub process in making changes

1. git add . (add all your files)
2. git commit -m "" (make the commit)
3. git push (ensure you're on the branch u need to be, use git branch to check and git checkout to move)
4. git fetch origin (to get the current rebase of the remote repo)
5. git pull origin main
