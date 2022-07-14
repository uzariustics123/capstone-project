<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" enctype="multipart/form-data">

                    <div class="mb-1 mt-1">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="input" name="firstname" class="form-control" id="efirstname" required>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="middlename" class="form-label">Middlename</label>
                        <input type="input" name="middlename" class="form-control" id="emiddlename" required>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="department" class="form-label">Lastname</label>
                        <input type="input" name="lastname" class="form-control" id="elastname" required>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="eemail" required>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="ecourse" class="form-label">Course</label>
                        <input type="input" name="ecourse" class="form-control" id="ecourse" required>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="yearlevel-select" class="form-label">Year Level</label>
                        <select class="form-select" name="yearlevel-select" id="eyearlevel-select">
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>

                        </select>
                    </div>
                    <div class="mb-1 mt-1">
                        <label for="usertype-select" class="form-label">Usertype</label>
                        <select class="form-select" name="eusertype-select" id="eusertype-select">
                            <option>Participant</option>
                            <option>Organizer</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>