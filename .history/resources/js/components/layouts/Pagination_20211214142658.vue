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
                <!-- <li
                    v-for="(page, index_page) in users.pagination.last_page"
                    :key="index_page"
                    class="page-item"
                    :class="index_page+1 == users.pagination.current_page ? 'active' : ''"
                >
                    <a class="page-link" href="#" @click.prevent="load_users(index_page+1)">{{ index_page+1 }}</a>
                </li> -->
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
                <h1>{{ title }}</h1>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
  name: 'Pagination',

  data() {
      return {
          title: 'first title',
      }
  },

  props: {
      pagination_title: String
  }

}
</script>

<style scoped>

</style>
