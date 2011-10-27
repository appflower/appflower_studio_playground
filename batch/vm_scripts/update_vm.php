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
 * 
 * Also one more important warning.
 * If there will be a use that is pulling many changes with one 'git pull'
 *   (someone that has old vmware image and he did not used it for a year)
 *   then this script will be launched only once and possibly there will be
 *   many "changes" to apply and they should be applied only once and in correct
 *   order.
 *   This means we should implement here in this script something like propel
 *   migrations mechanism. So each change should be timestamped so we know
 *   the correct order and also we need to keep track of wchich changes was
 *   already applied to know where we should start from
 */
