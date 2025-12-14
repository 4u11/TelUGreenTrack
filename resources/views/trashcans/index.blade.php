@extends('layouts.app')

@section('title', 'Trashcan Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Trashcan Management</h2>
    </div>

    <div class="card mb-4" id="adminSection" style="display: none;">
        <div class="card-header bg-white fw-bold text-success">Add New Trashcan</div>
        <div class="card-body">
            <form id="addTrashcanForm">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="location" class="form-control" placeholder="Location" required>
                    </div>
                    <div class="col-md-4">
                        <select id="waste_type" class="form-control">
                            <option value="organic">Organic</option>
                            <option value="inorganic">Inorganic</option>
                            <option value="hazardous">Hazardous</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="capacity" class="form-control" placeholder="Capacity (L)" required>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success w-100">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Location</th>
                        <th class="text-center">Type</th>
                        <th class="text-center" style="width: 30%;">Fill Level</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="trashcanTableBody"></tbody>
            </table>
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
@endsection

@push('scripts')
<script>
    const apiUrl = '/api/trashcans';
    let editModal;
    if (role === 'admin') {
        document.getElementById('adminSection').style.display = 'block';
    }

    async function loadTrashcans() {
        try {
            const response = await fetch(apiUrl, {
                headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
            });

            if (response.status === 401) { window.location.href = '/login'; return; }

            const result = await response.json();
            const tbody = document.getElementById('trashcanTableBody');
            tbody.innerHTML = '';

            (result.data || []).forEach(item => {
                let buttons = '';
                let progressColor = 'bg-success';
                if(item.fill_level > 50) progressColor = 'bg-warning';
                if(item.fill_level > 80) progressColor = 'bg-danger';

                if (role === 'admin') {
                    buttons = `
                        <button class="btn btn-primary btn-sm me-1"
                            onclick="openEditModal(${item.id}, '${item.location}', ${item.fill_level})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteItem(${item.id})">Delete</button>
                    `;
                } else {
                    buttons = `<span class="badge bg-light text-dark border">View Only</span>`;
                }

                tbody.insertAdjacentHTML('beforeend', `
                    <tr>
                        <td>${item.location}</td>
                        <td class="text-center"><span class="badge bg-secondary">${item.waste_type}</span></td>
                        <td class="text-center">
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar ${progressColor}" style="width: ${item.fill_level}%">${item.fill_level}%</div>
                            </div>
                        </td>
                        <td class="text-center">${buttons}</td>
                    </tr>
                `);
            });
        } catch (error) {
            console.error("Error:", error);
        }
    }

    document.getElementById('addTrashcanForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const data = {
            location: document.getElementById('location').value,
            waste_type: document.getElementById('waste_type').value,
            capacity: document.getElementById('capacity').value
        };

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert("Success: Trashcan Added");
            e.target.reset();
            loadTrashcans();
        } else {
            const err = await response.json();
            alert("Failed: " + (err.message || "Unknown error"));
        }
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
        const data = { location: document.getElementById('edit_location').value, fill_level: document.getElementById('edit_fill_level').value };
        await fetch(`${apiUrl}/${id}`, { method: 'PUT', headers: { 'Authorization': `Bearer ${token}`, 'Content-Type': 'application/json' }, body: JSON.stringify(data) });
        editModal.hide();
        loadTrashcans();
    }

    async function deleteItem(id) {
        if(!confirm('Delete?')) return;
        await fetch(`${apiUrl}/${id}`, { method: 'DELETE', headers: { 'Authorization': `Bearer ${token}` } });
        loadTrashcans();
    }

    loadTrashcans();
</script>
@endpush
