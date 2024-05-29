<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

<!-- Event Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card shadow h-100">
<img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image">
<div class="card-body">
<h5 class="card-title">Event Title 1</h5>
<p class="card-text">This is a brief description of the event. It provides an overview of what the event is about.</p>
<div class="d-flex justify-content-between align-items-center">
<a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
<a href="/WW1-Project-Admin-Panel/edit.html" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
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
<h5 class="card-title">Event Title 2</h5>
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
<h5 class="card-title">Event Title 3</h5>
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
<h5 class="card-title">Event Title 4</h5>
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
                    <a href="#" class="note-icon"><i class="fas fa-sticky-note"></i></a> 
                    <a href="#" class="edit-icon"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" class="delete-icon"><i class="fas fa-trash-alt"></i></a>
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
                            <tr data-toggle="modal" data-target="#mondayModal">
                                <td>Monday</td>
                                <td>Closed</td>
                                <td>-</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#tuesdayModal">
                                <td>Tuesday</td>
                                <td>Open</td>
                                <td>11am - 2pm</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#wednesdayModal">
                                <td>Wednesday</td>
                                <td>Open</td>
                                <td>11am - 2pm</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#thursdayModal">
                                <td>Thursday</td>
                                <td>Open</td>
                                <td>11am - 2pm</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#fridayModal">
                                <td>Friday</td>
                                <td>Closed</td>
                                <td>-</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#saturdayModal">
                                <td>Saturday</td>
                                <td>Closed</td>
                                <td>-</td>
                            </tr>
                            <tr data-toggle="modal" data-target="#sundayModal">
                                <td>Sunday</td>
                                <td>Open</td>
                                <td>11am - 2pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Modal for Monday -->
        <div class="modal fade" id="mondayModal" tabindex="-1" role="dialog" aria-labelledby="mondayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mondayModalLabel">Monday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Monday is closed.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Tuesday -->
        <div class="modal fade" id="tuesdayModal" tabindex="-1" role="dialog" aria-labelledby="tuesdayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tuesdayModalLabel">Tuesday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tuesday is open from 11am to 2pm.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Wednesday -->
        <div class="modal fade" id="wednesdayModal" tabindex="-1" role="dialog" aria-labelledby="wednesdayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="wednesdayModalLabel">Wednesday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Wednesday is open from 11am to 2pm.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Thursday -->
        <div class="modal fade" id="thursdayModal" tabindex="-1" role="dialog" aria-labelledby="thursdayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="thursdayModalLabel">Thursday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Thursday is open from 11am to 2pm.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Friday -->
        <div class="modal fade" id="fridayModal" tabindex="-1" role="dialog" aria-labelledby="fridayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fridayModalLabel">Friday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Friday is closed.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Saturday -->
        <div class="modal fade" id="saturdayModal" tabindex="-1" role="dialog" aria-labelledby="saturdayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="saturdayModalLabel">Saturday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Saturday is closed.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Sunday -->
        <div class="modal fade" id="sundayModal" tabindex="-1" role="dialog" aria-labelledby="sundayModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sundayModalLabel">Sunday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Sunday is open from 11am to 2pm.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
    




        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gift Shop</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!-- Image 1 -->
                        <div class="col-lg-6 mb-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Product Image 1">
                            <p class="text-center mt-2">Product 1</p>
                        </div>
                        <!-- Image 2 -->
                        <div class="col-lg-6 mb-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Product Image 2">
                            <p class="text-center mt-2">Product 2</p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Image 3 -->
                        <div class="col-lg-6 mb-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Product Image 3">
                            <p class="text-center mt-2">Product 3</p>
                        </div>
                        <!-- Image 4 -->
                        <div class="col-lg-6 mb-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Product Image 4">
                            <p class="text-center mt-2">Product 4</p>
                        </div>
                    </div>
                    <!-- Show Now Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="/giftshop" class="btn btn-primary btn-block">Show now</a>
                        </div>
                    </div>
                </div>
            </div>
       </div>                                                      
</div>