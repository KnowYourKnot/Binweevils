# Binweevils Private Server [LOCAL EASY SETUP]
A place where you can run your own local or hosted binweevils private server!


# Setup

- Install XAMPP [https://www.apachefriends.org/download.html]
- Install NodeJS [https://nodejs.org/en/download/]
- Clone this repository
- Start Apache & MySQL service using XAMPP Control Panel
- Open PhpMyAdmin & import `bwps.sql`
- Move all contents from 'game-full' to 'C:\xampp\htdocs'
- Open a command prompt in the two folders `server` & `electron` and run the command `npm i`

# Usage

- Open the command prompt in the `electron` folder & run the command `npm start'
- Open the command prompt in the `server` folder & run the command `node Main.js`

Electron should now start a browser that takes you to localhost, all you have to do from here is sign up.

# What about flash player?
Well, I knew you guys would wonder how you'd be able to run it, so I went out of my way to make a client to allow you to do so, by doing the setup above in the `electron` folder, you're finished and can play the game using electron.

# Discord
Join the discord for any further help setting up your private server
[https://discord.gg/J9n8qQvKhx]

# Credit
Bin Weevils Private Server / Rewritten has been made by 'Smiley' AKA 'Darkk' anybody else who claims to have made it is lying.
