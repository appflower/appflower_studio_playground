<h3>Installation instructions using Git</h3>
<p>The AppFlower project consists of two major components: the AppFlower Engine, which is the heart of the technology and the visual builder to create your application, AppFlower Studio. On GitHub we maintain several other git repositories, where you will find plugins and other bundled distributions of appFlower. The project used in this tutorial is the AppFlower Playground project with Studio integrated.</p>

<p class="note">In addition to these git repositories we a few other installations options available for those not choosing to use git. Visit the <a href="http://www.appflower.com/cms/download">download appflower</a> page for more details.</p>

<h3>Step 1: AppFlower Requirements</h3>
<p>In order to use AppFlower, your development environment has to meet certain requirements.  To find out whether your system is ready for AppFlower , please see <a 
href="/doc/1_2/learn_requirements">Hosting and Requirements</a> chapter!</a></p>

<h3>Step 2: Downloading through GitHub</h3>
<p><b>2.1 Getting a Git Account</b>: You'll need a GitHub account (which is also free) and will also have to install the Git client program to fetch our packages. If you don't know how to do this, we suggest you to check out the <a href="http://help.github.com/" target="_blank">GitHub quick help</a> page. Once you're there,  click <span class="code_snippet">Beginner -> Set Up Git</span> for a very nicely written, step-by-step guide for Windows, MacOS and Linux.</p>

<p class="note">The AppFlower Studio Playground contains a pre-configured appFlower environment with Studio on a fully functional project ready to use.</p> 

<p><b>2.2 Get the AppFlower Repository</b></p>
<pre class="brush: bash">
git clone git://github.com/appflower/appflower_studio_playground.git /your_web_root_path/myproject
</pre>

<p><b>2.3 Fetch AppFlower Dependencies:</b> change your current directory to the project directory and fetch the needed dependencies:</p>

<pre class="brush: bash">
 cd /your_web_root_path/myproject
 git submodule init
 git submodule update
</pre>

<p><b>2.4 Check Environment:</b> you can run the batch/check_configuration.php file to test if your php environment is correctly configured before you continue.</p>

<pre class="brush: bash">
 php batch/check_configuration.php
</pre>

<h3>Step 3: Configuring AppFlower</h3>
<p><b>3.1 Database Settings:</b> Adjust the database settings. Basically, you'll have to update two system files with the name of your MySQL database and the username and password to access it:</p>

<p><span class="code_snippet">myproject/config/databases.yml</span> Locate the lines below and change them appropriately:</p>

<pre class="brush: bash">
all:
  propel:
      ...
      dsn:        mysql:dbname=yourdb;host=localhost
      username:   someuser
      password:   somepass
      ...
</pre>

<p><span class="code_snippet">myproject/config/propel.ini</span> This one is longer, change only the following lines:</p>

<pre class="brush: bash">
...
propel.database.url = mysql:dbname=yourdb;host=localhost
...
propel.database.user = someuser
propel.database.password = somepass
</pre>

<p class="note">Don't forget to make sure that the "yourdb" database actually exists. You should also double check if "someuser" exists and his password is indeed "somepass". Besides the usual rights, this user <b>must</b> also have <b>CREATE and DROP</b> credentials!</p>

<p><b>3.2. Setting Project Permissions</b></p>
<pre class="brush: bash">
 ./symfony project:permission
 ./symfony afs:fix-perms
</pre>

<p><b>3.3. Building Database</b> handler classes and insert the database structure.</p>
<pre class="brush: bash">
 ./symfony propel:build-model
 ./symfony propel:insert-sql
</pre>

<p><b>3.4. Build the cache</b> for AppFlower's XML validator, for best performance:</p>
<pre class="brush: bash">
 ./symfony appflower:validator-cache frontend cache yes
</pre>

<p><b>3.5. Virtual Host</b> Finally, you need to setup a virtual host so you can access the project in browser. If you're familiar with Apache configuration, simply add the following host and update your hosts file with the <i>myproject.local</i> entry. Should you need more information, detailed instructions can be found in <a href="http://www.appflower.com/cms/learn_vhost">Configuring Apache Virtual Hosts</a> chapter.</p>

<script type="syntaxhighlighter" class="brush:bash">
<![CDATA[
<VirtualHost *:80>
  ServerName myproject.local
  DocumentRoot /your_web_root_path/myproject/web

  <Directory "/your_web_root_path/myproject/web">
    AllowOverride All
  </Directory>
</VirtualHost>
]]>
</script>


<h3>Step 4: Open your new Project</h3>
<p>That’s it! If done correctly, you should see a nice user interface, with a simple “Hello world” message displayed when opening <b>http://myproject.local/</b> in your browser.</p>