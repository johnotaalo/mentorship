import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import DashboardHome from './pages/dashboard/Home'
import HCWList from './pages/dashboard/HCWList'
import WorkPlans from './pages/dashboard/WorkPlans'
import WorkPlansAdd from './pages/dashboard/WorkPlansAdd'

let routes = [{
		name: 'dashboard.index',
		path: '/',
		component: DashboardHome,
		meta: {
			title: 'Dashboard'
		}
	},{
		name: 'dashboard.hcwlist',
		path: '/hcw/list',
		component: HCWList,
		meta: {
			title: 'HCW List'
		}
	},{
		name: 'dashboard.workplans',
		path: '/workplans',
		component: WorkPlans,
		meta: {
			title: 'Work Plans'
		}
	},{
		name: 'dashboard.workplans.add',
		path: '/workplans/add',
		component: WorkPlansAdd,
		meta: {
			title: 'Add Work Plan'
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