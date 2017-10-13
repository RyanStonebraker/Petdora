# Petdora
***
A Fedora wearing Pet Webstore for Fedora, integrating with a NO-SQL Database for a Cyber Security exercise.

## Current Features:
***
+ Integrated jQuery
  + For smooth transitions, fixed top nav-bar on scroll and other features to make this a fully fledged and cross-compatible website.

+ Static Content Management System that loads all files from a certain folder.
  + Made so that if an "Advanced Usability Testing" user were to somehow gain the ability to create a file in this folder on the server, they could manipulate the homepage.

+ Sign-in Page
  + Fully working PHP and jQuery based sign-in page that stores cookies to keep users signed in.
  + Exploitable by simply copying a cookie to sign in as a different user.
  + The encrypted "hash" is just a raw text combination of the username and password, which could be captured.
  + Checks based off of an unencrypted text file stored on the server that could later be edited to include new users.

## Features Coming Soon:
***
+ Petdora Asteroids
  + An HTML5 Canvas fully working Asteroids game that allows you to store a name and your highscore if you get in the top 10. Nothing is escaped from the name however and jQuery injects it into its own html page.

+ Contact Form
  + A contact form that sends raw unescaped data to a Python CGI script to store the contact query in a "totally secure" folder on the server.

+ NOSQL Database
  + Products Page is going to be linked to a NO-SQL database vulnerable to NOSQL injections.
