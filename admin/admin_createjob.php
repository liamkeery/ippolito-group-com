<?php 
    require_once '../load.php';
    confirm_logged_in();

    if(isset($_POST['submit'])){
      $job_name = trim($_POST['job']);
      $job_url = trim($_POST['url']);
  
      if (empty($job_name) || empty($job_url)){
          $message = 'Please fill out the required fields.';
      }else{
          $message = createJob($job_name, $job_url);
      }
  }
?>