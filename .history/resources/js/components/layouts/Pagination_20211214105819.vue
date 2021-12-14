<template>
    <div>
        <!-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"
                    :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(1)"
                    >&laquo;</a></li>
                <li class="page-item"
                    :class="users.pagination.current_page == 1 ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.current_page-1)"
                    >prev</a></li>
                <li
                    v-for="(page, index_page) in users.pagination.last_page"
                    :key="index_page"
                    class="page-item"
                    :class="index_page+1 == users.pagination.current_page ? 'active' : ''"
                >
                    <a class="page-link" href="#" @click.prevent="load_users(index_page+1)">{{ index_page+1 }}</a>
                </li>
                <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.current_page+1)"
                    >next</a>
                </li>
                <li class="page-item"
                    :class="users.pagination.current_page == users.pagination.last_page ? 'disabled' : ''"
                >
                    <a class="page-link" href="#"
                        @click.prevent="load_users(users.pagination.last_page)"
                    >&raquo;</a></li>
            </ul>
        </div> -->
        <slot :set-value=""></slot>
    </div>
</template>

<script>
export default {
  
}
</script>

<style scoped>

</style>
