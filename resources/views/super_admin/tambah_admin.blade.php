<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control"type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control"type="text" name="password" id="password">
        </div>
        <label for="role">Role :</label>
        <select class="form-control" name="role" id="role" required>
            <option value='Super Admin' >Super Admin</option>
            <option value='Admin'>Admin</option>
        </select>
        @csrf
    </div>
</div>
