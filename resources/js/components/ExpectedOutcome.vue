<template>
	<div>
		<div class="form-group row">
			<div class="col-md-9">
				<b-input-group :prepend="`${index + 1}`" class="mb-8 mr-sm-8 mb-sm-0">
					<b-input v-model="value.outcome"></b-input>
				</b-input-group>
			</div>
			<div class="col-md">
				<b-button-group class="float-right">
					<b-button variant="danger" size="sm" @click="removeRow">Remove</b-button>
				</b-button-group>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			value: { type: null, default: null },
			index: { type:null, default: null }
		},
		methods: {
			removeRow () {
				this.$emit('remove', this.value.id)
			}
		}
	}
</script>