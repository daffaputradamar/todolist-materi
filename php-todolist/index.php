<?php
include_once('./layouts/header.php');
include_once('./config/db.php');

db();
global $link;
?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
        <h2 class="mb-0">Todo List</h2>
        <a class="btn btn-lg btn-primary" href="todos/create.php">
            Tambah Todo
        </a>
    </div>
    <?php

    $query = "SELECT * FROM todos";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "<h5 class='text-center mt-5 text-secondary'>Todo list masih kosong</h5>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-1">
                        <?php
                        if ($row['is_completed']) {
                        ?>
                            <h4 class="text-success">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                </svg>
                            </h4>
                        <?php
                        } else {
                        ?>
                            <h4 class="text-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </h4>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-between">
                            <?= $row['todo'] ?>
                            <?php
                            if ($row['is_completed']) {
                            ?>
                                <div class="dropdown">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-secondary py-3" href="todos/undo_post.php?id=<?= $row['id'] ?>">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                            </svg> Batalkan</a>
                                        <a class="dropdown-item text-danger py-3" href="todos/delete_post.php?id=<?= $row['id'] ?>">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg> Hapus</a>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <a class="btn btn-outline-success" href="todos/edit_post.php?id=<?= $row['id'] ?>">
                                    Selesaikan
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php
mysqli_close($link);
include_once('./layouts/footer.php');
?>