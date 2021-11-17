//https://stackoverflow.com/questions/1232040/how-do-i-empty-an-array-in-javascript
const request = require('request');
const cheerio = require('cheerio');
const category = [];
const listOrg = [];

request('https://www.hati.my/category/advocacy/', (error, response, html) =>{
    if(!error && response.statusCode ==200){
        const $ = cheerio.load(html);
        $('.news-content').each((i,el1)=>{
            const el_name = $(el1).find('h2').text();
            const el_link = $(el1).find('a').attr('href');
            const el_content = $(el1).find('.content').text();
            $('.meta-info').each((j,el2)=>{
                const el_category = $(el2).find('a').text();
                //separate category by capital letters
                const new_el = el_category.replace(/([A-Z])/g, ',$&').trim();
                category.push(new_el.replace(/^,/, ''));   
            });
            listOrg.push(`Name: ${el_name}`,`Url: ${el_link}`,`Content: ${el_content}`,`Category: ${category[i]}`);
            //shows category for each name and link scraped
            i++;
            category.length = 0;
            console.log(listOrg);
            listOrg.length = 0;
        });
    }
});