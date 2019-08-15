// import axios from 'axios';

const instance = axios.create({
	baseURL: '/api'
});

instance.interceptors.request.use(config => {
	NProgress.start()
	return config;
});

instance.interceptors.response.use(response => {
	NProgress.done()
	return response;
}, function (error) {
    // Do something with response error
    NProgress.done()
    console.log(error)
	return Promise.reject(error);
});

export default instance