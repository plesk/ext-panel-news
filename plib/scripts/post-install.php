<?php
// Copyright 1999-2015. Parallels IP Holdings GmbH. All Rights Reserved.
pm_Context::init('panel-news');

Modules_PanelNews_News::load();

$task = new pm_Scheduler_Task();
$task->setSchedule(pm_Scheduler::$EVERY_DAY);
$task->setCmd('periodic-task.php');

pm_Scheduler::getInstance()->putTask($task);
pm_Settings::set('periodic_task_id', $task->getId());

