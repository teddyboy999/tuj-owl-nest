# tuj-owl-nest
A community platform for clubs, student organizations, academic societies, and any student who wants to organize meetups.

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

