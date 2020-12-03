# URL-Shortener
Files of a simple URL shortener made with PHP without a SQL database.

What it does:
---------------
This simple project shortens/changes the URL that is entered into the input. The code creates a random file name made of a string of numbers.
Then it displays the new URL which the user can copy and share with friends.

Here is a [working demo.](https://srturl-php.herokuapp.com/)

How it works:
---------------
The main part is made up of two PHP files. One is the homepage where the user enters the URL to be shortened titled "index.php". And the second file titled "create.php"
When a user pastes a URL into the input field and presses enter/return, the index.php file will POST the input data to the create.php file.
The create.php file will generate a random number that will be the name of the file, and it will also make sure the random number does not match any previous files.
Using the PHP part, the create.php page will write all the necessary HTML code that will redirect the user to the desired URL through the new generated one.

Ready to Use:
----------------
All the code is ready to use. YOU DO NOT NEED TO MODIFY THE CODE TO INSERT YOUR DOMAIN IN ANY PART OF THE FILES. This project is provided "AS IS." So no need to fiddle around.

Clone:
------
```bash
git clone https://github.com/jonathanwang2018/URL-Shortener.git
```

Features:
--------------
- Features a copy link button made with jQuery so the user may copy the URL in one click.
- Color changing input field
- Input field only allows a valid URL protocol.
- A styled redirect page as to not look boring.
- Fully supports iOS/iPadOS/macOS dark mode. Added CSS to make the background turn black when dark mode is on on any Apple device.

Alternative uses:
-----------------
Hides the actual URL from view so your anyone who encounters the link will be unaware. (Rick-Roll Somebody)
If the hidden URL redirects to a malware infested page we are not responsible for the damage done.
