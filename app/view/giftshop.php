<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gift Shop</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/giftshop_add"><button class="btn btn-success">New item</button></a>
    </div>
    <!-- Content Row -->
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
    <?php if (!empty($data['data'])): ?>
        <?php foreach ($data['data'] as $row): ?>
            <?php $i += 1 ?>
            <div class="col-xl-3 col-md-6 mb-4 event-item" data-id="<?php echo $row['id']; ?>">
                <div class="card shadow h-100">
                    <div class="card-img-div">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Item Image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <h6 class="card-title"><?php echo $row['price']; ?> £</h6>
                        <p class="card-text"><?php echo truncateString($row['description'], 87);?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                            <a href="/giftshop_edit?id=<?php echo $row["id"] ?>" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
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
    <script src="js/script2.js"></script>
        <!-- Event Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 1</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 2</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 3</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 4</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 5</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 6</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 7</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 8</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 9</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 10</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 11</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Product 12</h5>
                    <p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>