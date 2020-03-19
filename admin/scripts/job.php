<?php

function createJob($job_name, $job_url){
    $pdo = Database::getInstance()->getConnection();

    $create_job_query = 'INSERT INTO tbl_jobs(job_name, job_url)';
    $create_job_query .= ' VALUES(:job, :url)';

    $create_job_result = $pdo->prepare($create_job_query);
    $create_job_result->execute(
        array(
            ':job'=>$job_name,
            ':url'=>$job_url,
        )
    );

    if($create_job_result){
        redirect_to('index.php');
    }else{
        return 'There was an error creating the user.';
    }
}

function getSingleJob($id) {
    $pdo = Database::getInstance()->getConnection();

    $get_job_query = 'SELECT * FROM tbl_jobs WHERE job_id = :id';
    $get_job_set = $pdo->prepare($get_job_query);
    $get_job_result = $get_job_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($get_job_result){
        return $get_job_set;
    }else{
        return 'There was a problem accessing the job.';
    }
}

function showAllJobs() {
    $pdo = Database::getInstance()->getConnection();

    $get_jobs_query = 'SELECT * FROM tbl_jobs';
    $results = $pdo->query($get_jobs_query);

    if ($results){
        return $results;
    }else{
        return 'There was a problem accessing this information.';
    }
}

function deleteJob($job_id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_job_query = 'DELETE FROM tbl_jobs WHERE job_id = :id';
    $delete_job_set= $pdo->prepare($delete_job_query);
    $delete_job_result = $delete_job_set->execute(
                array(
                    ':id'=>$job_id
                )
            );


    if($delete_job_result && $delete_job_set->rowCount() > 0){
        redirect_to('index.php');
    } else {
        return false;
    }

}

?>