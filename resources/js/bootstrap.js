import Alpine from 'alpinejs';
import persist from "@alpinejs/persist";
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();
