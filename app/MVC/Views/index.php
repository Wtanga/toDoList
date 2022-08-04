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
    <a class="btn btn-success" href="/user/login">Login</a>
        <section>
            <div class="row justify-content-center">
                <div class="col-lg-4 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <?php if(isset($success) && $success !== ''): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $success ?>
                                </div>
                            <?php endif; ?>
                            <h2>Create task</h2>
                            <form method="post" action="/todos/create">
                                <input name="username" type="text" placeholder="Username" class="form-control mt-2" required>
                                <input name="email" type="email" placeholder="email@email.com" class="form-control mt-2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                <input name="text" type="text" placeholder="Task text" class="form-control mt-2" required>
                                <input type="submit" class="btn btn-success mt-2" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-lg-9 col-xl-9">
                        <div class="card rounded-3">

                                <table class="table mb-4">
                                    <thead>
                                        <tr class="no-gutters">
                                            <th class="col-2">
                                                <a href="?page=<?=$currentPage?>&sort=status&order=desc">&#129147;</a>
                                                <a href="?page=<?=$currentPage?>&sort=status&order=asc">&#129145;</a>
                                                Status
                                            </th>
                                            <th class="col-2">
                                                <a href="?page=<?=$currentPage?>&sort=username&order=desc">&#129147;</a>
                                                <a href="?page=<?=$currentPage?>&sort=username&order=asc">&#129145;</a>
                                                User
                                            </th>
                                            <th class="col-2">
                                                <a href="?page=<?=$currentPage?>&sort=email&order=desc">&#129147;</a>
                                                <a href="?page=<?=$currentPage?>&sort=email&order=asc">&#129145;</a>
                                                Email
                                            </th>
                                            <th class="col-3">Task</th>
                                            <th class="col-1">Was changed</th>
                                            <th class="col-2 text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <th class="text-center" scope="row">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            type="checkbox" <?= $task->status ? "checked" : "" ?> disabled>
                                        </th>
                                        <td><?= htmlentities($task->username, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlentities($task->email, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlentities($task->text, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= $task->wasChanged ? "Yes" : "No" ?></td>
                                        <td><?= $task->date ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <ul class="pagination justify-content-center">
                                    <?php for($i = 1; $i <= $pages; $i++): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?=$i?>&sort=<?=$sort?>&order=<?=$order?>"><?=$i?></a></li>
                                    <?php endfor; ?>
                                </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
