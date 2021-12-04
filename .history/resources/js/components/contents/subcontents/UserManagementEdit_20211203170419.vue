<template>
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Edit</h1>
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
                                    <form action="" id="" method="POST" @submit.prevent="update">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" 
                                                v-model="fields.name"
                                                v-on:keyup="check_inputs()"
                                            >
                                            <label for="" class="label text-danger" v-if="errors.name" v-show="errors.name !== ''">
                                                {{ errors.name[0] }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" 
                                                v-model="fields.email"
                                                v-on:keyup="check_inputs()"    
                                            >
                                            <label for="" class="label text-danger" v-if="errors.email" v-show="errors.email !== ''">
                                                {{ errors.email[0] }}
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

                                            <select name="" id="" class="form-control" 
                                                v-model="fields.role_id"
                                                @change="check_inputs()"
                                            >
                                                <option
                                                    v-for="role in roles"
                                                    :value="role.id"
                                                    :key="role.id"
                                                >{{ role.name }}</option>
                                            </select> 
                                            <label for="" class="label text-danger" v-if="errors.role_id" v-show="errors.role_id !== ''">
                                                {{ errors.role_id[0] }}
                                            </label>
                                        </div>

                                        <div class="form-group float-right">
                                            <button type="submit" class="btn btn-primary" :disabled="isActiveBtn" >Save</button>
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md- float-left">
                                        <h1 class="card-title">Update Password</h1>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body m-5">
                                   <!-- <div class="alert alert-success alert-dismissible" v-show="success">
                                        Password Successfully Updated
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> -->
                                    <form action="" id="" method="POST" @submit.prevent="updatePass">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="text" class="form-control" 
                                                v-model="fields.password"
                                               
                                            >
                                            <label for="" class="label text-danger" v-show="errors.password !== ''">
                                                {{ errors.password }}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="text" class="form-control" v-model="fields.password_confirmation">
                                            <label for="" class="label text-danger" v-show="errors.password_confirmation !== ''">
                                                {{ errors.password_confirmation }}
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
                name: '',
                email: '',
                role_id: ''
            },
            temp_fields: {
                name: '',
                email: '',
                role_id: '',
            },
            isActiveBtn: true,
            success: false,
            fail: false,
            success_msg: '',
            errors: {},
        }
    },
    created() {
        this.loadData();
        this.loadRole();
    },
    methods: {

        loadData() {
            axios.get(`/api/users/${this.$route.params.id}`)
                .then((response) => {
                    this.fields.name = response.data.name;
                    this.fields.email = response.data.email;
                    this.fields.role_id = response.data.role_id;
                    this.temp_fields.name = this.fields.name;
                    this.temp_fields.email = this.fields.email;
                    this.temp_fields.role_id = this.fields.role_id;
                    console.log(this.fields);
                })
                .catch(error => {
                    console.log(error.data);
                });
        },

        loadRole() {
            axios.get('/api/roles')
                .then(response => {
                    this.roles = response.data;
                    // console.log(response.data)
                });
        },

        update()
        {
            axios.put(`/api/users/${this.$route.params.id}`, this.fields)
                .then(response => {
                    // this.fields = {};
                    this.success_msg = response.data.msg;
                    this.success = true;
                    this.errors = {};
                    console.log(response.data);
                })
                .catch(error => {
                    if( error.response.status === 422 )
                    {
                        this.errors = error.response.data.errors;
                    }
                    console.log(this.errors);
                });
        },

        updatePass()
        {
            if(this.temp_fields.name != this.fields.name || this.temp_fields.email != this.fields.email || this.temp_fields.role_id != this.fields.role_id) { 

                axios.post('/api/users/store', this.fields)
                .then(response => {
                    // this.fields = {};
                    this.success = true;
                    console.log(response.data);
                })
                .catch(error => {
                    if( error.response.status === 422 )
                    {
                        this.errors.name = error.response.data.errors.name[0];
                        this.errors.email = error.response.data.errors.email[0];
                        this.errors.password = error.response.data.errors.password[0];
                        this.errors.password_confirmation = error.response.data.errors.password_confirmation[0];
                        this.errors.role_id = error.response.data.errors.role_id[0];
                    }
                    console.log(error.response.data.errors);
                });
                
            }
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
        // this checks if the inputs had changed from original
        check_inputs() {
            if(this.temp_fields.name != this.fields.name || this.temp_fields.email != this.fields.email || this.temp_fields.role_id != this.fields.role_id) {
                this.isActiveBtn = false;
            }else{
                this.isActiveBtn = true;
            }
            // console.log(this.isActiveBtn);
        }
    }
}
</script>
