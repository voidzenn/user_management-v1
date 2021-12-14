<template>
    <div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <!-- first -->
                <!-- <li class="page-item"
                    :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(1)"
                    >&laquo;</a>
                </li> -->
                <!-- previous -->
                <!-- <li class="page-item"
                    :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.current_page-1)"
                    >prev</a>
                </li> -->
                <!-- pages -->
                <pages>
                    <div slot="sample">
                        <h1>{{ value }}</h1>
                    </div>
                 
                </pages>
                <!-- next -->
                <!-- <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.current_page+1)"
                    >next</a>
                </li> -->
                <!-- last -->
                <!-- <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.last_page)"
                    >&raquo;</a>
                </li> -->

            </ul>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Pagination',
  pages: {},
  props: {
      users: {
          pagination: {
              current_page: 0,
              last_page: 0
          }
      }
  },
  data() {
      return {
          
      }
  }

}
</script>

<style scoped>

</style>
