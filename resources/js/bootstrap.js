window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.$ = require('./jquery').default;

window.loanCalculator = require('./loanCalculator');

window.utils = require('./modal');