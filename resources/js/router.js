import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import DashboardHome from './pages/dashboard/Home'
import HCWList from './pages/dashboard/HCWList'
import WorkPlans from './pages/dashboard/WorkPlans'
import WorkPlansAdd from './pages/dashboard/WorkPlansAdd'
import WorkPlansView from './pages/dashboard/WorkPlansView'
import TestComponent from './pages/test/TestComponent'
import Login from './pages/auth/Login'

let routes = [{
		name: 'dashboard.index',
		path: '/',
		component: DashboardHome,
		meta: {
			title: 'Dashboard',
			auth: true
		}
	},{
		name: 'dashboard.hcwlist',
		path: '/hcw/list',
		component: HCWList,
		meta: {
			title: 'HCW List',
			auth: true
		}
	},{
		name: 'dashboard.workplans',
		path: '/workplans',
		component: WorkPlans,
		meta: {
			title: 'Work Plans',
			auth: true
		}
	},{
		name: 'dashboard.workplans.add',
		path: '/workplans/add/:id?',
		component: WorkPlansAdd,
		meta: {
			title: 'Add Work Plan',
			auth: true
		}
	},{
		name: 'dashboard.workplans.view',
		path: '/workplans/view/:id',
		component: WorkPlansView,
		meta: {
			title: 'View Work Plan',
			auth: true
		}
	},
	{
		name: 'test',
		path: '/test',
		component: TestComponent,
		meta: {
			title: 'Test Component',
			auth: true
		}
	},
	{
		path: '/login',
		name: 'login',
		component: Login,
		meta: {
			title: 'Login Page',
			auth: false
		}
	}
];

let router = new VueRouter({routes ,
	scrollBehavior (to, from, savedPosition) {
		// Ensure that the page scrolls to the top after changing the route
		return { x: 0, y: 0 }
	}
})

router.beforeEach((to, from, next) => {
	document.title = to.meta.title
	next()
})

export default router