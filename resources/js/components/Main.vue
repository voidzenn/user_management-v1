<template>
	<div>
		<!-- THIS IS THE NAV BAR -->
		<NavBar></NavBar>

		<!-- THIS IS THE SIDE BAR -->
		<SideBar></SideBar>

		<!--   THIS IS THE MAIN CONTENT     -->
		<router-view></router-view>

		<!-- THIS THE FOOTER -->
		<Footer></Footer>

		<!-- THIS IS THE SIDE OVERLAY -->
		<!--        <SideOverlay></SideOverlay>-->
	</div>
</template>

<script>
import NavBar from "./layouts/NavBar";
import SideBar from "./layouts/Sidebar";
import Footer from "./layouts/Footer";
import SideOverlay from "./layouts/SideOverlay";

export default {
	mounted() {
		console.log("main vue mounted");
	},

	components: {
		NavBar,
		SideBar,
		Footer,
		SideOverlay,
	},
};
</script>

<style scoped>
.routes {
	position: absolute;
	right: 1px;
}
</style>
