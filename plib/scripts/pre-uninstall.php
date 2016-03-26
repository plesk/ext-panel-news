<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH.
pm_Context::init('panel-news');

$taskId = pm_Settings::get('periodic_task_id');
if (!$taskId) {
    return;
}

try {
    $task = pm_Scheduler::getInstance()->getTaskById($taskId);
    pm_Scheduler::getInstance()->removeTask($task);
} catch (pm_Exception $e) {
    echo $e->getMessage();
}

