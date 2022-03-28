//https://docs.apify.com/crawling-basics/pro-scraping#coding
import Apify from 'apify';
import cheerio from 'cheerio';
import { parse } from 'json2csv';
import { writeFileSync } from 'fs';
import {scrawler_content} from './shamil_scrawl.js';

const orgList = [];
const newitems = [];
await Apify.utils.purgeLocalStorage();

const requestQueue = await Apify.openRequestQueue();
/*
const requestList = await Apify.openRequestList({
    sources: [{
        requestsFromUrl: filtered
    }]
});

await requestList.initialize();
// console.log(requestList.requests[1].url)
// console.log(requestList.length())
*/
await requestQueue.addRequest({
    url: 'https://www.hati.my/sitemap_index.xml',
    userData: {
        label: 'START',
    },
});

const crawler = new Apify.PlaywrightCrawler({
    requestQueue,
    //launchContext and launchOptions give you control over launching browsers with the Apify SDK 
    launchContext: {
        launchOptions: {
            //sets browser to headless in code (hardcode)
            // if you want to scrape to run headless every time
            //another way is setting the environment variable, 'set APIFY_HEADLESS=1 && node apify.js' in cmd
            headless: true,
        },
    },
    handlePageFunction: async ({ page, request }) => {
        console.log('URL: ', request.url);
        /*
         - extract the HTML from the browser and parse it with Cheerio
        */
        const html = await page.content();
        const $ = cheerio.load(html);

        //starting link and only select urls from the page
        if (request.userData.label === 'START') {
            await Apify.utils.enqueueLinks({
                $,
                requestQueue,
                selector: 'table > tbody > tr > td a[href]',
                baseUrl: request.loadedUrl,
            });
            return;
        }


        const sites = $('table > tbody > tr > td');
        for (const site of sites) {
            const fields1 = $(site);
            orgList.push(fields1.find('a').attr('href'));

            await Apify.pushData({
                //.replace(/^\s+|\s+$/g, '')
                //categorylink: request.url,
                linkpage: fields1.find('a').attr('href'),
            });
        }
    },
});

await crawler.run();
/*
Another way to process data and convert JSON to files with Apify token: https://docs.apify.com/crawling-basics/processing-data#upload-dataset
*/
//read and open dataset stored in apify_storage
const dataset = await Apify.openDataset();
const { items } = await dataset.getData();

//empty elements are included
console.log('New Length in dataset: ', items.length);

//https://stackoverflow.com/questions/281264/remove-empty-elements-from-an-array-in-javascript
items.filter(function (el) {
    for (var i in el) {
        if (el[i] != "" || el[i] != "{}" || el[i] != null) {
            newitems.push({ url: el[i]});
        }
    }
});

/*/convert to json file
const json = JSON.stringify(newitems);

writeFileSync('trial01.json', json);
*/

//to show that empty elements have been removed or filtered
console.log('New Length in dataset: ', newitems.length);

scrawler_content(newitems);