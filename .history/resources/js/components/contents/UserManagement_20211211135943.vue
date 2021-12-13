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
                                            :to="{ name:'UserManagementCreate'}"
                                            class="nav-link btn btn-primary"
                                        >
                                            Create User
                                        </router-link>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="alert alert-success alert-dismissible" v-if="success == true">
                                        {{ success_msg }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="success_dismiss()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="alert alert-danger alert-dismissible" v-if="fail == true">
                                        {{ fail_msg }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"  @click="fail_dismiss()" >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10px">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center" style="width: 50px">Status</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center" style="width: 150px">Manage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <template>
                                                <tr
                                                    v-for="(user, user_index) in users"  
                                                    :key="user.id"
                                                >
                                                    <td>{{ user_index+1 }}</td>
                                                    <td>{{ user.name }}</td>
                                                    <td>{{ user.email }}</td>
                                                    <td class="text-center">
                                                        <a href="#" @click.prevent="change_status(user.id, user_index)">
                                                            <i class="fas fa-toggle-on text-lg"  v-if="user.status == 1"></i>
                                                            <i class="fas fa-toggle-off text-lg"  v-if="user.status == 0"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-ce">
                                                        <label for="" class="label text-bold">{{ user.role.name }}</label>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <router-link :to="{ name: 'UserManagementEdit', params: { id: user.id } }" class="btn btn-primary">Edit</router-link>
                                                            <a name="" id="" class="btn btn-danger ml-1" href="#" role="button" @click="delete_user( user.id, index )">Delete</a>
                                                        </div>
                                                    </td>
                                               </tr>
                                            </template>
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
                                        <li class="page-item"
                                            :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                                        >
                                            <a class="page-link" href="#"
                                                @click="load_users(1)"
                                            >&laquo;</a></li>
                                        <li class="page-item"
                                            :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                                        >
                                            <a class="page-link" href="#"
                                                @click="load_users(users.pagination.current_page-1)"
                                            >prev</a></li>
                                        <li
                                            v-for="(page, index_page) in users.pagination.last_page"
                                            :key="index_page"
                                            class="page-item"
                                            :class="index_page+1 == users.pagination.current_page ? 'active' : ''"
                                        >
                                            <a class="page-link" href="#" @click="load_users(index_page+1)">{{ index_page+1 }}</a>
                                        </li>
                                        <li class="page-item"
                                            :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                                        >
                                            <a class="page-link" href="#"
                                                @click="load_users(users.pagination.current_page+1)"
                                            >next</a>
                                        </li>
                                        <li class="page-item"
                                            :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                                        >
                                            <a class="page-link" href="#"
                                                @click="load_users(users.pagination.last_page)"
                                            >&raquo;</a></li>
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
            users: {},
            success: false,
            fail: false,
            success_msg: '',
            fail_msg: '',
            roles: []
        }
    },
    created() {
        this.load_users();
        this.check_msg();
    },
    methods: {

        load_users(page_num) {
            // default page
            axios.get(`/api/users/data?page=${ page_num != '' ? page_num : 1 }`)
                .then(response => {
                    this.users = response.data.data;
                    this.users.pagination = response.data;
                    console.log(this.users);
                })
        },

        change_status(user_id, user_index) {
            if( user_id != null && user_index != null ) {
                axios.put(`/api/users/${user_id}/change_status`)
                    .then(response => {
                        if(response.data.error == false) {
                            this.users[user_index].status = response.data.new_status;
                            console.log(response.data);
                        }else {
                            this.users[user_index].status = response.data.new_status
                            console.log(response.data);
                        }
                    })
                    .catch(error => {
                        console.log(error.data);
                    });
            }
        },

        delete_user(id, index) {
            axios.delete(`/api/users/${id}`)
                .then(response => {
                    if(response.data.error === false) {
                        //alert success
                        this.success = true;
                        this.success_msg = response.data.msg;
                        this.users.splice(index, 1);

                        console.log(response.data);
                    }else{
                        //alert fail
                        this.fail = true;
                        this.fail_msg = response.data.msg;

                        console.log(response.data);
                    }
                })
                .catch(error => {
                    console.log(error.data);
                });
        },
        // hide the success alert 
        success_dismiss() {
            this.success = false;
            // console.log('pressed');
        },
        // hide the fail alert
        fail_dismiss() {
            this.fail = false;
            // console.log('pressed');
        },

        check_msg() {
            if(`${this.$route.params.msg}` !== 'undefined') {
                this.success = true;
                this.success_msg = `${this.$route.params.msg}`;
            }
            // console.log(`${this.$route.params.msg}`);  
        },

    }

}
</script>

<style scoped>
.card {
    overflow: auto;
}
</style>
