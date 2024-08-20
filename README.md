# Personal Portfolio using HTML, CSS, JavaScript, PHP and SQL

## Overview

This project demonstrates how to run a simple `.php` file with an embedded HTML structure using a local server (e.g., XAMPP, WAMP, MAMP).

## Prerequesites

Before you can run the `.php` file, ensure you have installed:

- [XAMPP](https://www.apachefriends.org/index.html) - for Windows, macOS, and Linux
- [WAMP](http://www.wampserver.com/en/) - for Windows
- [MAMP](https://www.mamp.info/en/) - for macOS and Windows

## Running the `.php` File

### Step 1: Move the project to the Server Directory

1. Locate the root directory of your server:

- **In XAMPP:** `C:\xampp\htdocs\`
- **In WAMP:** `C:\wamp\www\`
- **In MAMP:** `/Applications/MAMP/htdocs/` (on macOS)

2. Copy the `project-folder` into the appropriate server directory

### Step 2: Start the Server

1. Open your XAMPP, WAMP, or MAMP control panel.
2. Start the Apache server.

### Step 3: Access the PHP File via Browser

1. Open your web browser.
2. Navigate to `http://localhost/project-folder/` (replace `project-folder` with the actual folder name).

You should see the HTML content rendered by the browser, along with any dynamic content generated by the PHP code.

## Additional Notes

- Ensure that the PHP files have the correct permissions if you are using a Unix-based system (like macOS or Linux).
- If you encounter any issues with the server, check the Apache error logs located in the `logs` directory of your server software.
