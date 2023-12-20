    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <img src="https://media.tenor.com/-AyTtMgs2mMAAAAi/nyan-cat-nyan.gif" style="margin: auto; display: block; width: 6em;">
                <h1 class="text-center">Welcome to <?= APP_NAME ?></h1>
                <p class="text-center">Stay organized and manage your tasks efficiently.</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form id="addTodo">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        <input type="text" class="form-control" id="description" placeholder="Description" name="description" required>
                        <input type="datetime-local" class="form-control" id="dueDate" name="dueDate" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Add Todo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive table-striped">
            <table class="table mt-5" id="table-todo">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
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

    <!-- Add Todo Modal -->
    <div class="modal fade" id="addTodoModal" tabindex="-1" role="dialog" aria-labelledby="addTodoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTodoModalLabel">Edit Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTodoForm">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" placeholder="Description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date</label>
                            <input type="datetime-local" class="form-control" id="dueDate" name="dueDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="addTodoForm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>