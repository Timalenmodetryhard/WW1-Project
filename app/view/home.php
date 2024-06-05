<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="#"><button type="button" class="btn btn-danger" id="confirmDelete">Delete</button></a>
            </div>
        </div>
    </div>
</div>


<!-- Content Row -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="/event_add"><button class="btn btn-success">New event</button></a>
</div>
<div class="row">
<?php 
$i=0;
$event = false;
function truncateString($string, $limit, $break=" ", $pad="...")
{
    // return with no change if string is shorter than $limit
    if (strlen($string) <= $limit) return $string;

    $string = substr($string, 0, $limit);

    if (false !== ($breakpoint = strrpos($string, $break))) {
        $string = substr($string, 0, $breakpoint);
    }

    return $string . $pad;
}
?>
<?php if (!empty($data['data']['events'])): ?>
    <?php foreach ($data['data']['events'] as $row): ?>
        <?php $i += 1 ?>
        <div class="col-xl-3 col-md-6 mb-4 event-item" data-id="<?php echo $row['id']; ?>" <?php if ($i>4) echo 'style="display: none;"'; ?>>
            <div class="card shadow h-100">
                <div class="card-img-div">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Event Image">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo truncateString($row['description'], 87);?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="/event_edit?id=<?php echo $row["id"] ?>" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="event-nothing">
        <h1>Events you add will be shown here</h1>
    </div>
<?php endif ?>
</div>
<?php if($i > 4): ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <button id="toggle-events" class="btn btn-primary">Show more</button>
    </div>
    <?php endif ?>
<script src ="js/script.js"></script>
<!-- Content Row -->

<div class="row">
    <!-- Schedule Card -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <style>
                .delete-icon, .edit-icon, .note-icon{
                    margin-right: 20px;
                }    
            </style>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Weekly Schedule</h6> 
                
                <div>
                    <a href="/schedule_edit" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="scheduleTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Opening Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['data']['schedule'])): ?>
                                <?php foreach ($data['data']['schedule'] as $row): ?>
                                    <tr data-toggle="modal" data-target="#mondayModal">
                                        <td><?php echo $row["day"] ?></td>
                                        <td><?php echo $row["status"] ?></td>
                                        <?php if($row["hours"]): ?>
                                            <td><?php echo $row["hours"] ?></td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($data['data']['schedule'])): ?>
        <?php foreach ($data['data']['schedule'] as $row): ?>
            <div class="modal fade" id="<?php echo strtolower($row["day"]); ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo strtolower($row["day"]); ?>ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="<?php echo strtolower($row["day"]); ?>ModalLabel"><?php echo $row["day"]; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if($row["status"] === "Open"): ?>
                                <p><?php echo $row["day"]; ?> is open from <?php echo $row["hours"]; ?>.</p>
                            <?php elseif($row["status"] === "Closed"): ?>
                                <p><?php echo $row["day"]; ?> is closed.</p>
                            <?php endif ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        <?php endforeach ?>
    <?php else: ?>
        <h2>Error with the connection with the database</h2>
    <?php endif ?>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gift Shop</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <?php 
                $i=0;
                ?>
                <?php if (!empty($data['data']['items'])): ?>
                    <?php foreach ($data['data']['items'] as $row): ?>
                        <?php if ($i<4):?>
                            <?php if($i%2===0): ?>
                                <div class="row">
                            <?php endif ?>              
                                <div class="col-lg-6 mb-4">
                                    <img src="<?php echo $row['image'] ?>" class="img-fluid rounded" alt="<?php echo $row['name'] ?>">
                                    <p class="text-center mt-2"><?php echo $row['name'] ?></p>
                                </div>
                            <?php if($i%2===0): ?>
                                </div>
                            <?php endif ?>
                            <?php $i+=1; ?>
                        <?php endif ?>
                    <?php endforeach ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="/giftshop" class="btn btn-primary btn-block">Show more</a>
                        </div>
                    </div>
                <?php else: ?>
                    <h2>Items you add will be shown here</h2>
                <?php endif ?>
                </div>
            </div>
       </div>                                                      
</div>