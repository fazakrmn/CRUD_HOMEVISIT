<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - User Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f5f8fa;
            color: #333;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #708993 0%, #708993 100%);
            padding: 24px 0;
            z-index: 100;
        }

        .sidebar-header {
            padding: 0 24px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h1 {
            color: white;
            font-size: 22px;
            font-weight: 600;
        }

        .sidebar-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin-top: 4px;
        }

        .sidebar-menu {
            margin-top: 24px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 14px 24px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .menu-item.active {
            background: rgba(52, 152, 219, 0.2);
            color: white;
            border-left: 4px solid #3498db;
        }

        .menu-item-icon {
            font-size: 20px;
            margin-right: 12px;
        }

        .main-content {
            margin-left: 260px;
            padding: 24px;
        }

        .top-bar {
            background: white;
            padding: 20px 32px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .top-bar h2 {
            color: #2c3e50;
            font-size: 24px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.blue {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .stat-icon.green {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .stat-icon.orange {
            background: rgba(230, 126, 34, 0.1);
            color: #e67e22;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 14px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            padding: 24px;
            border-bottom: 1px solid #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            color: #2c3e50;
            font-size: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .btn-success {
            background: #2ecc71;
            color: white;
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-warning {
            background: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background: #e67e22;
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 13px;
        }

        .search-bar {
            display: flex;
            gap: 12px;
            padding: 20px 24px;
            border-bottom: 1px solid #ecf0f1;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #dfe6e9;
            border-radius: 8px;
            font-size: 14px;
        }

        .search-input:focus {
            outline: none;
            border-color: #3498db;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            padding: 16px 24px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px 24px;
            border-bottom: 1px solid #ecf0f1;
            color: #555;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .badge-success {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .badge-danger {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .badge-warning {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            padding: 24px;
            border-bottom: 1px solid #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            color: #2c3e50;
            font-size: 20px;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 28px;
            color: #7f8c8d;
            cursor: pointer;
            line-height: 1;
        }

        .close-btn:hover {
            color: #2c3e50;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #dfe6e9;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .modal-footer {
            padding: 20px 24px;
            border-top: 1px solid #ecf0f1;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 24px;
        }

        .page-btn {
            padding: 8px 12px;
            border: 1px solid #dfe6e9;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            color: #555;
        }

        .page-btn:hover {
            background: #f8f9fa;
            border-color: #3498db;
            color: #3498db;
        }

        .page-btn.active {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }

        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: #7f8c8d;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 16px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1>MUTIARA MEDIKA</h1> 
        </div>
        <div class="sidebar-menu">
            <a href="#" class="menu-item active">
                <span class="menu-item-icon">👥</span>
                <span>Pengguna</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h2>Dashboard</h2>
            <div class="user-info">
                <span style="color: #7f8c8d; font-size: 14px;">Admin</span>
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="totalUsers">0</div>
                        <div class="stat-label">Total Users</div>
                    </div>
                    <div class="stat-icon blue">👥</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="activeUsers">0</div>
                        <div class="stat-label">Active Users</div>
                    </div>
                    <div class="stat-icon green">✅</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="inactiveUsers">0</div>
                        <div class="stat-label">Inactive Users</div>
                    </div>
                    <div class="stat-icon orange">⏸️</div>
                </div>
            </div>
        </div>

        <!-- User Management Table -->
        <div class="content-card">
            <div class="card-header">
                <h3>User Management</h3>
                <button class="btn btn-primary" onclick="openAddModal()">
                    <span>➕</span> Add New User
                </button>
            </div>

            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search users by name or email..." id="searchInput" onkeyup="searchUsers()">
                <button class="btn btn-primary" onclick="searchUsers()">🔍 Search</button>
            </div>

            <div class="table-container">
                <table id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be inserted here -->
                    </tbody>
                </table>
            </div>

            <div class="pagination" id="pagination">
                <!-- Pagination buttons will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Add/Edit User Modal -->
    <div class="modal" id="userModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Add New User</h3>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <form id="userForm">
                <div class="modal-body">
                    <input type="hidden" id="userId">
                    
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Enter email address" required>
                    </div>

                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" class="form-control" id="userPassword" placeholder="Enter password (min. 6 characters)">
                        <small style="color: #7f8c8d; font-size: 12px; margin-top: 4px; display: block;">Leave blank to keep current password (for edit)</small>
                    </div>

                    <div class="form-group">
                        <label for="userStatus">Status</label>
                        <select class="form-control" id="userStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" onclick="closeModal()" style="background: #ecf0f1; color: #555;">Cancel</button>
                    <button type="submit" class="btn btn-success">💾 Save User</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sample data - replace with actual API calls
        let users = [
            { id: 1, name: 'John Doe', email: 'john@example.com', status: 'active', registered: '2024-01-15' },
            { id: 2, name: 'Jane Smith', email: 'jane@example.com', status: 'active', registered: '2024-02-20' },
            { id: 3, name: 'Bob Johnson', email: 'bob@example.com', status: 'inactive', registered: '2024-03-10' },
            { id: 4, name: 'Alice Williams', email: 'alice@example.com', status: 'active', registered: '2024-04-05' },
            { id: 5, name: 'Charlie Brown', email: 'charlie@example.com', status: 'suspended', registered: '2024-05-12' },
        ];

        let currentPage = 1;
        const itemsPerPage = 10;
        let filteredUsers = [...users];

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateStats();
            renderTable();
        });

        // Update statistics
        function updateStats() {
            document.getElementById('totalUsers').textContent = users.length;
            document.getElementById('activeUsers').textContent = users.filter(u => u.status === 'active').length;
            document.getElementById('inactiveUsers').textContent = users.filter(u => u.status !== 'active').length;
        }

        // Render table
        function renderTable() {
            const tbody = document.getElementById('tableBody');
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageUsers = filteredUsers.slice(start, end);

            if (pageUsers.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-state-icon">🔍</div>
                                <p>No users found</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = pageUsers.map(user => `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>
                        <span class="badge badge-${user.status === 'active' ? 'success' : user.status === 'inactive' ? 'warning' : 'danger'}">
                            ${user.status.toUpperCase()}
                        </span>
                    </td>
                    <td>${formatDate(user.registered)}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editUser(${user.id})">✏️ Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">🗑️ Delete</button>
                    </td>
                </tr>
            `).join('');

            renderPagination();
        }

        // Render pagination
        function renderPagination() {
            const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);
            const pagination = document.getElementById('pagination');

            if (totalPages <= 1) {
                pagination.innerHTML = '';
                return;
            }

            let html = '<button class="page-btn" onclick="changePage(' + (currentPage - 1) + ')" ' + (currentPage === 1 ? 'disabled' : '') + '>←</button>';

            for (let i = 1; i <= totalPages; i++) {
                html += `<button class="page-btn ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</button>`;
            }

            html += '<button class="page-btn" onclick="changePage(' + (currentPage + 1) + ')" ' + (currentPage === totalPages ? 'disabled' : '') + '>→</button>';

            pagination.innerHTML = html;
        }

        // Change page
        function changePage(page) {
            const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);
            if (page < 1 || page > totalPages) return;
            currentPage = page;
            renderTable();
        }

        // Search users
        function searchUsers() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            filteredUsers = users.filter(user => 
                user.name.toLowerCase().includes(query) || 
                user.email.toLowerCase().includes(query)
            );
            currentPage = 1;
            renderTable();
        }

        // Open add modal
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Add New User';
            document.getElementById('userForm').reset();
            document.getElementById('userId').value = '';
            document.getElementById('userPassword').required = true;
            document.getElementById('userModal').classList.add('active');
        }

        // Edit user
        function editUser(id) {
            const user = users.find(u => u.id === id);
            if (!user) return;

            document.getElementById('modalTitle').textContent = 'Edit User';
            document.getElementById('userId').value = user.id;
            document.getElementById('userName').value = user.name;
            document.getElementById('userEmail').value = user.email;
            document.getElementById('userStatus').value = user.status;
            document.getElementById('userPassword').required = false;
            document.getElementById('userPassword').value = '';
            document.getElementById('userModal').classList.add('active');
        }

        // Delete user
        function deleteUser(id) {
            if (!confirm('Are you sure you want to delete this user?')) return;

            users = users.filter(u => u.id !== id);
            filteredUsers = [...users];
            updateStats();
            renderTable();
            alert('User deleted successfully!');
        }

        // Close modal
        function closeModal() {
            document.getElementById('userModal').classList.remove('active');
        }

        // Handle form submission
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const id = document.getElementById('userId').value;
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const password = document.getElementById('userPassword').value;
            const status = document.getElementById('userStatus').value;

            if (id) {
                // Edit existing user
                const userIndex = users.findIndex(u => u.id == id);
                if (userIndex !== -1) {
                    users[userIndex] = { ...users[userIndex], name, email, status };
                    alert('User updated successfully!');
                }
            } else {
                // Add new user
                const newId = users.length > 0 ? Math.max(...users.map(u => u.id)) + 1 : 1;
                users.push({
                    id: newId,
                    name,
                    email,
                    status,
                    registered: new Date().toISOString().split('T')[0]
                });
                alert('User added successfully!');
            }

            filteredUsers = [...users];
            updateStats();
            renderTable();
            closeModal();
        });

        // Format date
        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleDateString('id-ID', { year: 'numeric', month: 'short', day: 'numeric' });
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>