<template>
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Management</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Management</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
<!--                                    <h3 class="card-title">Bordered Table</h3>-->
                                    <div class="col-md-2 float-right">
                                        <router-link
                                            :to="{ name:'UserManagementCreate' }"
                                            class="nav-link btn btn-primary"
                                        >
                                            Create User
                                        </router-link>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th style="width: 150px">Manage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                :key="user.id"
                                                v-for="(user, index) in users"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ user.status }}</td>
                                                <td>{{ user.role_name }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <router-link :to="{ name: 'UserManagementEdit', params: { id: user.id } }" class="btn btn-primary">Edit</router-link>
                                                        <a name="" id="" class="btn btn-danger ml-1" href="#" role="button" @click="deleteUser( user.id )">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
<!--                                        <tr>-->
<!--                                            <td>1.</td>-->
<!--                                            <td>Update software</td>-->
<!--                                            <td>&#45;&#45;</td>-->
<!--                                            <td>&#45;&#45;</td>-->
<!--                                            <td>-->
<!--                                                <div class="progress progress-xs">-->
<!--                                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>-->
<!--                                                </div>-->
<!--                                            </td>-->
<!--                                            <td><span class="badge bg-danger">55%</span></td>-->
<!--                                        </tr>-->

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>

<script>

export default {
    data() {
        return {
            users: [],

        }
    },
    created() {
        this.loadUsers();
    },
    methods: {

        loadUsers() {
            axios.get('/api/users')
                .then(response => {
                    this.users = response.data;
                    console.log(this.users);
                })
        },

        deleteUser(id) {
            axios.delete(`/api/users/${8}`)
                .then(response => {
                    console.log(<div class="d-print-block">
                          
                    </div>);
                })
                .catch(error => {
                    console.log(response.data);
                });
        }
    }

}
</script>

<style scoped>
.card {
    overflow: auto;
}
</style>
