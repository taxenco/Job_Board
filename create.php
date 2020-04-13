<?php include_once 'config/init.php';?>

<?php
$job = new Job;
if (isset($_POST['submit'])) {
    //create Data Array
    $data = array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category_id'];
    $data['job_description'] = $_POST['job_description'];
    $data['job_location'] = $_POST['job_location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];
    if($job->create($data)){
        redirect('index.php', 'Your job has been listed','success');
    }else{
        redirect('index.php', 'Something went wrong','error');
    }
}
$template = new Template('template/job-create.php');
$template->categories = $job->getCategories();
echo $template;
?>