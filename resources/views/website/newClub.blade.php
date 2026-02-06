<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create a new Club</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="">
      <fieldset>
        <legend>Submit a new club!</legend>
        <label for="name">Club name:</label> <br />
        <input type="text" name="name" id="name" />
        <br />
        <br /><label for="description">Enter a club description:</label><br />
        <textarea
          name="description"
          id="description"
          rows="5"
          cols="50"
        ></textarea>
        <br />
        <p>What days will you meet?</p>
        <label for="sun">Sunday: </label>
        <input type="checkbox" name="days" id="sun" />
        <label for="mon">Monday: </label
        ><input type="checkbox" name="days" id="mon" />
        <label for="tue">Tuesday: </label
        ><input type="checkbox" name="days" id="tue" />
        <label for="wed">Wednesday: </label
        ><input type="checkbox" name="days" id="wed" />
        <label for="thu">Thursday: </label
        ><input type="checkbox" name="days" id="thu" />
        <label for="fri">Friday: </label
        ><input type="checkbox" name="days" id="fri" />
        <label for="sat">Saturday: </label
        ><input type="checkbox" name="days" id="sat" />
        <p>What time will you meet?</p>
        <input type="text" id="time" />
        <br /><br />
        <input type="submit" />
      </fieldset>
    </form>
    <br />

    <a href="clubResources.html">View club resources here</a>
  </body>
</html>
