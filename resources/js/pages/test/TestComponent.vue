<template>
	<div>
		<div class="row">
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<h3>Total Value: {{ calculatedTotal }}</h3>
						<category-component v-for="(category, key) in categories" :key="category.id" :category="category" :parent="parentID" v-model="categories[key]"></category-component>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	import CategoryComponent from './components/CategoryComponent'
	export default {
		name: 'TestComponent',
		components: { CategoryComponent },
		data() {
			return {
				parentID: 'AXD6781',
				categories: [
					{
						id: 1,
						category: 'Cat A',
						amount: 0,
						subcategories: [
							{
								id: 2,
								category: 'Subcat A',
							},{
								id: 3,
								category: 'Subcat B',
							}
						]
					},
					{
						id: 4,
						category: 'Cat B',
						subcategories: [
							{
								id: 5,
								category: 'Subcat C',
							}
						]
					},
					{
						id: 6,
						category: 'Cat C',
						subcategories: [
							{
								id: 7,
								category: 'Subcat D',
							},
							{
								id: 8,
								category: 'Subcat E',
							},
							{
								id: 9,
								category: 'Subcat F',
							}
						]
					}
				]
			}
		},
		computed: {
			calculatedTotal: function() {
				return _.sumBy(this.categories, "amount");
			}
		}
	}
</script>