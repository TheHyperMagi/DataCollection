const Apify = require('apify');

Apify.main(async () => {
    const dataJson = [];
    const titleList = [];
    // create a dataset and open it
    const dataset = await Apify.openDataset('crawl-page');
    // Create a RequestQueue
    const requestQueue = await Apify.openRequestQueue();
    // Define the starting URL
    await requestQueue.addRequest({ url: 'https://www.hati.my/organisations/' });
    
    // Create a CheerioCrawler
    const crawler = new Apify.CheerioCrawler({
        requestQueue,
        handlePageFunction: async ({ request,response, $ }) => {
            $('.row div').each((index, el) =>{
                //find the link and title of each category in the page crawled
                href = $(el).find('.icon-box').attr('href');
                title = $(el).find('.entry-title').text();
                titleList.push(title);
                dataJson.push([
                        `Url: ${href}`, 
                        `Category: ${title}`, ]);
                //if title and url is undefined or null, do not include in the json file
                if (title == ''){
                    dataJson.pop();
                }
            });
            dataJson.push(`URL Category: ${request.url}`);
        },
    });
    // Run the crawler
    await crawler.run();
    await dataset.pushData({dataJson});
});
