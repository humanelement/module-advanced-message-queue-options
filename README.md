# HumanElement_AdvancedMessageQueueOptions

This module adds the ability to set a directory for the message queue consumers PIDs under the var directory.

That way you can share that directory and not loose track of the PIDs between deployments

It also gives you a CLI command to create an updated poison pill version.

This allows you to choose at the end of a deployment to have Magento restart the consumers

It is also recommended to install a patch to get the consumers_wait_for_messages feature that way even when there is no messages to process between deployments and thus your poison pill won't kill the process you will know a new process with your new deployment directory will be started.

## Installation

composer require human-element/module-advanced-message-queue-options

## Changing Consumer PIDs to a directory

You can change to use a directory under var for your message consumer PIDs using the following option in your env.php

```
return array (
    'cron_consumers_runner' => array(
        'pid_dir' => 'mqpid'
    )
);
```

This will put the message queue PIDs into var/mqpid instead of the root of var

## This will put a new poison pill version into the database causing all the consumers to restart the process on the next message

php bin/magento he:queue:consumers:poison

## Recommended Patch

todo

## Related Issues

https://github.com/magento/magento2/issues/23540

https://github.com/magento/magento2/issues/17951

https://github.com/magento/community-features/issues/181

https://github.com/magento/architecture/pull/232

https://github.com/magento/magento2/commit/4e960c31bf345f59a4eccc16832a3a737d4ce8b8
