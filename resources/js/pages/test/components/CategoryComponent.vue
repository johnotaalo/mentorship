<template>
	<div style="margin-bottom: 10px; border: 1px solid grey; padding: 15px;">
		<p>{{ category.category }} <b-form-input v-model="value.amount" type = "number"></b-form-input></p>
		<ul>
			<li v-for = "(subcat, index) in category.subcategories" :key="index">{{ subcat.category }}</li>
		</ul>
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			value: {type: null, default: null},
			parent: { type: null, default: null },
			category: {
				type: Object,
				default: {}
			}
		}
	}
</script>