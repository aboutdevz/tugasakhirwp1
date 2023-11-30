

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <img src="https://media.tenor.com/-AyTtMgs2mMAAAAi/nyan-cat-nyan.gif" style="margin: auto; display: block; width: 6vw;">
                <h1 class="text-center">Welcome to <?= APP_NAME ?></h1>
                <p class="text-center">Stay organized and manage your tasks efficiently.</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form id="addTodo">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                        <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                        <input type="datetime-local" class="form-control" id="dueDate" name="dueDate">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Add Todo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mt-5" id="table-todo">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                </tbody>
            </table>
        </div>
    </div>