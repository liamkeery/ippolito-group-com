<?php 
    require_once '../load.php';
    confirm_logged_in();

    $displayJobs= showAllJobs();

if(!$displayJobs){
    $message = 'Failed to get list of jobs.';
}

if(isset($_GET['id'])){
    $job_id = $_GET['id'];
    $delete_result = deletejob($job_id);

    if(!$delete_result){
        $message = 'Failed to delete job.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://kit.fontawesome.com/5a7dc109cc.js" crossorigin="anonymous"></script>
    <title>Ippolito Admin</title>
</head>
<body>
    <div class="grid-container full">
        <nav class="nav">
            <ul class="menu">
                <li><a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
            </nav>
            <h1>Ippolito Admin</h1>
            <hr>

            <div class="grid-x grid-padding-x" id="add">
            <?php echo !empty($message) ? $message : ''; ?>
                <form class="medium-4 cell" action="admin_createjob.php" method="POST">
                        <div class="medium-4 cell">
                            <label><b>Job Title:</b>
                              <input required type="text" name="job" placeholder="Job Title" value="">
                            </label>
                          </div>
                          <div class="medium-4 cell">
                            <label><b>Posting URL:</b>
                              <input required type="text" name="url" placeholder="URL" value="">
                            </label>
                          </div>
                          <button name="submit" class="button"><i class="fas fa-plus-circle"></i>Add Job</button>
              </form>
            </div>

            <hr>

            <h4>Active Job Postings</h4>
            <div class="grid-x grid-padding-x">
                <div class="large-3 cell" id="openings-table">
                    <table class="unstriped stack">
                        <thead>
                          <tr>
                            <th width="200">Posting</th>
                            <th width="170">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $displayJobs->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?php echo '<a class="job fadeIn" href="'.$row['job_url'].'">'.$row['job_name'].'</a>'?></td>
        <td><?php echo '<a style="margin-bottom: 0;" class="button alert" href="admin_deletejob.php?id='.$row['job_id'].'"><i class="fas fa-trash-alt"></i>Delete Job</a>'?></td>
    </tr>
    <?php endwhile;?>
                        </tbody>
                      </table>
                </div>
            </div>
            
    </div>

    
    

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/what-input/dist/what-input.js"></script>
    <script src="../node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/main.js" type="module"></script>
</body>
</html>