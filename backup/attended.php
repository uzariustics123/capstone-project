<div class="tasks">
    <h5 class=" mt-0 task-header text-uppercase">Attended</h5>
    <?php
    $query = "SELECT * FROM events
                                                    RIGHT OUTER JOIN participants ON participants.event_id = events.event_id
                                                    RIGHT OUTER JOIN members ON participants.member_reference_id = members.member_id
                                                    RIGHT OUTER JOIN users ON members.user_reference_id = users.userid
                                                    RIGHT OUTER JOIN attendances ON attendances.event_reference_id = events.event_id
                                                    WHERE users.userid = $user AND participant_status = 'confirmed'
                                                    GROUP BY events.event_id
                                                    HAVING COUNT(*) > 0
                                                    ORDER BY event_date ASC;";

    $results = $conn->query($query);
    while ($row = $results->fetch_assoc()) {
    ?>
        <div id="task-list-three" class="task-list-items">
            <div class="card mb-0">
                <div class="card-body p-3">
                    <small class="float-end text-muted"><?= $row['event_date'] ?></small>

                    <span class="badge bg-info">Attended</span>
                    <h3 class="mt-2 mb-2 text-center">
                        <?= $row['event_name'] ?>

                    </h3>
                    <div class="text-center">
                        <a href="javascript:void(0)" class="btn btn-info evaluate" data-bs-toggle="modal" data-bs-target="#evaluate_modal" data-event_id="<?= $row['event_id'] ?>">Evaluate</a>
                    </div>
                </div> <!-- end card-body -->
            </div>
        </div>
    <?php } ?>
</div>