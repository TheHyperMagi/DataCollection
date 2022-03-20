const https = require('https')
const wiki = require('wikijs').default

function wikipedia_html(name) {
    name = String(name);
    wiki().find(name).then(page => page.url()).then(console.log);
    // return name;
};

wikipedia_html("Aflatoun")