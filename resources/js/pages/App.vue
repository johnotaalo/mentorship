<template>
	<div class="wrapper">
		<side-bar />
		<div class="main">
			<top-bar />
			<main class="content">
				<div class="container-fluid p-0">
					<router-view></router-view>
				</div>
			</main>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {}
</script>