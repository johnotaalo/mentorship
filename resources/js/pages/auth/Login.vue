<template>
	<div>
		<loading :active.sync="isLoading" :can-cancel="true" :is-full-page="fullPage"></loading>
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
				password: '',
				isLoading: false,
				fullPage: false,
				has_error: false,
				toastrOptions: {
					"positionClass": "toast-top-center"
				}
			}
		},
		created(){

		},
		methods: {
			login(){
				var redirect = this.$auth.redirect()
				var app = this

				app.isLoading = true
				this.$auth.login({
					data: {
						email: app.email,
						password: app.password
					},
					success: function() {
						app.isLoading = false
						// handle redirection
						const redirectTo = redirect ? redirect.from.name : 'dashboard.index'
						this.$toastr.success('Successfully logged in', 'All Set!', app.toastrOptions);
						this.$router.push({name: redirectTo})
					},
					error: function() {
						app.isLoading = false
						app.has_error = true
						this.$toastr.success('Incorrect Email or Password', 'Error', app.toastrOptions);
					},
					rememberMe: true,
					fetchUser: true
				})
			}
		}
	}
</script>