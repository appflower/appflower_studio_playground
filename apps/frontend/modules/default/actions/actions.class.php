<?php
class defaultActions extends CustomActions
{
  public function executeWelcome()
  {
      try {
          $serverEnv = afStudioUtil::getServerEnvironment();
          $vhosts = $serverEnv->getExistingVhosts();
          $this->vhosts = $vhosts->getAll();
      } catch(ServerException $e) {
          if (sfConfig::get('sf_environment') == 'dev') {
              throw $e;
          }
      }
  }	
}