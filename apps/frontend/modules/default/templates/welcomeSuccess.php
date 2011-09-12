<?php echo stylesheet_tag('welcome/general.css') ?>
  <div id="page">
    <div id="logo">
      <a href="http://www.appflower.com"><h1>Appflower</h1></a>
      <p>Version 1.0</p>
      <div class="clear"></div>
    </div>
    <div id="primary_content" class="content">
      <h2>The AppFlower Studio</h2>
      <p>Welcome to your new AppFlower project. AppFlower enables you to easily make data-oriented applications. To get started making your first application just fire up the visual designer <a target="_blank" href="/studio">Studio</a>. You can use AppFlower Studio to create an entire application, without the need to edit the project with a traditional IDE.</p>

      <p class="link" style="font-size: 26px"><a class="button" target="_blank" href="/studio">Start Studio</a></p>
    </div>
    <?php if (isset($vhosts) && count($vhosts) > 0) { ?>
    <div class="content">
      <p>To load other AppFlower/Studio projects that exists in current environment - click one of the links below:</p>
      <ul>
          <?php
          /* @var $vhost ServerVirtualHost */
          foreach ($vhosts as $vhost) {
              $port = $vhost->getPort();
              $slug = $vhost->getSlug();
              $vhostUrl = "http://$_SERVER[SERVER_ADDR]:$port";
              echo '<li>'.link_to($slug, $vhostUrl).'</li>';
          }
          ?>
      </ul>
    </div>
    <?php } ?>
  </div>
