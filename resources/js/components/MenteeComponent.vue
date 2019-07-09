<template>
	<div>
		<div class="form-group">
			 <b-input-group class="mt-3">
			 	<b-input class="col-md-3" v-model="value.mentee_no"></b-input>
			 	<b-input-group-append class="col-md-9">
			 		<v-select :options="cadres" v-model="value.mentee_cadre"></v-select>
			 	</b-input-group-append>
			 </b-input-group>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		name: "Mentee",
		props: {
			value: { type: null, value: null },
			cadres: { type: null, value: null }
		}
	}
</script>