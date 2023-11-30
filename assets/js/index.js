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
    data.append('id', id);
    data.append('title', document.getElementById('title').value);
    data.append('description', document.getElementById('description').value);
    data.append('dueDate', document.getElementById('dueDate').value);

    ajax('includes/update', 'POST', data).then(response => {
        if (response.status === 'success') {
            alert('Data updated successfully');
        } else {
            alert('Data not updated');
        }
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



const formAddTodo = document.querySelector('#addTodo');

formAddTodo.addEventListener('submit', (e) => {
    e.preventDefault();
    addData();
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

populateTable();