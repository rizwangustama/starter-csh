import axios from 'axios';

let httpClient = axios.create({
    baseURL: settings.endpoint,
    // timeout: 1000, //No need because we have cache on server
    headers: {
        'X-WP-Nonce': settings.nonce
    }
});

httpClient.interceptors.request.use(config => {
    if (config.data instanceof FormData) {
        Object.assign(config.headers, config.data.getHeaders());
    }
    return config;
});

export default httpClient;