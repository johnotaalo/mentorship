<template>
	<div>
		<b-form @submit="login">
			<b-form-group
				label="Email address:">
				<b-form-input type="email" placeholder="Enter Email Address" v-model = "email"></b-form-input>
			</b-form-group>

			<b-form-group
				label="Password:">
				<b-form-input type="password" placeholder="Enter Password" v-model = "password"></b-form-input>
			</b-form-group>

			<b-button type="submit" variant="primary" block>Submit</b-button>
		</b-form>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				email: '',
				password: ''
			}
		},
		created(){

		},
		methods: {
			login(){
				var redirect = this.$auth.redirect()
				var app = this
				this.$auth.login({
					params: {
						email: app.email,
						password: app.password
					},
					success: function() {
						// handle redirection
						const redirectTo = redirect ? redirect.from.name : 'dashboard.index'
					},
					error: function() {
						app.has_error = true
					},
					rememberMe: true,
					fetchUser: true
				})
			}
		}
	}
</script>