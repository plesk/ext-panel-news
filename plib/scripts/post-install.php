<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
pm_Context::init('panel-news');

Modules_PanelNews_News::load();

$tasks = pm_Scheduler::getInstance()->listTasks();
foreach ($tasks as $task) {
    if ('periodic-task.php' == $task->getCmd()) {
        pm_Settings::set('periodic_task_id', $task->getId());
        return;
    }
}

$task = new pm_Scheduler_Task();
$task->setSchedule(pm_Scheduler::$EVERY_DAY);
$task->setCmd('periodic-task.php');

pm_Scheduler::getInstance()->putTask($task);
pm_Settings::set('periodic_task_id', $task->getId());

