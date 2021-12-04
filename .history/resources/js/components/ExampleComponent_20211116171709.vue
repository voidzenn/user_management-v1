<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>

                     <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="car in cars"
                                :key="car.id"
                            >
                                <th scope="row">#{{ car.id }}</th>
                                <td>{{ employee.first_name }}</td>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.department.name }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'EmployeesEdit',
                                            params: { id: employee.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteEmployee(employee.id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                cars: []
            }
        },
        
        created() {
            this.getCars();
        },

        methods: {
            getCars() {
                axios
                    .get('/api/cars')
                    .then(res => {
                        this.cars = res.data;
                    })
                    .catch(error => {
                        console.log(console.error);
                    });
            }
        },
    }
</script>
