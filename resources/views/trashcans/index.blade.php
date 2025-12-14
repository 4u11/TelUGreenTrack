<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trashcan Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Trashcan Management</h2>
            <a href="/users-ui" class="btn btn-outline-secondary">Go to User Management</a>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">Add New Trashcan</div>
            <div class="card-body">
                <form id="addTrashcanForm">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Location</label>
                            <input type="text" id="location" class="form-control" placeholder="e.g. TULT Gate 1" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Waste Type</label>
                            <select id="waste_type" class="form-control" required>
                                <option value="organic">Organic</option>
                                <option value="inorganic">Inorganic</option>
                                <option value="hazardous">Hazardous</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Capacity (Liters)</label>
                            <input type="number" id="capacity" class="form-control" placeholder="e.g. 50" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Trashcan</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th style="width: 25%;">Fill Level</th> <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="trashcanTableBody">
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Trashcan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <div class="mb-3">
                        <label>Location</label>
                        <input type="text" id="edit_location" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Fill Level (%)</label>
                        <input type="number" id="edit_fill_level" class="form-control" min="0" max="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="updateTrashcan()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const apiUrl = '/api/trashcans';
        let editModal;
        
        async function loadTrashcans() {
            try {
                const response = await fetch(apiUrl);
                const result = await response.json();

                const tableBody = document.getElementById('trashcanTableBody');
                tableBody.innerHTML = '';

                const trashcans = result.data ? result.data : result;

                trashcans.forEach(trashcan => {
                    let progressColor = 'bg-success';
                    if(trashcan.fill_level > 50) progressColor = 'bg-warning';
                    if(trashcan.fill_level > 80) progressColor = 'bg-danger';

                    const row = `
                        <tr>
                            <td>${trashcan.id}</td>
                            <td>${trashcan.location}</td>
                            <td><span class="badge bg-secondary">${trashcan.waste_type}</span></td>
                            <td>${trashcan.capacity} L</td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar ${progressColor}" role="progressbar"
                                        style="width: ${trashcan.fill_level}%"
                                        aria-valuenow="${trashcan.fill_level}" aria-valuemin="0" aria-valuemax="100">
                                        ${trashcan.fill_level}%
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm"
                                    onclick="openEditModal(${trashcan.id}, '${trashcan.location}', ${trashcan.fill_level})">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="deleteTrashcan(${trashcan.id})">Delete</button>
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            } catch (error) {
                console.error("Error loading data:", error);
            }
        }

        document.getElementById('addTrashcanForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = {
                location: document.getElementById('location').value,
                waste_type: document.getElementById('waste_type').value,
                capacity: document.getElementById('capacity').value,
                fill_level: 0
            };

            await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(data)
            });

            e.target.reset();
            loadTrashcans();
        });

        function openEditModal(id, location, fillLevel) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_fill_level').value = fillLevel;

            editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }

        async function updateTrashcan() {
            const id = document.getElementById('edit_id').value;
            const data = {
                location: document.getElementById('edit_location').value,
                fill_level: document.getElementById('edit_fill_level').value
            };

            await fetch(`${apiUrl}/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(data)
            });

            editModal.hide();
            loadTrashcans();
        }

        async function deleteTrashcan(id) {
            if(!confirm('Are you sure you want to delete this trashcan?')) return;

            await fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            });
            loadTrashcans();
        }

        loadTrashcans();
    </script>
</body>
</html>
