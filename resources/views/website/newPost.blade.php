<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create a new forum post</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="">
      <fieldset>
        <legend>Create a new forum post</legend>
        <label for="title">Title: </label> <br />
        <input type="text" name="title" id="title" />
        <br />
        <br />
        <label for="post">Body: </label> <br />
        <textarea id="post" name="post" rows="5" cols="50"></textarea>
        <br />
        <p>
          Notifications: <br />
          <label for="notifyon">Enable: </label>
          <input type="radio" name="notify" id="notifyon" />
          <label for="notifyoff">Disable: </label>
          <input type="radio" name="notify" id="notifyoff" />
        </p>
        <input type="submit" />
      </fieldset>
    </form>
  </body>
</html>
