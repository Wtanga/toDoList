<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<a class="btn btn-success" href="/user/logout">Logout</a>
<section>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-9 col-xl-9">
                <div class="card rounded-3">

                    <table class="table mb-4">
                        <thead>
                        <tr >
                            <th class="col-2">Status</th>
                            <th class="col-2">User</th>
                            <th class="col-2">Email</th>
                            <th class="col-3">Task</th>
                            <th class="col-1">Was changed</th>
                            <th class="col-2">date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <th class="text-center" scope="row">
                                    <form method="post" id="complete-<?= $task->id ?>"
                                          action="/user/complete/<?= $task->id ?>">
                                        <input onchange="$('form#complete-<?= $task->id ?>').submit()"
                                               type="checkbox" <?= $task->status ? "checked" : "" ?>>
                                    </form>
                                </th>
                                <td><?= htmlentities($task->username, ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlentities($task->email, ENT_QUOTES, 'UTF-8') ?></td>
                                <td >
                                    <form method="post" id="editText-<?= $task->id ?>" action="/user/editText/<?= $task->id ?>">
                                        <input name="text" type="text" value="<?= htmlentities($task->text, ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="submit" class="btn btn-success btn-sm" value="Save">
                                    </form>
                                </td>
                                <td><?= $task->wasChanged ? "Yes" : "No" ?></td>
                                <td><?= $task->date ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
