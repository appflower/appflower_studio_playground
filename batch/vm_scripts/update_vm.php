#!/usr/bin/env php
<?php
/**
 * This script should be fired from post-merge hook of local vm-image appflower_studio_playground repository
 * It's job is to update VM environment with anything needed
 *
 * This script should track somewhere in the VM system state of it's own each run
 * This is because inside VM system there can be many projects and each of them is physical copy of git repository
 *   and we want to update VM environment only once with given action
 *
 * If VM is used like we intended - this problem should not occure because new projects are clone's of main repository
 *   and while cloning repo - git hooks are not cloned so this script should be hooked only to main studio project
 * However there is never too much of caution :)
 */
