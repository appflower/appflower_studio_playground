# AppFlower Installation
The AppFlower project consists of two major components: the AppFlower Engine, which is the heart of the technology and the visual builder to create your application, AppFlower Studio. On GitHub we maintain several other git repositories, where you will find plugins and other bundled distributions of appFlower. The project used in this tutorial is the AppFlower Playground project with Studio integrated.

In addition to these git repositories we a few other installations options available for those not choosing to use git. Visit the http://www.appflower.com/cms/download page for more details.

## Step 1: AppFlower Requirements
In order to use AppFlower, your development environment has to meet certain requirements.  To find out whether your system is ready for AppFlower , please see http://www.appflower.com/doc/1_2/learn_requirements">Hosting and Requirements chapter!

## Step 2: Downloading through GitHub
*2.1 Getting a Git Account* : You'll need a GitHub account (which is also free) and will also have to install the Git client program to fetch our packages. If you don't know how to do this, we suggest you to check out the http://help.github.com/ for quick guide page. Once you're there,  click Beginner -> Set Up Git for a very nicely written, step-by-step guide for Windows, MacOS and Linux.

<p class="note">The AppFlower Studio Playground contains a pre-configured appFlower environment with Studio on a fully functional project ready to use. 

*2.2 Get the AppFlower Repository*

    git clone git://github.com/appflower/appflower_studio_playground.git /your_web_root_path/myproject


*2.3 Fetch AppFlower Dependencies:*  change your current directory to the project directory and fetch the needed dependencies:

    cd /your_web_root_path/myproject
    git submodule init
    git submodule update


*2.4 Check Environment:*  you can run the batch/check_configuration.php file to test if your php environment is correctly configured before you continue.

    php batch/check_configuration.php

## Step 3: Configuring AppFlower
*** 3.1 Database Settings:***  Adjust the database settings. Basically, you'll have to update two system files with the name of your MySQL database and the username and password to access it:

myproject/config/databases.yml : Locate the lines below and change them appropriately:

    all:
     propel:
         ...
         dsn:        mysql:dbname=yourdb;host=localhost
         username:   someuser
         password:   somepass
         ...

myproject/config/propel.ini : This one is longer, change only the following lines:

    ...
    propel.database.url = mysql:dbname=yourdb;host=localhost
    ...
    propel.database.user = someuser
    propel.database.password = somepass


<p class="note">Don't forget to make sure that the "yourdb" database actually exists. You should also double check if "someuser" exists and his password is indeed "somepass". Besides the usual rights, this user *** must***  also have *** CREATE and DROP***  credentials!

*3.2. Setting Project Permissions*

    ./symfony project:permission
    ./symfony afs:fix-perms


*3.3. Building Database*  handler classes and insert the database structure.

    ./symfony propel:build-model
    ./symfony propel:insert-sql


*3.4. Build the cache*  for AppFlower's XML validator, for best performance:

    ./symfony appflower:validator-cache frontend cache yes


*3.5. Virtual Host*  Finally, you need to setup a virtual host so you can access the project in browser. If you're familiar with Apache configuration, simply add the following host and update your hosts file with the <i>myproject.local</i> entry. Should you need more information, detailed instructions can be found in http://www.appflower.com/cms/learn_vhost Configuring Apache Virtual Hosts chapter.

    <VirtualHost *:80>
      ServerName myproject.local
      DocumentRoot /your_web_root_path/myproject/web

      <Directory "/your_web_root_path/myproject/web">
        AllowOverride All
      </Directory>
    </VirtualHost>


## Step 4: Open your new Project
That’s it! If done correctly, you should see a nice user interface, with a simple “Hello world” message displayed when opening *** http://myproject.local/***  in your browser.