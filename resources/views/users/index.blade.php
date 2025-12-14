@extends('layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>User Management</h2>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-white fw-bold text-primary">Register New User</div>
        <div class="card-body">
            <form id="addUserForm">
                <div class="row">
                    <div class="col-md-3 mb-2"><input type="text" id="name" class="form-control" placeholder="Full Name" required></div>
                    <div class="col-md-3 mb-2"><input type="email" id="email" class="form-control" placeholder="Email Address" required></div>
                    <div class="col-md-3 mb-2"><input type="password" id="password" class="form-control" placeholder="Password" required></div>
                    <div class="col-md-2 mb-2">
                        <select id="role" class="form-control">
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-1 mb-2"><button type="submit" class="btn btn-success w-100">Add</button></div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody"></tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const apiUrl = '/api/users';
    if (!token || role !== 'admin') {
        alert("Access Denied: Admin Only.");
        window.location.href = '/login';
    }

    async function loadUsers() {
        try {
            const response = await fetch(apiUrl, {
                headers: { 'Authorization': `Bearer ${token}`, 'Accept': 'application/json' }
            });

            if (response.status === 403 || response.status === 401) {
                window.location.href = '/login';
                return;
            }

            const result = await response.json();
            const tbody = document.getElementById('userTableBody');
            tbody.innerHTML = '';

            result.data.forEach(user => {
                let badgeClass = 'bg-secondary';
                if (user.role === 'admin') badgeClass = 'bg-danger';
                if (user.role === 'teacher') badgeClass = 'bg-info text-dark';
                if (user.role === 'student') badgeClass = 'bg-success';

                const row = `
                    <tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td class="text-center"><span class="badge ${badgeClass}">${user.role.toUpperCase()}</span></td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Delete</button>
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        } catch (error) {
            console.error("Error loading users:", error);
        }
    }

    document.getElementById('addUserForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const data = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            role: document.getElementById('role').value
        };

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: { 'Authorization': `Bearer ${token}`, 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        if(response.ok) {
            alert("User created successfully!");
            e.target.reset();
            loadUsers();
        } else {
            const err = await response.json();
            alert("Error: " + err.message);
        }
    });
    async function deleteUser(id) {
        if(!confirm("Are you sure?")) return;
        await fetch(`${apiUrl}/${id}`, {
            method: 'DELETE',
            headers: { 'Authorization': `Bearer ${token}` }
        });
        loadUsers();
    }

    loadUsers();
</script>
@endpush
