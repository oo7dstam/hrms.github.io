<?php	
	
	$pendingLeaeveModel = new LeaveModel_cloud;
	$pendingLeaves = $pendingLeaeveModel->getPendingLeaves(array($id));
?>
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#"><em class="fa fa-home"></em></a>
            </li>
            <li class="active">
                <a href="./index.php?action=Employee">Leave Management</a>
            </li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-10">

            <h1 class="page-header">Pending Leaves</h1>
        </div>
    </div><!--/.row-->




    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <colgroup>
                        <colspan width="10%">
                        <colspan width="20%">
                        <colspan width="20%">
                        <colspan width="20%">
                        <colspan width="10%">
                        <colspan width="10%">
                        <colspan width="10%">
                    </colgroup>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Leave Type</th>                        
                        <th>Date Submmitted</th>
                        <th>Status</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($pendingLeaves)){
//                          
                            $i=1;
                            foreach($pendingLeaves as $values ){
                                $status = "";
                                $number = $i++;

                                if($values['status']==1){
                                    $status ="<label class='label label-success'>Approved</labe>";
                                }else if($values['status']==2){
                                    $status ="<label class='label label-danger'>Disapproved</labe>";
                                }else if($values['status']==3){
                                    $status ="<label class='label label-default'>Waiting</labe>";
                                }
                                
                                if($values['leave_type'] == 1){
                                    $leaveType = "Maternity / Paternity";
                                }elseif($values['leave_type'] == 2){
                                    $leaveType = "Vacation";
                                }elseif($values['leave_type'] == 3){
                                     $leaveType = "Sick";
                                }
                               
                                $submmitted = date("F jS, Y", strtotime($values['application_date']));

                                echo "<tr>
                                    <td>".$number."</td>
                                    <td>".$values['name']."</td>
                                    <td>".$leaveType."</td>
                                    <td>".$submmitted."</td>
                                    <td>".$status."</td>
                                    <td class='text-center'><a href='index.php?action=leaveDetails&id=".$values['id']."'><button class='btn btn-md btn-info'>View Details</button></a></td>
                                    </tr>";


//                                    echo $values    ;
                            }
//                                



//								echo "<pre>";
//								var_dump($values);
//                                echo "</pre>";


                        }else{
                            echo "
                                <tr>
                                    <td colspan='7'>No found result.</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div><!--/.row-->
</div>	<!--/.main-->
	
<?php
    include_once('./includes/footer.php');                             
//    include 'modal/successApplyLeave.php';
//    include 'modal/errorApplyLeave.php';
?>
