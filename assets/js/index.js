// php data
// 'id',
// 'title',
// 'description',
// 'dueDate',


function ajax(url, method, data) {
    // using fetch API
    return fetch(`/${url}`, {
        method: method,
        body: data
    }).then(response => response.json());
}

function addData() {
    let data = new FormData();
    data.append('title', document.getElementById('title').value);
    data.append('description', document.getElementById('description').value);
    data.append('dueDate', document.getElementById('dueDate').value);

    ajax('includes/add', 'POST', data).then(response => {
        if (response.status === 'success') {
            alert('Data added successfully');
        } else {
            alert('Data not added');
        }
        populateTable()

    });

}

function updateData(id) {
    let data = new FormData();
    const formModalTodo = document.querySelector('#addTodoModal');
    data.append('id', id);
    data.append('title', formModalTodo.querySelector('#title').value);
    data.append('description', formModalTodo.querySelector('#description').value);
    data.append('dueDate', formModalTodo.querySelector('#dueDate').value);


    ajax('includes/edit', 'POST', data).then(response => {
        if (response.status === 'success') {
            alert('Data updated successfully');
        } else {
            alert('Data not updated');
        }
        // close modal
        modal.hide();
        populateTable()

    });
}

function deleteData(id) {
    let data = new FormData();
    data.append('id', id);

    ajax('includes/delete', 'POST', data).then(response => {
        if (response.status === 'success') {
            alert('Data deleted successfully');
        } else {
            alert('Data not deleted');
        }

        populateTable()
    });
}

// populate table with data with ajax
function populateTable() {
    const tableBody = document.querySelector('#tableBody');

    // remove all rows with delay 1s each row after
    const rows = tableBody.querySelectorAll('tr');
    // use for in
    for (const row of rows) {
        row.remove();
    }



    setTimeout(() => {

        ajax('includes/getAll', 'GET').then(response => {
            if (response.status === 'success') {
                let index = 1;
                response.data.forEach(todo => {
                    const row = document.createElement('tr');

                    // Check if the todo is overdue
                    const isOverdue = new Date(todo.dueDate) < new Date();
                    if (isOverdue) {
                        row.classList.add('table-danger');
                    }

                    const indexCell = document.createElement('td');
                    indexCell.textContent = index;
                    row.appendChild(indexCell);


                    const titleCell = document.createElement('td');
                    titleCell.textContent = todo.title;
                    row.appendChild(titleCell);

                    const descriptionCell = document.createElement('td');
                    descriptionCell.textContent = todo.description;
                    row.appendChild(descriptionCell);
                    

                    const createdDateCell = document.createElement('td');
                    createdDateCell.textContent = todo.createdDate;
                    row.appendChild(createdDateCell);

                    const dueDateCell = document.createElement('td');
                    dueDateCell.textContent = todo.dueDate;
                    row.appendChild(dueDateCell);

                    const actionCell = document.createElement('td');
                    const editButton = document.createElement('button');
                    editButton.classList.add('btn', 'btn-primary', 'btn-sm');
                    editButton.setAttribute('data-id', todo.id);
                    editButton.textContent = 'Edit';

                    // Add event listener to edit button
                    editButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        // get data-id attribute
                        const id = e.target.getAttribute('data-id');
                        // get data from server
                        ajax(`includes/get?id=${id}`, 'GET').then(response => {
                            if (response.status === 'success') {
                                const todo = response.data;
                                const formModalTodo = document.querySelector('#addTodoModal');
                                formModalTodo.querySelector('#title').value = todo.title;
                                formModalTodo.querySelector('#description').value = todo.description;
                                formModalTodo.querySelector('#dueDate').value = todo.dueDate;
                                formModalTodo.querySelector('#id').value = todo.id;

                                // show modal
                           
                                modal.show();

                           
                            } else {
                                alert('Data not found');
                            }
                        });
                    });

                    actionCell.appendChild(editButton);

                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'delete');
                    deleteButton.setAttribute('data-id', todo.id);
                    deleteButton.textContent = 'Delete';

                    // Add event listener to delete button
                    deleteButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        // get data-id attribute
                        const id = e.target.getAttribute('data-id');
                        deleteData(id);
                    });

                    actionCell.appendChild(deleteButton);

                    row.appendChild(actionCell);
                    tableBody.appendChild(row);
                    index++
                });
            } else {
                alert('Data not found');
            }
        });
    }, 250)
}


// main operation


populateTable();

const formAddTodo = document.querySelector('#addTodo');
const formAddTodoModal = document.querySelector('#addTodoModal');
const modal = new bootstrap.Modal(document.getElementById('addTodoModal'), {
    keyboard: false
});

formAddTodo.addEventListener('submit', (e) => {
    e.preventDefault();
    addData();
});

formAddTodoModal.addEventListener('submit', (e) => {
    e.preventDefault();
    const formModalTodo = document.querySelector('#addTodoModal');
    const id = formModalTodo.querySelector('#id').value;
    updateData(id);
});

const deleteButtons = document.querySelectorAll('.delete');
deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener('click', (e) => {
        e.preventDefault();
        // get data-id attribute
        const id = e.target.getAttribute('data-id');
        deleteData(id);
    });
});