<?php
if (isset($_POST['question'])) {

    $question = $_POST['question'];
    $type = $_POST['type'];
    $order = $_POST['order'];
?>
    <div class="card d-block">
        <div class="card-body">
            <h5>Question:<?= $order ?></h5>
            <h4 class="mt-0">
                <a href="apps-projects-details.html" class="text-title"><?= $question ?></a>
                </h3>
                <div class="badge bg-success mb-3"><?= $type ?></div>
        </div>
    </div>
<?php
}
?>