<template>
    <div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <!-- first -->
                <li class="page-item"
                    :class="pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_data(1)"
                    >&laquo;</a>
                </li>
                <!-- previous -->
                <li class="page-item"
                    :class="pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_data(pagination.current_page-1)"
                    >prev</a>
                </li>
                <!-- pages -->
                <li
                    v-for="(page, index_page) in pagination.last_page"
                    :key="index_page"
                    class="page-item"
                    :class="index_page+1 == pagination.current_page ? 'active' : ''"
                >
                    <a class="page-link" href="#" @click.prevent="load_data(index_page+1)">{{ index_page+1 }}</a>
                </li>
                <!-- next -->
                <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.current_page+1)"
                    >next</a>
                </li>
                <!-- last -->
                <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.last_page)"
                    >&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
  name: 'Pagination',

  props: {
      data: Object,
      pagination: Object
  },

  methods: {
      load_data(index) {
          this.$emit('load_data', index);
      }
  }
}
</script>

<style scoped>

</style>
