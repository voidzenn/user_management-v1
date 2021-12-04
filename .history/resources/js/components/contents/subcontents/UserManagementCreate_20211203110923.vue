<template>
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Create</h1>
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
                                    <div class="col-md- float-right">
                                        <router-link
                                            :to="{ name:'UserManagement' }"
                                            class="nav-link"
                                        >
                                            Go Back
                                        </router-link>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body m-5">
                                    <div class="alert alert-success alert-dismissible" v-show="success">
                                        User Successfully Added
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" id="submit-form" method="POST" @submit.prevent="store">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" v-model="fields.name">
                                            <label for="" class="label text-danger" v-if="errors.name" v-show="errors.name !== ''">
                                                {{ errors.name[0] }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" v-model="fields.email">
                                            <label for="" class="label text-danger" v-if="errors.email" v-show="errors.email !== ''">
                                                {{ errors.email[0] }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="text" class="form-control" v-model="fields.password">
                                            <label for="" class="label text-danger" v-if="errors.password" v-show="errors.password !== ''">
                                                {{ errors.password[0] }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="text" class="form-control" v-model="fields.password_confirmation">
                                            <label for="" class="label text-danger" v-if="errors.password_confirmation" v-show="errors.password_confirmation !== ''">
                                                {{ errors.password_confirmation[0] }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>

<!--                                            <select name="" id=""-->
<!--                                                v-for="role in roles"-->
<!--                                               -->
<!--                                                :key="role.id"-->
<!--                                                class="form-control"-->
<!--                                            >-->
<!--                                                <option-->
<!--                                                    v-bind:value="role.id"-->
<!--                                                    selected-->
<!--                                                >{{ role.name }}</option>-->
<!--                                            </select>-->

                                            <select name="" id="" class="form-control" v-model="fields.role_id">
                                                <option
                                                    v-for="role in roles"
                                                    :value="role.id"
                                                    :key="role.id"                                               >{{ role.name }}</option>
                                            </select>
                                            <label for="" class="label text-danger" v-show="errors.role_id !== ''">
                                                {{ errors.role_id }}
                                            </label>
                                        </div>

                                        <div class="form-group float-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

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
            roles: [],
            fields: {
                role_id: 1,
            },
            success: false,
            selected: 0,
            errors: {},
        }
    },
    created() {
        this.load_roles()
    },
    methods: {

        load_roles() {
            axios.get('/api/roles')
                .then(response => {
                    this.roles = response.data;
                    this.roles.selected = true;
                });
        },

        store()
        {
            axios.post('/api/users/store', this.fields)
                .then(response => {
                    this.fields = {};
                    // this.success = true;
                    //redirect to main
                    this.$router.push({ path: '/pages/user_management', params: { msg: 'User Succesfully Added' } });
                    console.log(response.data);
                })
                .catch(error => {
                    if( error.response.status === 422 )
                    {
                        this.errors = error.response.data.errors;
                    }
                    console.log(error.response.data);
                });
        }
    }
}
</script>
