//https://stackoverflow.com/questions/1232040/how-do-i-empty-an-array-in-javascript
const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
//const writeStream = fs.createWriteStream('learnScrape.csv');
//const dir = fs.readdir('/crawl-page/crawl_list');
const content_concat = [];
const contact = [];
const listOrg = [];

request('https://www.hati.my/lighthouse-children-welfare-home-association-kuala-lumpur-selangor/', (error, response, html) =>{
    if(!error && response.statusCode ==200){
        const $ = cheerio.load(html);
        const el_org = $('.wp-block-cover-text').text().trim();
        //find elements by id (#)
        $('#container .row').each((i,el)=>{
            
                const el_content = $(el).find('.col-12 p').text().trim();
                //scrape contact details
                $('.my_table_1').each((j,el2)=>{
                    const el_contact = $(el).find('.tooltip1').text().replace(/([a-z])([A-Z])/g, '$1, $2').trim();
                    contact.push([el_contact]);
                });
                content_concat.push(el_content);
        });
        listOrg.push(`Organisation: ${el_org}`, `Content: ${content_concat}`, `Contact: ${contact}`);
        console.log(listOrg);
    }
});