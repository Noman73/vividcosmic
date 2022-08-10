window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap/dist/js/bootstrap.min.js');
    window.moment = require('moment');
    require('overlayscrollbars');
    require('admin-lte');
    require('admin-lte/dist/js/demo.js');
    require('admin-lte/plugins/datatables/jquery.dataTables.js');
    require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
    window.select2=require('select2');
    window.toastr=require('toastr');
    window.Swal = require('sweetalert2');
    require('daterangepicker/daterangepicker.js');
    
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// window.axios.defaults.baseURL = 'http://localhost/vivid/'
window.axios.defaults.baseURL = 'https://info.vividcosmic.com/'
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
