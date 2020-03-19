<?php

require_once '../load.php';
confirm_logged_in();

$displayJobs= showAllJobs();

if(!$displayJobs){
    $message = 'Failed to get list of jobs.';
}

if(isset($_GET['id'])){
    $job_id = $_GET['id'];
    $delete_result = deleteJob($job_id);

    if(!$delete_result){
        $message = 'Failed to delete the job.';
    }
}

?>